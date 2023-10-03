@extends('backend.layouts.master')

@section('title','Tag')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" >
      <div class="container-fluid">
        <div class="row mt-3 justify-content-center">
          <div class="col-sm-11">
            <h3>➧ tags</h3>
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
                <h3 class="card-title">Tag List</h3>
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
                <table class="table  table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Tag Status</th>                      
                      <th>Order By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $sl=1 @endphp

                    @foreach($tags as $tag)
                    <tr>
                      <td>{{$sl++}}</td>
                      <td>{{$tag->name}}</td>
                      <td><span class="badge badge-success">{{$tag->status == 1 ? 'Active' : 'Inactive'}}</span></td>                      
                      <td>{{$tag->order_by}}</td>
                      <td>
                        <div class="d-flex">
                          <a href="{{route('tag.edit',$tag->id)}}"><button class="btn btn-sm btn-warning"><i class="fa-solid fa-edit "></i></button></a> 
                          <form method="post" id="{{'form_'.$tag->id}}" action="{{route('tag.destroy',$tag->id)}}">
                            @csrf
                            @method('delete')
                            <button type="button" data-id="{{$tag->id}}" class="delete btn btn-sm btn-danger mx-1"><i class="fa-solid fa-trash "></i></button>
                          </form>
                        </div>                         
                    </td>                      
                    </tr>
                    @endforeach      
                  </tbody>
                </table>
              </div>
              <div class="card-footer" ></div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
         <div class="col-12 my-4">
          <a href="{{route('tag.create')}}"> <button class=" btn btn-primary btn-md">➥ Create</button></a>
         </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
