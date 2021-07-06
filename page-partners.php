<?php 
get_header('second');
$password = get_field('password');
?>
<main>
<div class="partners container">
  <div class="partners-intro">
    <h3>Protected: Our Education Initiatives</h3>
  </div>
  <div class="password-results">
    <?php
       if(isset($_COOKIE['passwordCookie'])):
        get_template_part( 'template-parts/page-partners', 'sales' );
       else:
    ?>
    <form id="passwordProtected" method="POST">
      <div class="form-group">
        <p>This content is password protected. To view it please enter your password below:</p>
        <input type="password" id="protected-form" name="protected-form" placeholder="Password">
        <input type="hidden" id="password-text" name="password-text" placeholder="Search here..." value="<?php echo $password; ?>"><br>
        <small id="emailHelp" class="form-text text-muted">Enter password to show contents here</small>
        <input type="hidden" name="action" value="protected">
      </div>
    </form>
      <?php
        endif;
      ?>
  </div>
</div>
</main>
<?php
get_footer();
?>