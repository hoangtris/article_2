<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <!-- Hiển thị dạng nút khi trên smart phone hay tablet -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                ...
            </button>
 
            <!-- hiển thị brand -->
            <a class="navbar-brand" href="#">My Blog</a>
        </div>
 
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 
            <!-- Menu trái -->
            <ul class="nav navbar-nav">
                <li>{!! link_to_route('articles.index', 'Blog') !!}</li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/about">About</a></li>
            </ul>
 
            <!-- Menu phải -->
            <ul class="nav navbar-nav navbar-right">
 
                @if (Auth::guest())
                    {{-- Khi mà chưa login --}}
 
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @else
                    {{-- Khi mà đang login --}}
 
                    <!-- Drop down menu -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>