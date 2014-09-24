<!--==== Work Header Image ====-->
<section id="projects" class="wrap projects"></br></br></br></br>
    <div class="projects-body">
        <div class="container">
            <div class="row col-md-offset-7">
                <div class="col-md-8">
                    <h1 class="brand-heading">Projects</h1>
                    <p class="intro-text pull-left">Where Impact is Made</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Feature Notes ========================================
-
-
- Really Good-Looking Lightbox: (http://goo.gl/O9ih9T)
- Really Good-Looking Div-prior-to-pop-up: (http://goo.gl/KeB24A)
- Responsive youtube modal: http://goo.gl/rEcfyT
-
=======================================================-->

<!--==== Work Content ====-->
<section class="container content-section">
<!-- <div id="demoLightbox" class="lightbox hide fade"  tabindex="-1" role="dialog" aria-hidden="true">
<div class='lightbox-content'>
    <img src="../img/tedxpurdueu.jpg">
    <div class="lightbox-caption"><p>Your caption here</p></div>
</div>
</div> -->

<!-- BEGIN NEWLY ADDED SECTION -->

<!-- END NEWLY ADDED SECTION -->

    <div class="row">
        <div id="wrap" class="wrap">
        <!-- == Projects == -->
<!--         <div class="container">
            <div class="row"> -->
                <h1>Projects</h1>



                <p>Please view Alex's <a href="https://github.com/alex-cory" class="proj-main-clr">Github</a> or go to the <strong class="proj-main-clr">projects</strong> portion of his <a href="https://www.linkedin.com/in/alexcory" class="proj-main-clr">LinkedIn</a> located just after his work experience section.  Although not all of his projects are on Github or LinkedIn, at least you can see some of the projects he has worked on.</p>
        </div>
    </div>

    <div class="row">
        <?php // Thumbnail Hover without Javascript     (resource: http://goo.gl/5Jpg09) ?>
        <?php require_once './controllers/workcontroller.php';
              // require_once './models/resize.php';

        // d($repositories);
        // d($repositories);
         ?>

        <?php $repositories = getAllRepositories(); ?>
        <?php foreach ($repositories as $repository): ?>
            <?php
                /**
                 * TODO:
                 * - Get regular size images + thumbnails working so images are clear
                 * - Change color of hover state (or make the others follow suite)
                 * - Cache github repositories into file system like such:  alexcory.com/demo/your_repo_name
                 * - Add languages used on hover state
                 *
                 */
            ?>
            <div class="col-xs-6 col-sm-4 col-md-3">
                <!-- <div id="wrap" class="thumbnail2 wrap text-center"> -->
                    <div class="thumbnail2">
                        <div class="thumbnail">
                            <a href="#<?php echo $repository['name']; ?>Modal" data-toggle="modal" data-target="#<?php echo $repository['name']; ?>Modal">
                                <div class="caption">
                                    <h4><?php echo $repository['name']; ?></h4>
                                    <!-- <p>short thumbnail description</p> -->
                                    <br>
                                    <!-- </button> -->
                                    <!-- <p><a href="" class="label label-danger">Zoom</a>
                                    <a href="" class="label label-default">Download</a></p> -->
                                    <!-- End MODAL HERE -->
                                </div>
                            </a>
                            <!-- alfred-workflows_repo_image -->
                            <div class="repo_image" style="background-image: url('<?php echo url_exists($repository['image']) ? $repository['image'] : "http://lorempixel.com/400/300/sports/4/"; ?>'); background-size: cover; background-position: center; height: 195px; vertical-align: 0;"></div>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="<?php echo $repository['html_url']; ?>/archive/master.zip" target="rss"><span class="glyphicon glyphicon-download"></span></a>
                            <a href="<?php echo $repository['html_url']; ?>" target="rss"><span class="fa fa-github"></span></a>
                            <a href="#live_preview"><span class="fa fa-play-circle-o" target="rss"></span></a>
                            <a href="mailto:?subject=Found%20our%20next%20software%20engineer&body=Check%20out%20this%20sweet%20project%20he%20did%21%20Yep...%20We%27re%20totally%20hiring%20him.%20
    <?php echo $repository['html_url']; ?>"><span class="glyphicon glyphicon-share-alt"></span></a>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <!-- Modal -->
            <div class="modal fade" id="<?php echo $repository['name']; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="modal-content" style="border: 1px solid #fff; border-radius: 6px; margin-top: 2em;">
                        <!-- <div class="modal-header"> -->
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="myModalLabel">More About Joe</h4>
                            </div> -->
                        <!-- <div class="modal-body"> -->
                            <!-- <center> -->
                            <img src="<?php echo url_exists($repository['image']) ? $repository['image'] : "http://lorempixel.com/400/300/sports/4/"; ?>" name="aboutme" width="100%" height="100%" style="border-radius: 6px 6px 0 0;"></a>
                            <!-- <h3 class="media-heading">Joe Sixpack <small>USA</small></h3> -->
                            <!-- <span><strong>Skills: </strong></span>
                                <span class="label label-warning">HTML5/CSS</span>
                                <span class="label label-info">Adobe CS 5.5</span>
                                <span class="label label-info">Microsoft Office</span>
                                <span class="label label-success">Windows XP, Vista, 7</span>
                            </center> -->
                            <!-- <hr> -->
                            <!-- <center> -->
                            <!-- <p class="text-left"><strong>Bio: </strong><br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                            <br> -->
                            <!-- </center> -->
                        <!-- </div> -->
                        <div class="panel-footer text-center">
                            <a href="<?php echo $repository['html_url']; ?>/archive/master.zip" target="rss"><span class="glyphicon glyphicon-download"></span> Download</a>
                            <a href="<?php echo $repository['html_url']; ?>" target="rss"><span class="fa fa-github"></span> Github</a>
                            <a href="#live_preview" target="rss"><span class="fa fa-play-circle-o"></span> Live Demo</a>
                            <a href="mailto:?subject=Found%20our%20next%20software%20engineer&body=Check%20out%20this%20sweet%20project%20he%20did%21%20Yep...%20We%27re%20totally%20hiring%20him.%20
    <?php echo $repository['html_url']; ?>"><span class="glyphicon glyphicon-share-alt"></span> Share</a>
                        </div>
                       <!--  <div class="modal-footer">
                            <center>
                            </center>
                        </div> -->
                    </div>
                </div>
            </div>            <!-- Modal -->
            <!-- <div class="modal fade" id="#<?php echo $repository['name']; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="m-top-10">
                    <div class="panel-image text-center modal-box-sz-and-position">
                        <div class="repo_img_modal" style="background-image: url('<?php echo url_exists($repository['image']) ? $repository['image'] : "http://lorempixel.com/400/300/sports/4/"; ?>');"></div> -->
                        <!-- <img src="http://666a658c624a3c03a6b2-25cda059d975d2f318c03e90bcf17c40.r92.cf1.rackcdn.com/unsplash_52d09387ae003_1.JPG" class="panel-image-preview" /> -->
                        <!-- <img class="repo_image" id="<?php echo $repository['name']; ?>" src="<?php echo $repository['image']; ?>" onload="checkImage(this)" onerror="" alt="<?php echo $repository['name']; ?>"> -->
                        <!-- <label for="toggle-1"></label>
                        <div class="panel-footer footer-cool text-center">
                            <a href="<?php echo $repository['html_url']; ?>/archive/master.zip">
                                <span class="glyphicon glyphicon-download"></span>
                                <span class="modal-subtext">Download</span>
                            </a>
                            <a href="<?php echo $repository['html_url']; ?>">
                                <span class="fa fa-github"></span>
                                <span class="strong modal-subtext">Github</span>
                            </a>
                            <a href="#live_preview">
                                <span class="fa fa-play-circle-o"></span>
                                <span class="modal-subtext">Live Demo</span>
                            </a>
                            <a href="#share">
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <span class="modal-subtext">Share</span>
                            </a>
                        </div>
                    </div>
                </div>
 -->            <!-- </div> -->
        <?php endforeach; ?>
</section></br>