@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-11 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('products.add') }}"> Add Products</a>
                    </div>
                </div>
            </div>
            <!-- Table content -->
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Products Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th style="width: 100px">Action</th>
                            </tr>

                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->title }} </td>
                                    <td>{{ $product->description }} </td>
                                    <td><img src="{{ $product->imagePath }}" height="100" width="100"></td>
                                    <td>{{ $product->price }} </td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="label label-warning">Edit</a>
                                        <a href="{{ route('products.delete', $product->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </section>
        </div>
    </div>
@endsection