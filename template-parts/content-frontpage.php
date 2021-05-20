<main >
    <!-- JUMBOTRON CALL TO ACTION -->
    <section class="jumbotron">   
        <div class="jumbotron-content container">
            <div class="jumbotron-content-text">
                <h1>into the outdoors</h1>
                <h2>Creating Pathways</h2>
                <p>to environmental awareness and outdoor lifestyles that <br> 
                empower our next generation to become <br>
                sustainable stewards of Planet Earth.
                </p>
                
                <a herf="#" class="btn btn-primary">Learn Now</a>
            </div>
        </div>
    </section>

    <!-- FEATURED EPISODES -->
    <section class="featured">
        <div class="container row">
        <div class="featured-video col-6">
            <h4>Featured Episode</h4>
            <?php 
                $posts = get_posts([
                    'posts_per_page' => 1,
                    'post_type' => 'topics'
                ]);    

                
                if($posts):
                    foreach($posts as $post):
                        $video = get_field('full_episode', $post->ID);
                        pre_print_r($video);
                        
                    endforeach;
                endif;
            ?>
                    
                <!-- <video src="./assets/videos/featured-video.mp4" controls loop></video> -->
        </div>
        <div class="curriculums col-6">
            <h4>Latest curriculum videos & lesson plans</h4>
            <div class="curriculums-text">
            <img src="./assets/images/curriculum-one.jpg" alt="">
            <h6>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit sed.
            </h6>
            </div>
            <div class="curriculums-text">
            <img src="./assets/images/curriculum-one.jpg" alt="">
            <h6>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit sed.
            </h6>
            </div>
        </div>
        </div>
    </section>

      <!-- FAMILY BACKGROUND SVG -->
      <section class="family">
            <!-- SIGNUP (CALL TO ACTION) -->
        <section class="signup container">
          <div class="signup-text">
            <h3>Join the Adventure!</h3>
            <p>Join our email list to be the first to get the lasts news, 
              new episode notifications, and exclusive contests 
              conveniently in your inbox!</p>
            <a href="" class="primary-button">signup</a>
          </div>
        </section>
      </section>
              <!-- MEDIA LOGOS AND APP DOWNLOADS -->
        <!-- <section class="media">
          <div class="media-logos">
            <img src="./assets/images/media-logos/media-logo-fire.png" alt="fire tv">
            <img src="./assets/images/media-logos/media-logo-apple.png" alt="apple tv">
            <img src="./assets/images/media-logos/media-logo-roku.png" alt="roku">
            <img src="./assets/images/media-logos/media-logo-smart.png" alt="smart tv">
            <img src="./assets/images/media-logos/media-logo-chromecast.png" alt="chromecast">
            <img src="./assets/images/media-logos/media-logo-fubo.png" alt="fubo">
            <img src="./assets/images/media-logos/media-logo-nbc.png" alt="nbc">
            <img src="./assets/images/media-logos/media-logo-sling.png" alt="sling">
            <img src="./assets/images/media-logos/media-logo-at&t.png" alt="at&t">
            <img src="./assets/images/media-logos/media-logo-youtube.png" alt="youtube">
            <img src="./assets/images/media-logos/media-logo-hulu.png" alt="hulu">
            <img src="./assets/images/media-logos/media-logo-cbs.png" alt="cbs">
          </div>
          <div class="media-text">
            <h4>We are now available on a variety of streaming channels and platforms!</h4>
          </div>
          <div class="media-downloads">
            <img src="./assets/images/media-logos/media-logo-appstore.png" alt="apple appstore">
            <img src="./assets/images/media-logos/media-logo-googleplay.png" alt="google play">
          </div>
        </section> -->


      <!-- PARTNERS -->
      <!-- https://codepen.io/studiojvla/pen/qVbQqW -->
      <div class="slider">
        <div class="slide-track">
          <div class="slide">
            <img src="./assets/images/partners/discoverboat.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/faf.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/glfc.png" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/nmma.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/nms.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/nmsf.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/onyx.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/pfbc.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/rbff.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/scif.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/sdgfp.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/tso.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/uscgboating.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/usda.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/wgfd.jpg" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="./assets/images/partners/yamaha.jpg" height="100" width="250" alt="" />
          </div>
        </div>
      </div>
    </main>