<?php 
add_action( 'wp_ajax_nopriv_protected', 'protected_ajax' );
add_action( 'wp_ajax_protected', 'protected_ajax' );

function protected_ajax() {
    $passwordInput = $_POST['protected-form'];
    $password = $_POST['password-text'];

     
    // if($_SERVER['REQUEST_METHOD'] == 'POST'):
    //     setcookie('mycookie', $password);
    //     $cookie_set = true;
    // endif;

  
  if($password == $passwordInput):
    setcookie('passwordCookie', $password, time() + (86400 * 30), "/");
    get_template_part( 'template-parts/page-partners', 'sales' );
  else:
    ?>
      <form id="passwordProtected" method="POST">
        <div class="form-group">
          <p>This content is password protected. To view it please enter your password below:</p>
          <input type="password" id="protected-form" name="protected-form" placeholder="Password">
          <input type="hidden" id="password-text" name="password-text" placeholder="Search here..." value="<?php echo $password; ?>"><br>
          <small id="emailHelp" class="form-text text-muted">Sorry, you entered a wrong password!</small>
          <input type="hidden" name="action" value="protected">
        </div>
      </form>
    <?php
  endif;
  
  die();
}
?>