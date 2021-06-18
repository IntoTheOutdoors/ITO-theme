<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overview</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="resources-tab" data-toggle="tab" href="#resources" role="tab" aria-controls="resources" aria-selected="false">Additional Resources</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content episode-details-content">
    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p><?php echo the_content(); ?> </p>
    </div>
    <div class="tab-pane" id="resources" role="tabpanel" aria-labelledby="resources-tab">Additional Resources</div>
</div>