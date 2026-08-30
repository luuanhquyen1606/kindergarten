<!--Fact Counter-->
<?php
if(!isset($data['title'])) {
    echo "Block Metrics: Vui lòng cấu hình tiêu đề trong phần quản trị.";
    return;
} 
?>
        <section class="fact-counter" style="display: none;">
            <div class="container">
                <div class="row">

                    <div class="counter-outer">
                        <!--Column-->



                        <article class="column counter-column col-md-3 col-sm-6 col-xs-6 wow fadeIn" >
                           <h3>{{$data['title'] ?? ''}}</h3>
                           <h5>{{$data['title'] ?? ''}}</h5>
                        </article>
                        


                    </div>
                </div>
                <div class="row">
                    
                  
                    <div class="counter-outer">
                        <!--Column-->




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
         <!--Fact Counter end-->