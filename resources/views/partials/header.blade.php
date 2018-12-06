<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('product.index') }}">E-Shop</a>
        </div>

        <!-- displays login type(user/admin) -->
        <div class="col-xs-1 text-center">
        @if(Auth::check() && Auth::user()->role_id == 1)
                <p style="color:grey;">Logged in as <span style="color:blue">Admin</span></p>
        @elseif(Auth::check() && Auth::user()->role_id == 0)
                <p style="color:grey;">Logged in as <span style="color:blue">User</span></p>
        @endif
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <!-- Search box -->
                <li>
                    <form class="navbar-form" action="/search" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" placeholder="Search products"> <span class="input-group-btn">
					        <button type="submit" class="btn btn-default">
						        <span class="glyphicon glyphicon-search"></span>
					        </button>
				            </span>
                        </div>
                    </form>
                </li>

                @if(Auth::check() && Auth::user()->role_id == 1)
                    <li>
                        <a href="/admin" role="button"
                           aria-expanded="false"><i class="fa fa-table" ></i> Admin Panel </a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('product.shoppingCart') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                        <span class="label label-danger">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> User Management <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())

                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('user.logout') }}">Logout</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>