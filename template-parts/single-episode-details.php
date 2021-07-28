<?php 
    global $post;
    $topic = $args['topic'];
    
    $post = get_post($topic->ID, OBJECT);

?>
    <ul class="nav nav-tabs nav-tabslist" id="myTab" role="tablist">
        <li class="nav-item nav-tabslist-item">
            <a class="nav-link nav-tabslist-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><span>Overview</span></a>
        </li>
        <li class="nav-item nav-tabslist-item">
            <a class="nav-link nav-tabslist-link" id="resources-tab" data-toggle="tab" href="#resources" role="tab" aria-controls="resources" aria-selected="false"><span>Additional Resources</span>4</a>
        </li>
    </ul>

    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>You are leaving Into the Outdoors, thank you for visiting!</h3>

                    <div class="button-container">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Go Back</button>
                        <button type="button" id="btnContinue" class="btn-continue btn btn-primary" style="margin-right:10px;">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
    <!-- Tab panes -->
    <div class="tab-content episode-details-content">
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <p>
                <?php echo (!empty($topic)) ? apply_filters( 'the_content', get_the_content(null, false, $topic->ID)) : the_content() ?>
            </p>
        </div>
        <div class="tab-pane" id="resources" role="tabpanel" aria-labelledby="resources-tab">
            <!-- <div class="alert alert-warning d-flex align-items-center tab-content-alert" role="alert">
                <div class="alert-container">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>
                        Hi! You are leaving the Into The Outdoors website to go to a site intended for adults if you click the links below.
                    <span>
                </div>
            </div> -->
            <div class="resource">
                <div class="resource-links">
                    <?php 
                        if(have_rows('resource_links')):
                            ?>
                            <h4>Resource Links</h4>
                            <?php
                            // loop through rows;
                            while(have_rows('resource_links')): the_row();
                                // load sub field value
                                $text = get_sub_field('pretty_url');
                                $title = get_sub_field('description');
                                $url = get_sub_field('links');
                    ?>
                                <div class="resource-links-item">
                                    <a class="external-link" href="<?php echo $url; ?>" target="_blank"><i class="fas fa-link"></i><span><?php echo $title; ?></span></a>
                                    <p><?php echo $text; ?></p>
                                </div>
                    <?php 
                            endwhile;
                        else:
                    ?>
                            <div></div>
                    <?php
                        endif;
                    ?>
                </div>
                <div class="resource-partners">
                    <?php 
                        $partners = get_field('resource_partners');
                        ?>
                        <div class="resource-partners-items">
                            <?php
                        if($partners):
                        ?>
                            <h4>Resource Partners</h4>
                        <?php
                            foreach($partners as $post): setup_postdata($post);
                            $image = get_field('header_image');
                            ?>
                                    <a class="external-link" href="<?php echo esc_html(get_field('header_url')); ?>" target="_blank"><img src="<?php echo esc_html($image); ?>" /></a>
                                    <?php 
                            endforeach; wp_reset_postdata();
                        else:
                        ?>
                            <div></div>
                        <?php
                        endif;
                        ?>
                        </div>    
                </div>
                <div class="resource-downloads">
                    <?php
                        if(!empty($topic)):
                            $download_episode = get_field('full_episode', $topic->ID);
                            $download_curriculums = get_field('curriculum_videos', $topic->ID);
                        else:
                            $download_curriculums = get_field('curriculum_videos');
                            $download_episode = get_field('full_episode');
                        endif;
    
                        if(!empty($download_episode)):
                        ?>
                            <h4>Resource Downloads</h4>
                            <h6>Full Episode</h6>
                        <?php 
                                foreach($download_episode as $post): setup_postdata($post);
                                    $url = get_field('vimeo_download_url');
                                    ?>
                                    <div class="resource-downloads-item">
                                        <a class="external-link" href="<?php echo esc_html($url); ?>" target="_blank"><i class="fas fa-arrow-circle-down"></i><span><?php the_title(); ?></span></a>
                                    </div>
                                    <?php
                                endforeach;wp_reset_postdata();
                            else:
                        ?>
                            <div></div>
                        <?php
                            endif;
                        ?>
                        <?php
                            if(!empty($download_curriculums)):
                        ?>
                            <h4>Resource Downloads</h4>
                            <h6>Curriculum Episode</h6>
                        <?php
                                foreach($download_curriculums as $post): setup_postdata($post);
                                    $url = get_field('vimeo_download_url');
                                    ?>
                                    <div class="resource-downloads-item">
                                        <a class="external-link" href="<?php echo esc_html($url); ?>" target="_blank"><i class="fas fa-arrow-circle-down"></i><span><?php the_title(); ?></span></a>
                                    </div>
                                    <?php 
                                endforeach; wp_reset_postdata();
                            else:
                        ?>
                            <div></div>
                        <?php
                            endif;
                        ?>
                </div>
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>