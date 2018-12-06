@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach()
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Product <a href="{{ route('products.index') }}" class="label label-primary pull-right">Back</a>
                </div>
                <div class="panel-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" class="form-control" value="{{ $product->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Image Path</label>
                            <div class="col-sm-10">
                                <textarea name="imagePath" id="imagePath" class="form-control">{{ $product->imagePath }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Price</label>
                            <div class="col-sm-10">
                                <textarea name="price" id="price" class="form-control">{{ $product->price }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-default" value="Update Product" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection