<?php 
    $topic = $args['topic_id'];
    $full_episode = get_field('full_episode', $topic->ID);

    global $post;
    $post = get_post($full_episode[0]->ID, OBJECT);

    get_template_part( 'template-parts/single', 'episode-breadcrumbs');
    get_template_part('template-parts/single', 'episode-modal');
?>

        
    <!-- Tab panes -->
    <div class="tab-content episode-details-content">
        <div class="tab-pane active details-info" id="home" role="tabpanel" aria-labelledby="home-tab">
            <p>
                <?php echo (!empty($topic)) ? apply_filters( 'the_content', get_the_content(null, false, $full_episode[0]->ID)) : the_content() ?>
            </p>
        </div>
        <div class="tab-pane" id="resources" role="tabpanel" aria-labelledby="resources-tab">
            <div class="resource">
                <div class="resource-links">
                    <?php 
                        if(have_rows('resource_links')):
                            ?>
                            <h3>Resource Links</h3>
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
                    <h3>Resource Partners</h3>
                    <div class="resource-partners-item">
                        <?php 
                            $partners = get_field('resource_partners');

                            if($partners):
                                foreach($partners as $post): setup_postdata($post);
                                $image = get_field('header_image');
                        ?>
                                    <a class="external-link" href="<?php echo esc_html(get_field('header_url')); ?>" target="_blank"><img src="<?php echo esc_html($image); ?>" /></a>
                        <?php 
                                endforeach;         
                            endif; wp_reset_postdata();
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
                            <h3>Resource Downloads</h3>
                            <h5>Full Episode</h5>
                        <?php 
                                foreach($download_episode as $post): setup_postdata($post);
                                    $url = get_field('vimeo_download_url');
                                    ?>
                                    <div class="resource-downloads-item">
                                        <a class="external-link" href="<?php echo esc_html($url); ?>" target="_blank"><i class="fas fa-arrow-circle-down"></i><span><?php the_title(); ?></span></a>
                                    </div>
                                    <?php
                                endforeach;
                            else:
                        ?>
                            <div></div>
                        <?php
                            endif;
                        ?>
                        <?php
                            if(!empty($download_curriculums)):
                        ?>
                            <h5>Curriculum Episode</h5>
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