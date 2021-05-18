@php
    $title = 'Login';
@endphp
@include('en_includes.head')
<body>

<!--header section start-->
@include('en_includes.header')
<!--header section end-->

<!--body content wrap start-->
<div class="main">

    <!--header section start-->
    <section class="hero-section ptb-100 background-img"
             style="background: url('img/hero-bg-2.jpg')no-repeat center center / cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                        <h1 class="text-white mb-0">Blog Left Sidebar</h1>
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                <li class="list-inline-item breadcrumb-item"><a href="#">Home</a></li>
                                <li class="list-inline-item breadcrumb-item"><a href="#">Blog</a></li>
                                <li class="list-inline-item breadcrumb-item active">Blog Left Sidebar</li>
                            </ol>
                        </div>
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
                <div class="col-lg-4 col-md-4">
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
                                <li><a href="#">Journey <span class="float-right">112</span></a></li>
                                <li><a href="#">Development <span class="float-right">86</span></a></li>
                                <li><a href="#">Sport <span class="float-right">10</span></a></li>
                                <li><a href="#">Photography <span class="float-right">144</span></a></li>
                                <li><a href="#">Symphony <span class="float-right">18</span></a></li>
                            </ul>
                        </aside>

                        <!-- Recent entries widget-->
                        <aside class="widget widget-recent-entries-custom">
                            <div class="widget-title">
                                <h6>Recent Posts</h6>
                            </div>
                            <ul>
                                <li class="clearfix">
                                    <div class="wi"><a href="#"><img src="img/blog/1.jpg" alt="recent post" class="img-fluid rounded"/></a></div>
                                    <div class="wb"><a href="#">Map where your photos were taken and discover local points.</a><span class="post-date">May 8, 2016</span></div>
                                </li>
                                <li class="clearfix">
                                    <div class="wi"><a href="#"><img src="img/blog/2.jpg" alt="recent post" class="img-fluid rounded"/></a></div>
                                    <div class="wb"><a href="#">Map where your photos were taken and discover local points.</a><span class="post-date">May 8, 2016</span></div>
                                </li>
                                <li class="clearfix">
                                    <div class="wi"><a href="#"><img src="img/blog/3.jpg" alt="recent post" class="img-fluid rounded"/></a></div>
                                    <div class="wb"><a href="#">Map where your photos were taken and discover local points.</a><span class="post-date">May 8, 2016</span></div>
                                </li>
                            </ul>
                        </aside>

                        <!-- Subscribe widget-->
                        <aside class="widget widget-categories">
                            <div class="widget-title">
                                <h6>Newsletter</h6>
                            </div>
                            <p>Enter your email address below to subscribe to my newsletter</p>
                            <form action="#" method="post"
                                  class="d-none d-md-block d-lg-block">
                                <input type="text" class="form-control input" id="email-footer" name="email"
                                       placeholder="info@yourdomain.com">
                                <button type="submit" class="btn solid-btn btn-block btn-not-rounded mt-3">Subscribe</button>
                            </form>
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
                <div class="col-lg-8 col-md-8">

                    <!-- Post-->
                    <article class="post">
                        <div class="post-preview"><a href="#"><img src="img/blog/2-w.jpg" alt="blog"/></a></div>
                        <div class="post-wrapper">
                            <div class="post-header">
                                <h2 class="post-title"><a href="blog-single.html">Objectively communicate business core competencies </a></h2>
                                <ul class="post-meta">
                                    <li>November 18, 2016</li>
                                    <li><a href="#">Branding</a>, <a href="#">Design</a></li>
                                    <li><a href="#">3 Comments</a></li>
                                </ul>
                            </div>
                            <div class="post-content">
                                <p>Just then her head struck against the roof of the hall in fact she was now more than nine feet high and she at once took up the little golden key and hurried off to the garden door.	The first question of course was, how to get dry again: they had a consultation about this, and after a few minutes it seemed quite natural to Alice to find herself talking familiarly with them.</p>
                            </div>
                            <div class="post-more pt-4 align-items-center d-flex"><a href="#" class="btn solid-btn">Read more <span class="ti-arrow-right"></span></a></div>
                        </div>
                    </article>
                    <!-- Post end-->

                    <!-- Post-->
                    <article class="post">
                        <div class="post-preview"><a href="#"><img src="img/blog/3-w.jpg" alt="blog"/></a></div>
                        <div class="post-wrapper">
                            <div class="post-header">
                                <h2 class="post-title"><a href="blog-single.html">Objectively communicate business core competencies </a></h2>
                                <ul class="post-meta">
                                    <li>November 18, 2016</li>
                                    <li><a href="#">Branding</a>, <a href="#">Design</a></li>
                                    <li><a href="#">3 Comments</a></li>
                                </ul>
                            </div>
                            <div class="post-content">
                                <p>Just then her head struck against the roof of the hall in fact she was now more than nine feet high and she at once took up the little golden key and hurried off to the garden door.	The first question of course was, how to get dry again: they had a consultation about this, and after a few minutes it seemed quite natural to Alice to find herself talking familiarly with them.</p>
                            </div>
                            <div class="post-more pt-4 align-items-center d-flex"><a href="#" class="btn solid-btn">Read more <span class="ti-arrow-right"></span></a></div>
                        </div>
                    </article>
                    <!-- Post end-->

                    <!-- Post-->
                    <article class="post">
                        <div class="post-preview"><a href="#"><img src="img/blog/4-w.jpg" alt="blog"/></a></div>
                        <div class="post-wrapper">
                            <div class="post-header">
                                <h2 class="post-title"><a href="blog-single.html">Objectively communicate business core competencies </a></h2>
                                <ul class="post-meta">
                                    <li>November 18, 2016</li>
                                    <li><a href="#">Branding</a>, <a href="#">Design</a></li>
                                    <li><a href="#">3 Comments</a></li>
                                </ul>
                            </div>
                            <div class="post-content">
                                <p>Just then her head struck against the roof of the hall in fact she was now more than nine feet high and she at once took up the little golden key and hurried off to the garden door.	The first question of course was, how to get dry again: they had a consultation about this, and after a few minutes it seemed quite natural to Alice to find herself talking familiarly with them.</p>
                            </div>
                            <div class="post-more pt-4 align-items-center d-flex"><a href="#" class="btn solid-btn">Read more <span class="ti-arrow-right"></span></a></div>
                        </div>
                    </article>
                    <!-- Post end-->

                    <!-- Page Navigation-->
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="custom-pagination-nav">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-left"></span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Navigation end-->
                </div>
            </div>
        </div>
    </div>
    <!--blog section end-->

