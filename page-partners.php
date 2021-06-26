<?php 
get_header('second');
$password = get_field('password');
?>
<div class="container">
    <h3><?php the_title(); ?></h3>
    <div class="password-results">
        <form id="passwordProtected" method="POST">
          <div class="form-group">
            <label for="protected-form">Password</label>
            <input type="text" id="protected-form" name="protected-form" placeholder="Search here...">
            <input type="hidden" id="password-text" name="password-text" placeholder="Search here..." value="<?php echo $password; ?>">
            <small id="emailHelp" class="form-text text-muted">Enter password to show contents here</small>
          </div>
            <input type="hidden" name="action" value="protected">
        </form>
    </div>
</div>
<?php
get_footer();
?>