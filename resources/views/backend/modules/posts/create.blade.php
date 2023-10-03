@extends('backend.layouts.master')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
.note-editable { background-color:#fcffdac9!important; color: black !important; }
.note-btn {background-color:  #00fffa1f;}
</style>
@endpush

@section('title','Post')
@section('content')
<div class="wrapper">  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mt-3 justify-content-center">
          <div class="col-sm-11">
            <h3>➧ Post</h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-11">
            <!-- general form elements -->
            <div class="card card-primary ">
              <div class="card-header">
              @if(isset($post))
              <h3 class="card-title">Edit Post</h3>
              @else
              <h3 class="card-title">Create Post</h3>
              @endif                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{(@$post) ? route('post.update',$post->id) : route('post.store')}}" enctype="multipart/form-data">
                @csrf  

                @if(isset($post))
                  @method('put')
                @endif 
                               
                <div class="card-body">
                    <div class="row justify-content-center">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Title</label>
                          <input id="title" type="text" name="title" value="{{@$post->title}}" class="form-control" placeholder="Enter Post title" >
                          @error('title')
                          <code>*{{$message}}</code>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Slug</label>
                          <input id="slug" type="text" name="slug" value="{{@$post->slug}}" class="form-control" placeholder="Enter Post Slug">
                          @error('slug')
                          <code>*{{$message}}</code>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Category</label>
                          <select class="form-control" name="category_id" id="category_id">
                              @if(isset($post))
                              <option value="{{$post->category_id}}">{{$post->category->name}}</option>
                              @else
                              <option value=" ">Select</option>
                              @endif
                              @foreach($categories as $key=>$category)
                              <option value="{{$key}}">{{$category}}</option>
                              @endforeach                         
                          </select>
                          @error('category_id')
                          <code>*{{$message}}</code>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Sub Category</label>
                          <select class="form-control" name="sub_category_id" id="sub_category_id" >
                              @if(isset($post))
                              <option value="{{$post->sub_category_id}}">{{$post->sub_category->name}}</option>
                              @else
                              <option value=" ">Select</option>
                              @endif                              
                          </select>
                          @error('sub_category_id')
                          <code>*{{$message}}</code>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-center"> 
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Post Status</label>
                          <select class="form-control" name="status" >
                              @if(isset($post))
                              <option value="{{$post->status}}">{{$post->status == 1 ? 'Active' : 'Inactive'}}</option>
                              @else
                              <option value=" ">Select</option>
                              @endif
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>                           
                          </select>
                          @error('status')
                          <code>*{{$message}}</code>
                          @enderror
                        </div>
                      </div>                     
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Post Approved</label>
                          <select class="form-control" name="is_approved" >
                              @if(isset($post))
                              <option value="{{$post->status}}">{{$post->status == 1 ? 'Publish' : 'Pending'}}</option>
                              @else
                              <option value=" ">Select</option>
                              @endif
                              <option value="1">Publish</option>
                              <option value="0">Pending</option>                           
                          </select>
                          @error('is_approved')
                          <code>*{{$message}}</code>
                          @enderror
                        </div>
                      </div>
                      
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-sm-12">
                      <div class="form-group">                        
                        <label>Upload Image</label>
                        <div class="custom-file">
                          <input type="file" name="photo" class="custom-file-input" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @error('photo')
                          <code>*{{$message}}</code>
                        @enderror
                      </div>
                      @if(isset($post))
                      <img src="{{asset($post->photo)}}" class="img-fluid mb-4 post-data" alt="{{$post->title}}">
                      @endif
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Description</label>
                              <textarea id="summernote" name="description">{!!@$post->status == 1 ? @$post->description : 'আস-সালামু আলাইকুম'!!}</textarea>
                          @error('description')
                          <code>*{{$message}}</code>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-center">                     
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Select Tag</label>
                          <div class="form-check d-flex">
                            @foreach($tags as $key=>$tag)
                            <div class="me-2" style="width:160px">
                              <input class="form-check-input" type="checkbox"  name="tag_ids[]" value="{{$key}}" @if(isset($post)){{ in_array($key, $selected_tags) ? 'checked' : '' }} @endif>
                              <label class="form-check-label">{{$tag}}</label>                                
                            </div>                              
                            @endforeach               
                          </div>
                          @error('tag_ids')
                          <code>*{{$message}}</code>
                          @enderror
                        </div>
                      </div>                      
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{(@$post)?'Update':'Submit'}}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('js')
  <script>
    $('#title').on('input',function(){
      let title = $(this).val()
      let slug = title.replaceAll(' ','-')
      $('#slug').val(slug.toLowerCase())
    })
    
  </script>
@endpush
@push('js')

  <script>
    $('#category_id').on('change',function(){
      let category_id = $(this).val()
      $('#sub_category_id').empty()
      $('#sub_category_id').append('<option value=" ">Select</option>')

      axios.get(window.location.origin+'/admin/sub-category-by-category-id/'+category_id).then(res=>{
       let sub_category = res.data
         
      sub_category.map((sub_category , index)=>(
        $('#sub_category_id').append(`<option value="${sub_category.id}">${sub_category.name}</option>`)
       ))
      })
    })

    $('#customFile').on('input',function(){
      $('.post-data').attr('class','d-none')
    })
  </script>  
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote({
        height: 350,
        colors: [['#FFFF00', '#FF0000', '#00FF00', '#0000FF']],
        // http://chir.ag/projects/name-that-color/
        colorsName: [['Yellow', 'Red', 'Green', 'Blue']],
        colorButton: {
          foreColor: '#000000',
          backColor: '#transparent'
        }
      });
    });
  </script>
@endpush