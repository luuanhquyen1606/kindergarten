@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')
    <section class="page-title">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-6 col-xs-12 pull-left">
                        <h1>{{ $post->title }}</h1>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 pull-right text-right path"><a href="index.html">Home</a> &gt; <a href="#">Single Post</a>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
        </section>

        <div class="sidebar-page">
            <div class="container">
                <div class="row clearfix">
                    <!--Content Side-->
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <section class="blog-container">
                            <!--Blog Post-->
                            <article class="blog-post style-two">
                                <div class="post-inner">
                                    <div class="image-box">
                                        <figure>
                                            <a href="#"><img src="images/blog/sb.png" alt="">
                                            </a>
                                        </figure>

                                    </div>
                                    <div class="post-header">
                                        <ul class="post-info">
                                            <li><span class="flaticon-black"></span>  Jone Doe </li>
                                            <li><span class="flaticon-comments"></span>  4 Comments </li>
                                        </ul>
                                        <h1><a href="blog-details.html">{!! $post->title !!}</a></h1>
                                    </div>
                                    <div class="post-desc">
                                        {!! $post->content !!}
                                    </div>

                                </div>






                        



                                
                            </article>

                        <div class="row" style="padding: 0px !important">
                            <?php
                            foreach($files as $file)
                            {
                            ?>
                            <div class="col-md-3 col-sm-3 col-xs-3" style="padding: 5px !important">
                                <div class="item">
                                    <div class="image-box square-box">
                                        <img src="<?php echo $file->thumbnail_path; ?>" alt="Awesome Image">
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <style>
                                .square-box{
                                   aspect-ratio: 1 / 1;
                                    width: 100%;
                                    overflow: hidden;
                                }
                                .square-box img {
                                   width: 100%;
                                    height: 100%;
                                    object-fit: cover;       /* keeps aspect ratio */
                                    object-position: center; /* center the image */
                                }
                            </style>
                            
                        </div>
                    
                            <div class="leave-comment">
                                <div class="section-title">
                                    <h3>Leave a Comment</h3>
                                </div>
                                <div class="default-form-area">
                                    <form id="contact-form" name="contact_form" class="default-form" action="inc/sendmail.php" method="post" novalidate="novalidate">
                                        <div class="row clearfix">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group style-two">
                                                    <textarea name="form_message" class="form-control textarea required" placeholder="Comment" aria-required="true"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <div class="form-group style-two">
                                                    <input type="text" name="form_name" class="form-control" value="" placeholder="Name" required="" aria-required="true">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group style-two">
                                                    <input type="email" name="form_email" class="form-control required email" value="" placeholder="Email" required="" aria-required="true">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group style-two">
                                                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                                    <button class="thm-btn thm-color" type="submit" data-loading-text="Please wait...">Apply Now</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>


                            



                        </section>
                    </div>
                    <!--Content Side-->

                    <!--Sidebar-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <aside class="sidebar">
                            <!-- Popular Categories -->
                            <div class="widget popular-categories wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                <div class="sidebar-title">
                                    <h3>Categories</h3>
                                </div>

                                <ul class="list">
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Educations (6)</a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Childs (9)</a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Design (3)</a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Daily Meals (5)</a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Teachers (7)  </a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span>Lifestyle (3) </a>
                                    </li>
                                    <li><a href="#"><span class="icon-left fa fa-chevron-right"></span> Uncategorized (2) </a>
                                    </li>
                                </ul>

                            </div>

                            <div class="widget popular-categories wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                <div class="sidebar-title">
                                    <h3>Popular Post</h3>
                                </div>

                                <ul class="list">
                                    <li><a href="#">Music Improve fugiat nulla</a>
                                    </li>
                                    <li><a href="#">Uncovers Ancient Ashkenaz tend</a>
                                    </li>
                                    <li><a href="#">Caring for a Pet Diabetic Kids</a>
                                    </li>
                                    <li><a href="#">Cras ultricies ligula magna libero</a>
                                    </li>
                                    <li><a href="#">Fatback sausage bacon ipsum kiela</a>
                                    </li>
                                </ul>

                            </div>

                            <div class="sidebar_tags wow fadeInUp animated animated" data-wow-duration="1500ms" style="visibility: visible; animation-name: fadeInUp; animation-duration: 1500ms;">
                                <div class="sidebar-title">
                                    <h3>Tags</h3>
                                </div>

                                <ul>
                                    <li><a href="#" class="tran3s">School</a>
                                    </li>
                                    <li><a href="#" class="tran3s">Study</a>
                                    </li>
                                    <li><a href="#" class="tran3s">English</a>
                                    </li>
                                    <li><a href="#" class="tran3s">Parents</a>
                                    </li>
                                    <li><a href="#" class="tran3s">Sports</a> </li>
                                    <li><a href="#" class="tran3s">News</a>
                                    </li>
                                    <li><a href="#" class="tran3s">Teachers</a> </li>
                                    <li><a href="#" class="tran3s">Art</a> </li>
                                    <li><a href="#" class="tran3s">Design</a> </li>
                                </ul>
                            </div>
                            <!-- End of .sidebar_tags -->


                        </aside>
                    </div>
                    <!--Sidebar-->
                </div>
            </div>
        </div>
@endsection
