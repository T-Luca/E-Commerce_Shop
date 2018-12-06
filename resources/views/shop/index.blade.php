@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="{{ url('shop', [$product->id]) }}"><img src="{{ $product->imagePath }}" height="150" width="150" alt="..." class="img-responsive"></a>
                        <div class="caption">
                            <a href="{{ url('shop', [$product->id]) }}">
                                <h3>{{ $product->title }}</h3>
                            </a>
                                <p class="description">{{ $product->description }}</p>
                            <div class="clearfix">
                                <div class="pull-left price">${{ $product->price }}</div>
                                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
