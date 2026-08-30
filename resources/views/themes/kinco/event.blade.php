@extends('themes.' . config('theme.active') . '.layouts.blog')
@section('content')
 

          




    <section class="tf-page-title">
                <div class="overlay"></div>
                <img src="/themes/{{ config('theme.active') }}//themes/{{ config('theme.active') }}/assets/images/background/img1innerpage.png" class="bg-inner1" alt="">
                <img src="/themes/{{ config('theme.active') }}//themes/{{ config('theme.active') }}/assets/images/background/img2innerpage.png" class="bg-inner2" alt="">
                <img src="/themes/{{ config('theme.active') }}//themes/{{ config('theme.active') }}/assets/images/background/img4innerpage.png" class="bg-inner3" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title inner">
                                <h1 class="title">{{ $event->title }}</h1>
                                <div class="breadcrumbs">
                                    <ul class="jus-ct">
                                        <li><a href="/" class="f-rubik">Trang chủ</a></li>
                                        <li><p class="breadcrumbs-inner f-rubik"><a href="/tin-tuc" class="f-rubik">Tin tức</a></p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </section>


<section class="tf-section tf-blog-details">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                            <article class="article">
                                <div class="feature-article wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="visibility: hidden; animation-duration: 1200ms; animation-delay: 0.3ms; animation-name: none;"><img src="/get_photo/{{$event->photo_id}}/1024" alt="Image"></div>
                                <div class="meta-post st-2">
                                    <ul class="fx">
                                        <li class="fx"><i class="far fa-calendar-alt clr-pri-3"></i>25 Dec 2021</li>
                                        <li class="fx"><i class="far fa-comment-alt-dots clr-pri-3"></i>Comments (05)</li>
                                    </ul>
                                </div>
                                <h3 class="title-article clr-pri-2">{{ $event->title }}</h3>
                                <p class="wrap st-1 f-rubik">
                             {!! $event->content !!}   </p>

                              
                              
                    <div class="row">
                        <div class="col-12">
                            <div class="title-heading st-4">
                                <div class="sub-heading clr-pri-3 f-mulish">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="77" height="30" viewBox="0 0 77 30">
                                        <g>
                                          <image width="77" height="30" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEPklEQVRogd2Ze4hVVRTGf+pNHRtnegxqlonUMJYGY/pXWoFEJpVBTFRDaBbOVmxC/5GUUFJMqQh6MLUjfARBUVGEYi9rqFQU0UrQ8pXvMkcLmbJSZ2TdvlOHy73de+fOmXPv/eCwD+ewz9n7O2utb611enU2NZEGA4F+QFu6m2UF7/PeTe8M17cA48qesC4iHWk3AiOB70tiBzEgHWmfAr8CB8p+911EKmn1wGXAlyWzgxiQStpyjZ+V/c4LQCI0tQKYqPN8SDPia2Wl1wBXSH0D/AYcB3YD3wL7gY64N14IwqRNAi4CjuQgAv2Be3RMkksHOAOcBs6KvEqgT+h+m+LmWuAD4PeiYSNHhEm7S+P6/5l6FTAXeBSoFgGfAJ8D3wG7RFgY9iGuliKPByYA9wMPAu3A28CzwA9xEpEPwqTdprE1zfxLgSeBZrnje8BKWcz5LO8zi9unY62uDQIagNn6AI8AbwHzgYM9S0H+CIRgGDBc51+nPKVBFjQHWK34ZZbyUQ6EZcIvQAswGpgMbJfl2XueSHHnokNA2q0ajwF7dW7C8DrwjoL3GGAG8GM3bqJT5Fv18bDi4TK5+5XFTtp4jZs1mvt8oY2YW96smBUVOmXFo4B1wC0q5cb0PCXZEZAW1JlbFOw3KnDfASwtwA3zxc/A3RKGoUqyb+qhd+eM3hKDGzThkISgWtYVR5JrH2ieRKFSllcfwzoywki7Xm0gwyLgEiW5O2Jem1UnC4Aqxb1hsa7GuRqcszifJO260K0RwL1FQFgAE4VXgMFKhAfEuJYXgT9wLpFQ7AqwSBVB2B0sYz8FnIxnrTwO1Mn6jcBpPb4C5yxMTElmFt6fS2hBAZ7WkQ5nFPMOA3tUR34F7Ix4yeeAB5TLTQU2Aa9G/M5UPARcDLyMRKA9x4kVIrguVD0YjgIfqkpojUhpTyihtue/AGyT0kcP5/oqtqKEPElak9IKc8leoUUMUGFeJRWz43KlAoOUfAbjLB3m2quAJcDf3byhDaoWngPeBcaKzKgxRyLUjPdnCdWeB7tY85mQ1KggNxG5VqT2jYA0w/PK20ys3pfF/xnBe/6Bc1bmPSXvaQkuJ7JMy4YO1ZF2bI1s8f+hU0JQqyrmDdWs3R8SnBuqBkP/ZGfG+397gJn+RhUz2qVkFkvvE3HdW+A7NwT4WB60Hu83hG+XImnop8/t6uc1AmuUlBcO5+qk0KP1Ye5MfWah7hkndqqwX6Ma2RoKj0nJ84dzZkAzgWeUXhxIdn+8/yv1WZn+sJcSTIjelOWhfuBidaBz+RfRT+6+UNaFWlONeH883YRStrQAbfpPMVXdkQlqwf+kuGSu9o1+7nRoz4NF0ES5X5WedULkvRYO/KkoB0sLwxLw6WrLj8x9WrLxugJ4Ce+zJvvlRloYRpq10i1pt6aEJeIWqyxGmdVZzLKqohXvg+ZrdgAXAIwK6LO/4gPOAAAAAElFTkSuQmCC"></image>
                                        </g>
                                    </svg>
                                    <span class="inner-sub st-1">Hình ảnh</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="77" height="30" viewBox="0 0 77 30">
                                        <g>
                                          <image width="77" height="30" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII="></image>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <?php
                            foreach($files as $file)
                            {
                            ?>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                            <div class="sc-gallery wow fadeIn   animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 0.3ms;">
                                <div class="box-feature active">
                                    <img style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover;" src="<?php echo $file->thumbnail_path; ?>" alt="Image">
                                    <div class="overlay"></div>
                                    <div class="box-content">
                                        <h5 class="title"><a href="#" class=" clr-pri-2">Outdoor &amp; Gaming</a></h5>
                                        <p class="f-rubik">kindergarten</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php
                            }
                            ?>
                    </div>










                

                                <div class="tag-article">
                                    <div class="box-lt">
                                        <p class="title clr-pri-2">Popular Tags</p>
                                        <ul class="fx">
                                            <li>
                                                <a href="blog-grid.html" class="jus-ct f-rubik active">Agency</a>
                                            </li>
                                            <li>
                                                <a href="blog-grid.html" class="jus-ct f-rubik">Cosmetics</a>
                                            </li>
                                            <li>
                                                <a href="blog-grid.html" class="jus-ct f-rubik">Beauty</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="box-rt">
                                        <p class="title clr-pri-2">Share :</p>
                                        <ul class="fx">
                                            <li><a href="#" class="active"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="quotes-article st-2 fx wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="visibility: hidden; animation-duration: 1200ms; animation-delay: 0.3ms; animation-name: none;">
                                    <div class="box-feature"><img src="/themes/{{ config('theme.active') }}/assets/images/post/post-quotes1.jpg" alt="Image"></div>
                                    <div class="box-content">
                                        <h4 class="author clr-pri-2">Dennis R. Grimaldi</h4>
                                        <p class="wrap f-mulish">On the other hand we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire</p>
                                        <ul class="list-social fx">
                                            <li><a href="#" class="active"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                
                                
                                <div class="box-related">
                                    <h4 class="title st-1 fl-ctm-1">related post <span class="ctm-inner"></span></h4>
                                    <div class="box-blog-grid st-2">
                                        <div class="box-artice fl- wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="visibility: hidden; animation-duration: 1200ms; animation-delay: 0.3ms; animation-name: none;">
                                            <div class="box-feature inner-scale"><a href="blog-single.html"><img src="/themes/{{ config('theme.active') }}/assets/images/post/box-aricle7.jpg" alt="Image"></a></div>
                                            <div class="box-content">
                                                <div class="meta-post st-1">
                                                    <ul class="fx">
                                                        <li><a href="blog-single.html" class="fx"><i class="far fa-calendar-alt clr-pri-3"></i>25 Dec 2021</a></li>
                                                        <li><a href="blog-single.html" class="fx"><i class="far fa-comment-alt-dots clr-pri-3"></i>Comments (05)</a></li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-article-post"><a href="blog-single.html">Useful VS Code Extensions Fronts End Developer Smashing</a></h4>
                                                <div class="btn-rm">
                                                    <a href="blog-single.html" class="fl-btn st-4">
                                                        <span class="inner">read more</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-artice fl-scale wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="visibility: hidden; animation-duration: 1200ms; animation-delay: 0.3ms; animation-name: none;">
                                            <div class="box-feature inner-scale"><a href="blog-single.html"><img src="/themes/{{ config('theme.active') }}/assets/images/post/box-article9.jpg" alt="Image"></a></div>
                                            <div class="box-content">
                                                <div class="meta-post st-1">
                                                    <ul class="fx">
                                                        <li><a href="blog-single.html" class="fx"><i class="far fa-calendar-alt clr-pri-3"></i>25 Dec 2021</a></li>
                                                        <li><a href="blog-single.html" class="fx"><i class="far fa-comment-alt-dots clr-pri-3"></i>Comments (05)</a></li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-article-post"><a href="blog-single.html">Create A Headless WordPress Site  JAMstack Useful VS Code Extensions Fronts End Developer Smashing</a></h4>
                                                <div class="btn-rm">
                                                    <a href="blog-single.html" class="fl-btn st-4">
                                                        <span class="inner">read more</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-comment">
                                    <h4 class="title st-1 fl-ctm-1">Comments<span class="ctm-inner"></span></h4>
                                    <ol class="comment-list wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="visibility: hidden; animation-duration: 1200ms; animation-delay: 0.3ms; animation-name: none;">
                                        <li class="comment">
                                            <article class="comment-wrap border-st-2 clearfix">
                                                <div class="gravatar"><img alt="image" src="/themes/{{ config('theme.active') }}/assets/images/avata/comment1.jpg"></div>
                                                <div class="comment-content">
                                                    <div class="comment-author">Richard B. Zellmer</div>
                                                    <div class="comment-day f-rubik">25 November 2021</div>
                                                    <div class="comment-text f-mulish clr-pri-4">
                                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan doloremque laudantium totam rem aperiam eaque quae abillo inventore
                                                    </div>
                                                    <div class="comment-btn">
                                                        <a href="#" class="fl-btn st-5">
                                                            <span class="inner">REPLY</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                            <ul class="children">
                                                <li class="comment">
                                                    <article class="comment-wrap clearfix">
                                                        <div class="gravatar"><img alt="image" src="/themes/{{ config('theme.active') }}/assets/images/avata/comment2.jpg"></div>
                                                        <div class="comment-content">
                                                            <div class="comment-author">Michael G. Smith</div>
                                                            <div class="comment-day f-rubik">25 November 2021</div>
                                                            <div class="comment-text f-mulish clr-pri-4">
                                                                On the other hand, we denounce with righteous indignation and dislike men beguiled and demoralized by the charms of pleasure
                                                            </div>
                                                            <div class="comment-btn">
                                                                <a href="#" class="fl-btn st-5">
                                                                    <span class="inner">REPLY</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </li><!-- #comment-## -->
                                            </ul><!-- .children -->
                                        </li><!-- #comment-## -->
                                        <li class="comment ">
                                            <article class="comment-wrap border-st-3 clearfix">
                                                <div class="gravatar"><img alt="image" src="/themes/{{ config('theme.active') }}/assets/images/avata/comment3.jpg"></div>
                                                <div class="comment-content">
                                                    <div class="comment-author">Davis L. Orenstein</div>
                                                    <div class="comment-day f-rubik">25 November 2021</div>
                                                    <div class="comment-text f-mulish clr-pri-4">
                                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan doloremque laudantium totam rem aperiam eaque quae abillo inventore
                                                    </div>
                                                    <div class="comment-btn">
                                                        <a href="#" class="fl-btn st-5">
                                                            <span class="inner">REPLY</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        </li><!-- #comment-## -->
                                    </ol><!-- /.comment-list -->
                                    <div class="form-comment wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="visibility: hidden; animation-duration: 1200ms; animation-delay: 0.3ms; animation-name: none;">
                                        <h4 class="title st-2 fl-ctm-1">Leave A Reply<span class="ctm-inner"></span></h4>
                                        <form action="contact/contact-process2.php" method="post" id="commentform" class="comment-form" novalidate="novalidate">
                                            <div class="row-form st-1">
                                                <input type="text" placeholder="Full Name" name="name" id="name" class="name">
                                                <input type="email" placeholder="Email Address" name="mail" id="mail" class="mail">
                                            </div>
                                            <input type="text" placeholder="website" id="website" name="website" class="website">
                                            <textarea placeholder="Leave Comments" id="leacomment" name="leacomment" class="leacomment"></textarea>
                                            <button type="submit" class="fl-btn st-6"><span class="inner">Send Comment</span></button>
                                        </form>
                                    </div>
                                </div>

                            </article>
                            
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                            <div id="sidebar" class="sidebar-style2 wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="visibility: hidden; animation-duration: 1200ms; animation-delay: 0.3ms; animation-name: none;">
                                <div class="inner-sidebar fl-st-1">
                                    <div class="widget widget-quote">
                                        <div class="box-feature">
                                            <div class="inner">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/post/post-quotes2.jpg" alt="Image">
                                                <div class="box-icon jus-ali-ct">
                                                    <i class="far fa-quote-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-content">
                                            <h5 class="author clr-pri-2">Patrick D. Smith</h5>
                                            <p class="wrap f-rubik">
                                                Sit amet consectetur adipiscing elit sed do eiusmod tempor didunt ut labore et dolore magna
                                            </p>
                                        </div>
                                    </div>

                                    <div class="widget widget-search st-2">
                                        <h4 class="title-widget fl-ctm-1">Search<span class="ctm-inner"></span></h4>
                                        <div class="form-search-widget">
                                            <form action="#">
                                                <input type="text" placeholder="Search Here">
                                                <button><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="widget widget-category st-2">
                                        <h4 class="title-widget fl-ctm-1">category<span class="ctm-inner"></span></h4>
                                        <div class="list-category">
                                            <ul>
                                                <li class="fx"><span class="st wd-ctm">Arts &amp; Drawing</span><span class="st">05</span></li>
                                                <li class="fx"><span class="st wd-ctm">Basic Language</span><span class="st">02</span></li>
                                                <li class="fx"><span class="st wd-ctm">Graphics Design</span><span class="st">07</span></li>
                                                <li class="fx"><span class="st wd-ctm">Web Development</span><span class="st">04</span></li>
                                                <li class="fx"><span class="st wd-ctm">Lifestyle</span><span class="st">06</span></li>
                                                <li class="fx"><span class="st wd-ctm">GYM &amp; Gaming</span><span class="st">05</span></li>
                                                <li class="fx"><span class="st wd-ctm">Events &amp; Party</span><span class="st">05</span></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="widget widget-news st-2">
                                        <h4 class="title-widget fl-ctm-1">recent news<span class="ctm-inner"></span></h4>
                                        <ul class="list-news">
                                            <li class="fx">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget1.jpg" alt="Image" class="feature">
                                                <ul class="box-content">
                                                    <li><h6 class="title"><a href="blog-grid.html">Bake Layers Accesilit Testing Supporte</a></h6></li>
                                                    <li><a href="blog-grid.html" class="fx meta-news clr-pri-4"><i class="far fa-calendar-alt"></i><span class="f-rubik">25 nov 2021</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="fx">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget2.jpg" alt="Image" class="feature">
                                                <ul class="box-content">
                                                    <li><h6 class="title"><a href="blog-grid.html">Bake Layers Accesilit Testin Supporte</a></h6></li>
                                                    <li><a href="blog-grid.html" class="fx meta-news clr-pri-4"><i class="far fa-calendar-alt"></i><span class="f-rubik">25 nov 2021</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="fx">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget3.jpg" alt="Image" class="feature">
                                                <ul class="box-content">
                                                    <li><h6 class="title"><a href="blog-grid.html">Bake Layers Accesilit Testin Supporte</a></h6></li>
                                                    <li><a href="blog-grid.html" class="fx meta-news clr-pri-4"><i class="far fa-calendar-alt"></i><span class="f-rubik">25 nov 2021</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="fx">
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget4.jpg" alt="Image" class="feature">
                                                <ul class="box-content">
                                                    <li><h6 class="title"><a href="blog-grid.html">Bake Layers Accesilit Testin Supporte</a></h6></li>
                                                    <li><a href="blog-grid.html" class="fx meta-news clr-pri-4"><i class="far fa-calendar-alt"></i><span class="f-rubik">25 nov 2021</span></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="widget widget-tag st-2">
                                        <h4 class="title-widget fl-ctm-1">best tags<span class="ctm-inner"></span></h4>
                                        <ul class="list-tag">
                                            <li><a href="shop-details.html" class="f-rubik active">Technology</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">service</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">team</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">solutions</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">consultancy</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">It Company</a></li>
                                            <li><a href="shop-details.html" class="f-rubik">agency</a></li>
                                        </ul>
                                    </div>

                                    <div class="widget widget-gallery st-2">
                                        <h4 class="title-widget fl-ctm-1">photo gallery<span class="ctm-inner"></span></h4>
                                        <div class="list-gallery fx">
                                            <div class="box-photo">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget5.jpg" alt="Image">
                                            </div>
                                            <div class="box-photo active">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget1.jpg" alt="Image">
                                            </div>
                                            <div class="box-photo">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget6.jpg" alt="Image">
                                            </div>

                                            <div class="box-photo">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget7.jpg" alt="Image">
                                            </div>
                                            <div class="box-photo">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget3.jpg" alt="Image">
                                            </div>
                                            <div class="box-photo">
                                                <div class="overlay fx"><i class="fal fa-plus"></i></div>
                                                <img src="/themes/{{ config('theme.active') }}/assets/images/thumbnails/widget8.jpg" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div><!--/inner-sidebar-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
@endsection
