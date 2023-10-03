@extends('backend.layouts.master')

@push('css')
<style>
  .post_image{cursor: pointer;}
  hr{margin:0 !important;}
  .card-body::-webkit-scrollbar{
    height: 8px;
    width: 9px;
    background-color: #F5F5F5;
    overflow-y: scroll;
    margin-bottom: 25px;
  }
  .card-body::-webkit-scrollbar-track{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 50px;
    background-image: -webkit-linear-gradient(90deg,transparent,rgba(0, 0, 0, 0.4) 50%,transparent,transparent)
  }
  .card-body::-webkit-scrollbar-thumb{
    border-radius: 50px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }
  .card-footer {padding:0 !important;display:flex !important; justify-content: end !important;}
  .pagination {margin: -10px!important;}

</style>
@endpush
@section('title','Post')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" >
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
          <div class="col-11">
            <div class="card">
              <div class="card-header" style="background:#3f6791">
                <h3 class="card-title">Post List</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Post Status</th>                      
                      <th>Post Approved</th>
                      <th>Category Name</th>                      
                      <th>Sub Category Name</th>                      
                      <th>User Name</th>                      
                      <th>Tags</th>                      
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $sl=1 @endphp

                    @foreach($posts as $post)
                    <tr>
                      <td>{{$sl++}}</td>
                      <td><img src="{{asset($post->photo)}}" data-src="{{asset($post->photo)}}" class="post_image" style="width:100px;height:50px;object-fit: cover;" alt="{{$post->title}}"></td>
                      <td>{{$post->title}}</td>
                      <td><span class="badge badge-success">{{$post->status == 1 ? 'Active' : 'Inactive'}}</span></td>                      
                      <td><span class="badge badge-success">{{$post->is_approved == 1 ? 'Publish' : 'Pending'}}</span></td>
                      <td>{{$post->category->name}}</td>                      
                      <td>{{$post->sub_category->name}}</td>                      
                      <td><span class="badge bg-light text-dark ">{{$post->user->name}}</span></td>             
                      <td>
                        @foreach($post->tag as $tag)
                        <span class="badge rounded-pill bg-info text-dark">{{$tag->name}}</span>
                        @endforeach
                      </td>                      
                      <td class="m-1">{{$post->created_at->format('d-m-Y')}}</td>
                      <td>{{$post->created_at != $post->updated_at ? $post->updated_at->format('d-m-Y'): 'Not Updated Yet'}}</td>
                      <td>
                        <div class="d-flex">
                          <a href="{{route('post.show',$post->id)}}"><button class="btn btn-sm btn-info"><i class="fa-solid fa-eye "></i></button></a> 
                          <a href="{{route('post.edit',$post->id)}}"><button class="btn btn-sm btn-warning mx-1"><i class="fa-solid fa-edit "></i></button></a> 
                          <form method="post" id="{{'form_'.$post->id}}" action="{{route('post.destroy',$post->id)}}">
                            @csrf
                            @method('delete')
                            <button type="button" data-id="{{$post->id}}" class="delete btn btn-sm btn-danger "><i class="fa-solid fa-trash "></i></button>
                          </form>
                        </div>                         
                    </td>                      
                    </tr>
                    @endforeach      
                  </tbody>
                </table>
                
              </div>
              <div class="card-footer p-3">{{$posts->links()}}</div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->

         <div class="col-12 my-4">
          <a href="{{route('post.create')}}"> <button class=" btn btn-primary btn-md">➥ Create</button></a>
         </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <button type="button" class="btn btn-primary d-none" id="image_show_button" data-bs-toggle="modal" data-bs-target="#image_show"></button>

    <!-- Modal -->
    <div class="modal fade" id="image_show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Blog Image</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img class="img-fluid" id="display_image">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('js')
  <script>
    $('.delete').on('click',function(){
      let id = $(this).attr('data-id')

      Swal.fire({
      title: 'Are you sure to delete?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $(`#form_${id}`).submit()
      }
    })
    }) 
    
    
    $('.post_image').on('click',function(){
      let img = $(this).attr('data-src')
      $('#display_image').attr('src',img)
      $('#image_show_button').trigger('click')
    })

  </script>
@endpush

@if(session()->has('msg'))
  @push('js')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: '{{session('cls')}}',
        toast: true,
        title: "<span style='color:#454d55bf'>" + '{{session('msg')}}' + "</span>",
        showConfirmButton: false,
        timer: 10000
      })      
    </script>
  @endpush
@endif
