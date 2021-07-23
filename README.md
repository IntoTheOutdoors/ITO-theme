<div class="initiative-textareaWithImage">
                        <div class="row">
                        <?php 
                            if($layout == 'left'):
                        ?>
                                <div class="col-lg-6 col-md-7 col-sm-12">
                                    <img src="<?php echo $image['url'] ?>" alt="image side one">
                                </div>

                                <div class="col-lg-6 col-md-5 col-sm-12">
                                    <h4><?php echo $title; ?></h4>
                                    <?php echo $content; ?>
                                </div>
                        <?php
                            else:
                        ?>
                                <div class="col-lg-6 col-md-7 col-sm-12">
                                        <?php echo $content; ?>
                                    </div>

                                    <div class="col-lg-6 col-md-5 col-sm-12">
                                        <img src="<?php echo $image['url'] ?>" alt="image side one">
                                </div>      
                        <?php
                            endif;
                        ?>
                        </div>
                    </div>              