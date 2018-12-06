<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Laravel Shopping Cart Example')</title>
    <meta name="description" content="Laravel Shopping Cart Example">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Store CSRF token for AJAX calls -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    @yield('extra-css')


    <style>
        .spacer {
            margin-bottom: 100px;
        }
        .cart-image {
            width: 100px;
        }
        footer {
            background-color: #f5f5f5;
            padding: 20px 0;
        }
        .table>tbody>tr>td {
            vertical-align: middle;
        }
        .side-by-side {
            display: inline-block;
        }
    </style>
</head>
<body style="background-image: url(https://uploads-ssl.webflow.com/583347ca8f6c7ee058111b55/5acea005da5cf68de62c2356_xscp-blog-image.jpg); background-size: cover;">
@include('partials.header')

@yield('content')

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@yield('extra-js')

</body>
</html>