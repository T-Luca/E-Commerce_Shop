@extends('layouts.master')

<link rel="stylesheet" href="css/image.css">

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif


    <!-- Search Products -->
    <div class="container box">
        <form class="navbar-form" action="/search" method="POST" role="search" autocomplete="off">
            {{ csrf_field() }}
            <div class="input-group" style="z-index:1; position: absolute; top: 8px; left: 40%;">
                <input type="text" class="form-control" name="q" id="title" class="form-control input-lg" placeholder="Enter Product Name" />
                <div id="productList">
                </div>
            </div>
            {{ csrf_field() }}
        </form>
    </div>

    <script>
        $(document).ready(function(){

            $('#title').keyup(function(){
                var query = $(this).val();
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('autocomplete.fetch') }}",
                        method:"POST",
                        data:{query:query, _token:_token},
                        success:function(data){
                            $('#productList').fadeIn();
                            $('#productList').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function(){
                $('#title').val($(this).text());
                $('#productList').fadeOut();
            });

        });
    </script>

    <!-- Carousel
    <div align="center">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol> -->

            <!-- Wrapper for slides
            <div class="carousel-inner">
                <div class="item active">
                    <img src="https://media4.s-nbcnews.com/j/newscms/2018_36/2556201/180905-gift-guide_806f8770eaefd169983a8e3d81df36c8.nbcnews-fp-1024-512.jpg" style="width:70%;">
                </div>

                <div class="item">
                    <img src="http://adiyprojects.com/wp-content/uploads/2019/01/Expensive-Gadget.jpg" style="width:70%;">
                </div>

                <div class="item">
                    <img src="https://thewirecutter.com/wp-content/uploads/2018/01/20180109_wc_ces_8up.png" style="width:70%;">
                </div>
            </div> -->

            <!-- Left and right controls
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> -->

        <!-- Audio Player
        <div align="center">
            <audio controls>
                <source src="music/blueShark.mp3" type="audio/mpeg">
                Your browser does not support the audio tag.
            </audio>
        </div>
        </br>
    </div> -->


    @include('shop.prodfilter')
    @foreach($products->chunk(3) as $productChunk)
        <div class="row" style="background-color:#ff2c21">
            </br>
            @foreach($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="{{ url('shop', [$product->id]) }}"><img class="zoom" src="{{ $product->imagePath }}" height="150" width="150" alt="..." class="img-responsive"></a>
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

@section('paginate')
    {{ $products->links() }}
@endsection

