@php
$title = 'Categories';
$user = Auth::user();
@endphp
@include('en_includes.head')

<body>

    <!--header section start-->
    @include('en_includes.header')
    <!--header section end-->

    <!--body content wrap start-->
    <div class="main">

        <!--header section start-->
        <section class="hero-section ptb-100 background-img" style="background: url('{{ asset('en/img/hero-bg-2.jpg') }}')no-repeat center center / cover">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-7">
                        <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                            <h1 class="text-white mb-0 text-capitalize">Browse our categories</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--header section end-->

        <!--blog section start-->
        <div class="module ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 m-auto">
                        <div class="sidebar-left pr-4">

                            <!-- Search widget-->
                            <aside class="widget widget-search">
                                <form>
                                    <input class="form-control" type="search" placeholder="Type Search Words">
                                    <button class="search-button" type="submit"><span class="ti-search"></span></button>
                                </form>
                            </aside>


                            <!-- Categories widget-->
                            <aside class="widget widget-categories">
                                <div class="widget-title">
                                    <h6>Categories</h6>
                                </div>
                                <ul>
                                    @foreach ($categories as $e)
                                    <li><a href="{{route('view_products',$e->slug)}}">{{ $e->name }} <span class="float-right">{{ $e->no_of_products }}</span></a></li>
                                    @endforeach

                                </ul>
                            </aside>

                            <!-- Tags widget-->
                            <aside class="widget widget-tag-cloud">
                                <div class="widget-title">
                                    <h6>Tags</h6>
                                </div>
                                <div class="tag-cloud"><a href="#">e-commerce</a><a href="#">portfolio</a><a href="#">responsive</a><a href="#">bootstrap</a><a href="#">business</a><a href="#">corporate</a></div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--blog section end-->

    </div>
    <!--body content wrap end-->
    <!--footer section start-->
    @include('en_includes.footer')
    <!--footer section end-->
    @include('en_includes.scripts')
