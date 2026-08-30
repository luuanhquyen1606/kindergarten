<!--Fact Counter-->
<?php
if(!isset($data['title'])) {
    echo "Block Metrics: Vui lòng cấu hình tiêu đề trong phần quản trị.";
    return;
} 
?>

<section class="counter-area pb-130">
        <div class="container">
            <div class="counter-bg bg_cover pt-80 pb-80" style="background-image: url(/themes/{{ config('theme.active') }}/assets/images/counter-bg.jpg);">
                <div class="row">


                     <?php foreach ($data['metrics'] as $metric)
                        {
                        ?>
                    <div class="col-lg-3 col-md-3">
                        <div class="counter-item text-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">
                            <i class="fal fa-trophy-alt"></i>
                            <h3 class="title"><span class="counter"><?php echo e($metric['add']); ?></span></h3>
                            <span><?php echo e($metric['title']); ?></span>
                        </div> <!-- counter item -->
                    </div>
                    
 <?php
                        }
                        ?>





                </div> <!-- row -->
            </div>
        </div>
    </section>

    <!--
        <section class="fact-counter">
            <div class="container">
                <div class="row">

                    <div class="counter-outer">
                     

                        <article class="column counter-column col-md-3 col-sm-6 col-xs-6 wow fadeIn" >
                           <h3>{{$data['title'] ?? ''}}</h3>
                           <h5>{{$data['title'] ?? ''}}</h5>
                        </article>
                        


                    </div>
                </div>
                <div class="row">
                    
                  
                    <div class="counter-outer">
                     


                        <?php foreach ($data['metrics'] as $metric)
                        {
                        ?>
                        <article class="column counter-column col-md-3 col-sm-6 col-xs-6 wow fadeIn" data-wow-duration="300ms">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <i class="icon flaticon-people-1"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000" data-stop="<?php echo e($metric['add']); ?>">0</span>
                                        <p><?php echo e($metric['title']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php
                        }
                        ?>



                    </div>
                </div>
            </div>

        </section>
         -->