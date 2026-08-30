<!--Featured Article Section-->
<section class="featured-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="column pull-left col-md-6 col-sm-12 col-xs-12">
                <figure class="image wow fadeInUp">
                    <?php if ($post->photo_id) { ?>
                    <img style="aspect-ratio:4/3;object-fit:cover;width:100%" src="/get_photo/{{ $post->photo_id }}/500" alt="<?php echo $post->title;?>">
                    <?php } ?>
                </figure>
            </div>
            <div class="column pull-right col-md-6 col-sm-12 col-xs-12">
                <div class="sec-title">
                    <h2>{{ $data['title'] }}</h2>
                    <div class="text">{!! $data['sub_title'] !!}</div>
                </div>
                <a href="/tin-tuc-{{ $post->slug }}" class="theme-btn btn-style-one">Xem chi tiết</a>
            </div>
        </div>
    </div>
</section>
<!--End Featured Article Section-->
