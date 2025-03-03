@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Main/Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form action="{{ route('product.delete', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="DELETE">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $product->title }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <td>Count</td>
                                    <td>{{ $product->count }}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>{{ $product->preview_image }}</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>{{ $product->price . ' ' . '$' }}</td>
                                </tr>
                                <tr>
                                    <td>Past Price</td>
                                    <td>{{ $product->past_price . ' ' . '$' }}</td>
                                </tr>
                                <tr>
                                    <td>Content</td>
                                    <td>{{ $product->content }}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{ $product->category->title }}</td>
                                </tr>
                                <tr>
                                    <td>Group</td>
                                    <td>{{ $product->group->title == null ? '' : $product->group->title }}</td>
                                </tr>
                                <tr>
                                    <td>Tags</td>
                                    <td>
                                        <div class="form-group">
                                            <select name="tags[]" class="tags" multiple="multiple"
                                                    data-placeholder="Select tags"
                                                    style="width: 100%;">
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}" selected
                                                            disabled>{{ $tag->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Colors</td>
                                    <td>
                                        <div class="form-group">
                                            <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select color"
                                                    style="width: 100%;">
                                                @foreach($colors as $color)
                                                    <option value="{{ $color->id }}" selected>{{ $color->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
