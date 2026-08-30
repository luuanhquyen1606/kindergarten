@extends('themes.' . config('theme.active') . '.layouts.app')
@section('content')
    <section class="page-title">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-6 col-xs-12 pull-left">
                        <h1>{{ $event->title }}</h1>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 pull-right text-right path"><a href="/">Home</a> &gt; <a href="#">Single Post</a>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
        </section>

       <section class="our-team latest-gallery text-center">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>Tham dự sự kiện</h2>
                    <p>Bấm vào tên con để đăng ký tham gia sự kiện</p>
                </div>
                <ul class="post-filter list-inline">
                     <li class="active" data-filter=".filter-item">
                        <span>Tất cả </span>
                    </li>
                    <?php
                    foreach ($classes as $class)
                    {
                    ?>
                    <li class="active" data-filter=".{{$class->slug}}">
                        <span>{{$class->name}}</span>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                <div class="content-box">
                    <div class="row">
                <div class="content-box item-list row masonary-layout filter-layout" >
                    

                    <?php foreach ($students as $student)
                    {
                    ?>
                    <div class="column col-md-3 col-sm-6 filter-item <?php echo $student->class_slug;?>">
                                <div class="single-team">
                                    <div class="img-holder">
                                        <img src="{{ $student->photo_path }}" style="width: 175px;height: 175px;" alt="Awesome Image">
                                        <div class="overlay">
                                            <div class="inner">
                                                <ul class="social">
                                                    <li><a href="/events/{{$event->id}}/enroll/{{$student->id}}"><i class="fa fa-link"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-holder">
                                        <h3><a href="/events/{{$event->id}}/enroll/{{$student->id}}">{{ $student->name }}</a></h3>
                                        <p>{{ $student->class_name }}</p>
                                        
                                    </div>
                                </div>
                            </div>

                   
                    <?php
                    }
                    ?>
                </div>
                </div>
            
            </div>


                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
@endsection
