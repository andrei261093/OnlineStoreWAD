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
            <a class="navbar-brand" href="{{route('product.index')}}">WAD Project</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach(\App\Category::all() as $category)
                            <li><a href="{{ route('product.id',[$category->id]) }}">{{$category->name}}</a></li>
                        @endforeach
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('product.index')}}">All</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search Product">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{Route('product.shoppingCart')}}">
                        Shhopping Cart
                        <span class="badge">{{\Illuminate\Support\Facades\Session::has('cart') ? \Illuminate\Support\Facades\Session::get('cart')->totalQty : '' }}</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        @if(Auth::user())
                            {{Auth::user()->firstName}} {{Auth::user()->lastName}}
                        @endif
                        @if(!Auth::user())
                            Users
                        @endif
                        <span class="caret"></span></a>
                    @if(Auth::user())
                        <ul class="dropdown-menu">

                            <li><a href="{{route('user.profile')}}">Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('user.logout')}}">Logout</a></li>
                        </ul>
                    @endif
                    @if(!Auth::user())
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user.signin') }}">Login</a></li>
                            <li><a href="{{ route('user.signup') }}">Sign up</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    @endif

                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>