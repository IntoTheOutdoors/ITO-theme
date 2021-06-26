<?php 
add_action( 'wp_ajax_nopriv_protected', 'protected_ajax' );
add_action( 'wp_ajax_protected', 'protected_ajax' );

function protected_ajax() {
    $passwordInput = $_POST['protected-form'];
    $password = $_POST['password-text'];

    // var_dump($passwordInput . ' test ' . $password);
    
    if($password == $passwordInput):
        echo 'This is the sponsors'; 
    else:
        ?>
        <form id="passwordProtected" method="POST">
          <div class="form-group">
            <label for="protected-form">Password</label>
            <input type="text" id="protected-form" name="protected-form" placeholder="Search here...">
            <input type="hidden" id="password-text" name="password-text" placeholder="Search here..." value="<?php echo $password; ?>">
            <small id="emailHelp" class="form-text text-muted">Sorry wrong password. Please enter it again!</small>
          </div>
            <input type="hidden" name="action" value="protected">
        </form>
        <?php
    endif;
    die();
}
?>