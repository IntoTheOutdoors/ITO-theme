<?php 
get_header('second');
$password = get_field('password');
?>
<main>
<div class="partners container">
  <div class="partners-intro">
    <h3>PARTNER WITH US</h3>
    <p>
    Into the Outdoors' mission is to create pathways to environmental awareness and outdoor lifestyles that empower our next generation to become sustainable stewards of Planet Earth.
    Our team of educators and producers create this content through collaborating with subject matter experts who are equally motivated to create a positive appreciation of our planet by delivering messages and stories to the communities at large.
    Below you'll discover ITO's wide array of Educational Initiatives which we are following to create future episodes and accompanying curricula.  These initiative pages provide educational ambassadors with a comprehensive resource to connect and share ideas, establish and expand on educational goals and even form partnerships with whom ITO can work to carry on its mission. 
    The result of these Initiatives is to collaborate with you. Together we can achieve our joint goals through engaging educational materials made freely available for youth, families, and educators. 
    <br>
    Check these out and let us know if you wish to be involved.  Or if you have an idea to kick off a new Educational Initiative, send us an email!
 
    </p>
  </div>
  <div class="partners-video">
    <?php 
      $video = get_field('video');
      echo $video;
    ?>
  </div>
  <div class="password-results">
    <?php
      //  if(isset($_COOKIE['passwordCookie'])):
        get_template_part( 'template-parts/page-partners', 'sales' );
      //  else:
    ?>
    <!-- <form id="passwordProtected" method="POST">
      <div class="form-group">
        <p>This content is password protected. To view it please enter your password below:</p>
        <input type="password" id="protected-form" name="protected-form" placeholder="Password">
        <input type="hidden" id="password-text" name="password-text" placeholder="Search here..." value="<?php // echo $password; ?>"><br>
        <small id="emailHelp" class="form-text text-muted">Enter password to show contents here</small>
        <input type="hidden" name="action" value="protected">
      </div>
    </form> -->
      
      <?php
        // endif;
      ?>
  </div>
</div>
</main>
<?php
get_footer();
?>