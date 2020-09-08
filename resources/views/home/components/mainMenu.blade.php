<div class="header-bottom">
    <!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{ route('home.index') }}" class="active">Home</a></li>
                        @foreach ($categoriesLimit as $key => $categoriesLimitItem)
                            <li class="dropdown"><a href="#">{{ $categoriesLimitItem->name }}<i
                                        class="fa fa-angle-down"></i></a>
                               @include('home.components.childMainMenu')
                            </li>
                        @endforeach
                        <li><a href="404.html">404</a></li>
                        <li><a href="contact-us.html">Contact</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-sm-3">
                <div class="search_box pull-right">
                    <input type="text" placeholder="Search" />
                </div>
            </div>
        </div>
    </div>
</div>
