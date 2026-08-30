@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')


    <!--Page Title-->
        <section class="page-title">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-6 col-xs-12 pull-left">
                        <h1><?php echo $teacher->name;?></h1>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 pull-right text-right path"><a href="/teachers">Home</a>&ensp;>&ensp;<a href="/teacher/<?php echo $teacher->slug;?>/<?php echo $teacher->id?>"><?php echo $teacher->name;?></a>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
        </section>
        <!--Page Title Ends-->

 <!--team-profile start-->
        <section class="team-profile">
            <div class="container">
                <div class="item-box">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <figure class="image-box">
                                    <img src="<?php echo $teacher->photo;?>" alt="" />
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6">
                            <div class="item">
                                <div class="content">
                                    <h1><?php echo $teacher->name;?></h1>
                                    <p>Assistant Teacher</p>

                                    <div class="text">
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam</p>
                                    </div>
                                    <h4>Điện thoại: <span><?php echo $teacher->phone;?></span></h4>
                                    <h4>Email: <span><?php echo $teacher->email;?></span></h4>
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-vimeo"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="details">
                    <div class="text">
                        <p>Vinteger eu libero rutrum, imperdiet arcueniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem. accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi </p>
                    </div>
                    <div class="text">
                        <p>Architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur adipisci velit.</p>
                    </div>
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                    </div>
                </div>

                <div class="two-column">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="item">
                                <div class="sec-title">
                                    <h3>Education</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                </div>

                                <ul class="list">
                                    <li>Ed D (University of Roehampton).</li>
                                    <li>GCE Primary (Goldsmiths College, University of London).</li>
                                    <li>MA Mathematics Education (Institute of Education).</li>
                                    <li>BSc Mathematics (Leicester Polytechnic).</li>
                                    <li>Ed D (University of Roehampton)</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="item">
                                <div class="sec-title">
                                    <h3>Skills</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                                <div class="skill-item">
                                    <div class="progress-item">
                                        <p>Vocal</p>
                                        <div class="progress" data-value="75">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                <div class="value-holder"><span class="value"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item">
                                        <p>Compose</p>
                                        <div class="progress" data-value="85">
                                            <div class="progress-bar item-2" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                <div class="value-holder"><span class="value"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item">
                                        <p>Teaching</p>
                                        <div class="progress" data-value="60">
                                            <div class="progress-bar item-3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                                <div class="value-holder"><span class="value"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </section>
         <!--team-profile end-->


@endsection