</div>
<!--body content wrap end-->

<!--footer section start-->
<footer class="footer-section">

    <!--footer top start-->
    <div class="footer-top py-5 background-img-2"
         style="background: url('img/footer-bg.png')no-repeat center top / cover">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-3 mb-3 mb-lg-0">
                    <div class="footer-nav-wrap text-white">
                        <img src="img/logo-white-1x.png" alt="footer logo" width="120" class="img-fluid mb-3">
                        <p>Holisticly empower premium architectures without value-added ideas. Seamlessly evolve
                            cross-platform experiences.</p>

                        <div class="social-list-wrap">
                            <ul class="social-list list-inline list-unstyled">
                                <li class="list-inline-item"><a href="#" target="_blank" title="Facebook"><span
                                        class="ti-facebook"></span></a></li>
                                <li class="list-inline-item"><a href="#" target="_blank" title="Twitter"><span
                                        class="ti-twitter"></span></a></li>
                                <li class="list-inline-item"><a href="#" target="_blank"
                                                                title="Instagram"><span class="ti-instagram"></span></a></li>
                                <li class="list-inline-item"><a href="#" target="_blank"
                                                                title="printerst"><span class="ti-pinterest"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 ml-auto mb-4 mb-lg-0">
                    <div class="footer-nav-wrap text-white">
                        <h5 class="mb-3 text-white">Others Links</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#">About Us</a></li>
                            <li class="mb-2"><a href="#">Contact Us</a></li>
                            <li class="mb-2"><a href="#">Pricing</a></li>
                            <li class="mb-2"><a href="#">Privacy Policy</a></li>
                            <li class="mb-2"><a href="#">Terms and Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 ml-auto mb-4 mb-lg-0">
                    <div class="footer-nav-wrap text-white">
                        <h5 class="mb-3 text-white">Support</h5>
                        <ul class="list-unstyled support-list">
                            <li class="mb-2 d-flex align-items-center"><span class="ti-location-pin mr-2"></span>
                                121 King Melbourne
                                <br>Australia 3000
                            </li>
                            <li class="mb-2 d-flex align-items-center"><span class="ti-mobile mr-2"></span> <a
                                    href="tel:+61283766284"> +61 2 8376 6284</a></li>
                            <li class="mb-2 d-flex align-items-center"><span class="ti-email mr-2"></span><a
                                    href="mailto:mail@example.com"> mail@example.com</a></li>
                            <li class="mb-2 d-flex align-items-center"><span class="ti-world mr-2"></span><a
                                    href="#"> www.yourdomain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-nav-wrap text-white">
                        <h5 class="mb-3 text-white">Location</h5>
                        <img src="img/map.png" alt="location map" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer top end-->

    <!--footer copyright start-->
    <div class="footer-bottom gray-light-bg pt-4 pb-4">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-6 col-lg-5"><p class="copyright-text pb-0 mb-0">Copyrights © 2020 All
                    rights reserved by
                    <a href="#">ThemeTags</a></p>
                </div>
            </div>
        </div>
    </div>
    <!--footer copyright end-->
</footer>
<!--footer section end-->
@include('en_includes.scripts')
<script>

$(document).ready(function() {


    // $('.enroll_modal').click(function(e) {
    //     e.preventDefault();
    //     append_id('enroll_id', '.enroll_form', '#enroll_modal', this)
    //     $('#enroll_modal').modal('toggle');
    // });

    // process form for creating live stream
    $('.login_btn').click(async function(e) {
        e.preventDefault();
        // console.log('yh');return;
        let data = [];
        // basic info
        let login = $('.login_form').serializeArray();
        console.log(login);
        // return;

        // append to form data object
        let form_data = set_form_data(login);
        let returned = await ajaxRequest('/login_acct', form_data);
        // console.log(returned);return;
        validator(returned, '/user/overview');
    });

});
</script>
