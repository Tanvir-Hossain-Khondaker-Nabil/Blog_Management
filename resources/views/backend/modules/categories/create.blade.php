@extends('backend.layouts.master')

@section('title','Category')
@section('content')
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mt-3 justify-content-center">
                    <div class="col-sm-11">
                        <h3>➧ Categories</h3>
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
                                @if(isset($category))
                                <h3 class="card-title">Edit Category</h3>
                                @else
                                <h3 class="card-title">Create Category</h3>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post"
                                action="{{(@$category) ? route('category.update',$category->id) : route('category.store')}}">
                                @csrf

                                @if(isset($category))
                                @method('put')
                                @endif

                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input id="name" type="text" name="name" value="{{@$category->name}}"
                                                    class="form-control" placeholder="Enter Category Name">
                                                @error('name')
                                                <code>*{{$message}}</code>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input id="slug" type="text" name="slug" value="{{@$category->slug}}"
                                                    class="form-control" placeholder="Enter Category Slug">
                                                @error('slug')
                                                <code>*{{$message}}</code>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Category Serial</label>
                                                <input type="number" name="order_by" value="{{@$category->order_by}}"
                                                    class="form-control" placeholder="Enter Category Serial">
                                                @error('order_by')
                                                <code>*{{$message}}</code>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Category Status</label>
                                                <select class="form-control" name="status">
                                                    @if(isset($category))
                                                    <option value="{{$category->status}}">
                                                        {{$category->status == 1 ? 'Active' : 'Inactive'}}</option>
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
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit"
                                        class="btn btn-primary">{{(@$category)?'Update':'Submit'}}</button>
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
    $('#name').on('input', function() {
        let name = $(this).val()
        let slug = name.replaceAll(' ', '-')
        $('#slug').val(slug.toLowerCase())
    })
    </script>
    @endpush