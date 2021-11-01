
<!-- FAMILY BACKGROUND SVG -->
<?php 
    $image = wp_get_attachment_image_src(10757, $size="thumbnail", $icon=false, []);
?>
<div class="signup-info">
    <div class="signup-item">
        <h3>Join the Adventure!</h3>
        <p>Get updates on new episodes, lesson plans, our education initiatives, and exclusive contests straight to your inbox!</p>
        <!-- Button trigger modal -->
        <a type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#singupModal">
            Signup
        </a>
    </div>
    <img class="family" src="<?php echo $image[0]; ?>" alt="family svg" />
    <!-- Modal -->         
        <div id="singupModal" class="modal fade" tabindex="-1" aria-labelledby="singupModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Begin Constant Contact Inline Form Code -->
                        <div class="ctct-inline-form" data-form-id="215a7c57-cdb5-43cb-b987-bde5f816e4c8"></div>
                        <!-- End Constant Contact Inline Form Code -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>