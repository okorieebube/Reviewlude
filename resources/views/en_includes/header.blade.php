<header class="header">
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="index-5.html"><img src="{{ asset('en/img/logo-white-1x.png')}}" width="120" alt="logo"
                                                           class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>

            <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                <form action="#" method="post" class="subscribe-form">
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control input home-search" id="email" name="email"
                               placeholder="Search for a business...">
                        <input type="submit" class="button btn solid-btn" id="submit" value="Search">
                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link page-scroll" href="#about">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('view_categories') }}">Categories</a>
                    </li>
                    {{-- view_categories --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link page-scroll dropdown-toggle" href="#" id="navbarDropdownHome" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Join Us
                        </a>
                        <div class="dropdown-menu submenu" aria-labelledby="navbarDropdownHome">
                            <a class="dropdown-item" href="{{ route('register_business') }}">Business</a>
                            <a class="dropdown-item" href="{{ route('register_reviewer') }}">Reviewer</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link page-scroll dropdown-toggle" href="#" id="navbarBlogPage" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog <span class="custom-nav-badge badge badge-danger badge-pill">New</span>
                        </a>

                        <div class="dropdown-menu submenu" aria-labelledby="navbarBlogPage">
                            <a class="dropdown-item" href="blog-default.html">Blog Grid</a>
                            <a class="dropdown-item" href="blog-left-sidebar.html">Blog Left Sidebar</a>
                            <a class="dropdown-item" href="blog-single-right-sidebar.html">Details Right Sidebar</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!--end navbar-->
</header>
