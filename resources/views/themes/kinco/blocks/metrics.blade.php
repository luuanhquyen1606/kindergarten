<section class="tf-section tf-counter">
                <img src="/themes/{{ config('theme.active') }}/assets/images/pattern/fun-fact-1.png" alt="Image" class="fun-fact1">
                <img src="/themes/{{ config('theme.active') }}/assets/images/pattern/fun-fact-2.png" alt="Image" class="fun-fact2">
                <div class="container">
                    <div class="row">




                        <?php foreach ($data['metrics'] as $metric)
                        {
                        ?>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                            <div class="sc-fun-fact st-1 themesflat-counter wow fadeIn animated" data-wow-delay="0.2ms" data-wow-duration="1300ms">
                                <div class="box-icon">
                                    <svg data-name="Fun fact" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="66" height="66" viewBox="0 0 66 66">
                                        <g id="_01" data-name="01">
                                          <g>
                                            <image id="Icon-2" data-name="Icon" width="66" height="66" xlink:href="data:img/png;base64,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"/>
                                          </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="box-content box">
                                    <div class="number-content clr-pri-1">
                                        <span class="number" data-speed="3000" data-to="5693" data-inviewport="yes"><?php echo e($metric['add']); ?></span>+
                                    </div>
                                    <p class="clr-pri-1"><?php echo e($metric['title']); ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                        ?>


                        
                    </div>
                </div>
            </section>