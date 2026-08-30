<!--Blog Section-->
<section class="blog-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <div class="title-icon"><img src="/themes/{{ config('theme.active') }}/images/icons/sec-title-icon-1.png" alt="" /></div>
            <h2>{{ $data['title'] }}</h2>
            <div class="title">{{ $data['sub_title'] }}</div>
        </div>
        <div class="row clearfix">

            <?php
            foreach ($posts as $post)
            {
            ?>
            <div class="blog-column col-md-6 col-sm-12 col-xs-12">
                <!--News Style Three-->
                <div class="news-style-three">
                    <div class="row clearfix">
                        <!--Image Column-->
                        <div class="image-column col-md-4 col-sm-4 col-xs-12">
                            <div class="image">
                                <div class="date-box"><?php echo \Carbon\Carbon::parse($post->created_at)->format('d');?><span><?php echo \Carbon\Carbon::parse($post->created_at)->format('M');?></span></div>
                                <a href="/tin-tuc-{{$post->slug}}"><img style="aspect-ratio:4/3;object-fit:cover" src="<?php echo $post->photo_id? '/get_photo/'.$post->photo_id.'/500' : '/themes/'.config('theme.active').'/images/resource/news-7.jpg';?>" alt="<?php echo $post->title;?>" /></a>
                            </div>
                        </div>
                        <!--Content Column-->
                        <div class="content-column col-md-8 col-sm-8 col-xs-12">
                            <div class="content-inner">
                                <h3><a href="/tin-tuc-{{$post->slug}}"><?php echo $post->title;?></a></h3>
                                <ul class="post-meta">
                                    <li><a href="/tin-tuc-{{$post->slug}}"><span class="icon fa fa-user"></span><?php echo $post->user_name;?></a></li>
                                    <li><a href="/tin-tuc-{{$post->slug}}"><span class="icon fa fa-tag"></span><?php echo $post->category_name;?></a></li>
                                </ul>
                            </div>
                            <div class="text"><?php echo \Illuminate\Support\Str::words(\Soundasleep\Html2Text::convert($post->content), 20);?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>
<!--End Blog Section-->
