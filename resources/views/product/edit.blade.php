@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Product</h1>
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
                <form action="{{ route('product.update', $product->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Type Title" value="{{ $product->title }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" value="{{ $product->description }}" class="form-control" placeholder="Type description">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="content" cols="30" rows="10"
                                  placeholder="Type content">{{ $product->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" name="count" value="{{ $product->count }}" class="form-control" placeholder="count">
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" value="{{ $product->price }}" class="form-control" placeholder="price">
                    </div>
                    <div class="form-group">
                        <input type="number" name="past_price" value="{{ $product->past_price }}" class="form-control" placeholder="past_price">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" {{ $product->is_published != 0 ? ' checked=""' : '' }} name="is_published"
                                   value="{{ true }}">
                            <label class="form-check-label">Published</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" {{ $product->is_published == 0 ? ' checked=""' : '' }} name="is_published" value="{{ false }}">
                            <label class="form-check-label">Not Published</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile" >
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? ' selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="group_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Select group</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" {{ $group->id == $product->group_id ? ' selected' : '' }}>{{ $group->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select tags"
                                style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ $tag->products->contains($product->id) ? ' selected' : '' }}>{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select color"
                                style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}" {{ $color->products->contains($product->id) ? ' selected' : '' }}>{{ $color->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </div>

                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
