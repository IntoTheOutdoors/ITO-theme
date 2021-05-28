<main class="container episodes">
        <section>
            <div class="row">
                <div class="col-4 filter">
                    <div class="filter-search">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="search" placeholder="Search">
                        </div>
    
                        <div class="filter-search-check">
                            <div class="form-check">
                                <?php echo facetwp_display('facet', 'episodes'); ?>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Lesson Plans
                                </label>
                            </div>
                        </div>
                    </div>
                    

                    <div class="filter-categories">
                        <h4>Filter By Categories:</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" id="categories" checked>
                            <label class="form-check-label" for="categories">
                              All
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" id="categories" checked>
                            <label class="form-check-label" for="categories">
                              Aquatic & Angling Science
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" id="categories" checked>
                            <label class="form-check-label" for="categories">
                              Wildlife & Conservation
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" id="categories" checked>
                            <label class="form-check-label" for="categories">
                              Energy & Sustainable Science
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" id="categories" checked>
                            <label class="form-check-label" for="categories">
                              Environmental & Ecosystem Science
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" id="categories" checked>
                            <label class="form-check-label" for="categories">
                              Physical & Ag Science
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categories" id="categories" checked>
                            <label class="form-check-label" for="categories">
                              Outdoor Recreation & Adventure
                            </label>
                        </div>
                    </div>

                    <div class="filter-grade">
                        <h4>Filter By Grade Level:</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="grade" id="grade" checked>
                            <label class="form-check-label" for="grade">
                              All
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="grade" id="grade" checked>
                            <label class="form-check-label" for="grade">
                              Elementary School
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="grade" id="grade" checked>
                            <label class="form-check-label" for="grade">
                              Middle School
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="grade" id="grade" checked>
                            <label class="form-check-label" for="grade">
                              High School
                            </label>
                        </div>
                    </div>

                    <h4> Download the app to watch us where you go!</h4>
                    <div class="filter-downloads">
                      <img class="filter-ito" src="./assets/images/media-logos/media-logo-ito+.png" alt="apple store">
                      <img class="filter-appstore" src="./assets/images/media-logos/media-logo-appstore.png" alt="apple store">
                      <img class="filter-googleplay" src="./assets/images/media-logos/media-logo-googleplay.png" alt="google play">
                  </div>
                </div>
                <div class="col-8">
                    <div class="results">
                        <div class="results-featured">
                            <h3>Featured Video</h3>
                            <div class="results-featured-content">
                                <img src="./assets/images/thumbnails/thumbnail-five.jpg" alt="">
                                <div class="results-featured-text">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab eum facilis dolore magni suscipit consectetur cum, omnis, sequi excepturi maiores, ea eligendi quos modi? Obcaecati odit fugiat recusandae ducimus deserunt!</p>
                                    <a href="./episode.html" class="primary-button">play</a>
                                </div>
                            </div>
                        </div>
                        <div class="results-episodes">
                            <?php echo facetwp_display('template', 'episodes'); ?>
                        <div class="results-pagination">
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </section>
    </main>