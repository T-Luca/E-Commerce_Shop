<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body style="background-image: url(https://uploads-ssl.webflow.com/583347ca8f6c7ee058111b55/5acea005da5cf68de62c2356_xscp-blog-image.jpg); background-size: cover;">
@include('partials.header')
<div class="container">
        @if(isset($details))
            <p style="color:white;"> The Search results for your query <b style="color:red;"> {{ $query }} </b> are :</p>
            <h2 style="color:white;">Sample Product details</h2>
            <table class="table table-hover">
                <thead>
                <tr class="bg-primary">
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price($)</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

                @foreach($details as $product)
                    <tr class="bg-info">
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td><a href="{{ url('shop', [$product->id]) }}" target="_blank" title="SHOW" ><span class="glyphicon glyphicon-list"></span></a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @elseif(isset($message))
            <p>{{ $message }}</p>
        @endif
</div>
</body>
</html>