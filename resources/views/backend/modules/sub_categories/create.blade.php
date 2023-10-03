@extends('backend.layouts.master')
 
@section('title','Sub Category')
@section('content')
<div class="wrapper">  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mt-3 justify-content-center">
          <div class="col-sm-11">
            <h3>➧ Sub Categories</h3>
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
              @if(isset($subCategory))
              <h3 class="card-title">Edit Sub Category</h3>
              @else
              <h3 class="card-title">Create Sub Category</h3>
              @endif                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{(@$subCategory) ? route('sub-category.update',$subCategory->id) : route('sub-category.store')}}">
                @csrf  

                @if(isset($subCategory))
                  @method('put')
                @endif 
                               
                <div class="card-body">
                    <div class="row justify-content-center">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Name</label>
                          <input id="name" type="text" name="name" value="{{@$subCategory->name}}" class="form-control" placeholder="Enter Sub Category Name" >
                          @error('name')
                          <code>*{{$message}}</code>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Slug</label>
                          <input id="slug" type="text" name="slug" value="{{@$subCategory->slug}}" class="form-control" placeholder="Enter Sub Category Slug">
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
                          <select class="form-control" name="category_id" >
                              @if(isset($subCategory))
                              <option value="{{$subCategory->category_id}}">{{$subCategory->category->name}}</option>
                              @else
                              <option value=" ">Select</option>
                              @endif
                              @foreach($categories as $key=>$category)
                              <option value="{{$key}}">{{$category}}</option>
                              @endforeach                         
                          </select>
                          @error('status')
                          <code>*{{$message}}</code>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Sub Category Status</label>
                          <select class="form-control" name="status" >
                              @if(isset($subCategory))
                              <option value="{{$subCategory->status}}">{{$subCategory->status == 1 ? 'Active' : 'Inactive'}}</option>
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
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Sub Category Serial</label>
                          <input type="number" name="order_by" value="{{@$subCategory->order_by}}" class="form-control" placeholder="Enter Sub Category Serial">
                          @error('order_by')
                          <code>*{{$message}}</code>
                          @enderror
                        </div>
                      </div>
                      
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{(@$subCategory)?'Update':'Submit'}}</button>
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
    $('#name').on('input',function(){
      let name = $(this).val()
      let slug = name.replaceAll(' ','-')
      $('#slug').val(slug.toLowerCase())
    })
  </script>
@endpush