@extends('backend.layouts.master')

@push('css')
<style>
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
tbody, td, tfoot, th, thead, tr {border-color: #ffffff61 !important;}
</style>
@endpush
@section('title','Post')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row justify-content-center">
          <div class="col-12 mt-5">
            <div class="card ">
              <div class="card-header" style="background:#3f6791">
                <h3 class="card-title">Show Post</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                
                <table class="table ">
                    <tbody>
                        <tr>
                            <th style="width:200px">Image</th>
                            <td><img src="{{asset($post->photo)}}" data-src="{{asset($post->photo)}}" style="width:600px;height:300px;object-fit: cover;" alt="{{$post->title}}"></td>
                        </tr>
                        <tr>
                            <th style="width:200px">Title</th>
                            <td>{{$post->title}}</td>
                        </tr>
                        <tr>
                            <th style="width:200px">Category Name</th>
                            <td>{{$post->category->name}}</td>
                        </tr>
                        <tr>
                            <th style="width:200px">Sub Category Name</th>
                            <td>{{$post->sub_category->name}}</td>
                        </tr>
                        <tr>
                            <th style="width:200px">Author Name </th>
                            <td>{{$post->user->name}}</td>
                        </tr>
                        <tr>
                            <th style="width:200px">Tags </th>
                            <td>
                                @foreach($post->tag as $tag)
                                <span class="badge rounded-pill bg-info text-dark">{{$tag->name}}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th style="width:200px">Description</th>
                            <td>{!! $post->description !!}</td>
                        </tr>
                    </tbody>
                </table>
              </div>
              <div class="card-footer"></div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
         <div class="col-12 my-4">
          <a href="{{route('post.index')}}"> <button class=" btn btn-primary btn-md">➥ Table</button></a>
         </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->    
  </div>
  <!-- /.content-wrapper -->
@endsection

