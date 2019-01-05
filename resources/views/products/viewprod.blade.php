@extends('layouts.productdetails')

@section('content')

    <div class="container">

        <h1>{{ $product->title }}</h1>

        <hr>

        <div class="row">
            <div class="col-md-4">
                <img src="{{ $product->imagePath }}" alt="product" class="img-responsive" height="300" width="300">
            </div>

            <div class="col-md-8">
                <h3>${{ $product->price }}</h3>
                <h5>In Stock: {{ $product->stock }}</h5>
                <form>
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->title }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
                </form>

                <form>
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->title }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <a href="#" class="btn btn-warning pull-right" role="button">Add to Wishlist</a>
                </form>

                <br><br>
               <h3>{{ $product->description }}</h3>
            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->

        <div class="spacer"></div>

        <div class="row">
            <h3>You may also like...</h3>

            @foreach ($interested as $product)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a href="{{ url('shop', [$product->id]) }}"><img src="{{ $product->imagePath }}" alt="product" class="img-responsive"></a>
                            <h3>{{ $product->title }}</h3>
                                <p>{{ $product->price }}</p>

                        </div> <!-- end caption -->

                    </div> <!-- end thumbnail -->
                </div> <!-- end col-md-3 -->
            @endforeach

        </div> <!-- end row -->
        <div class="spacer"></div>
    </div> <!-- end container -->

@endsection