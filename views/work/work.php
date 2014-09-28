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
        <?php require_once './controllers/workcontroller.php'; ?>
        <?php die('here');// var_dump($github); ?>
        <?php $github = new RepoController('alex-cory'); ?>
        <?php $repositories = $github->getAllRepositories();//   d($repositories); ?>
        <?php
            function url_exists($url)
            {
                $file = $url;
                $file_headers = @get_headers($file);
                if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
                    $exists = false;
                } else {
                    $exists = true;
                }
                return $exists;
            }
        ?>
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
        <?php foreach ($repositories as $repo): ?>
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="thumbnail2">
                    <div class="thumbnail">
                        <a href="#<?php echo $repo->getName(); ?>Modal" data-toggle="modal" data-target="#<?php echo $repo->getName(); ?>Modal">
                            <div class="caption">
                                <h4><?php echo $repo->getName(); ?></h4>
                                <!-- <p><?php echo $repo->getLanguage(); ?></p> -->
                                <br>
                            </div>
                        </a>
                        <!-- repo image -->
                        <div class="repo_image" style="background-image: url('<?php echo $repo->getImgThumb() // ? $repo->getImgThumb() : "http://lorempixel.com/400/300/sports/4/"; ?>'); background-size: cover; background-position: center; height: 195px; vertical-align: 0;"></div>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="<?php echo $repo->getUrl(); ?>/archive/master.zip" target="rss"><span class="glyphicon glyphicon-download"></span></a>
                        <a href="<?php echo $repo->getUrl(); ?>" target="rss"><span class="fa fa-github"></span></a>
                        <a href="<?php echo $repo->getDemoLink(); ?>" class="demo-link" target="rss"><span class="fa fa-play-circle-o" target="rss"></span></a>
                        <a href="mailto:?subject=Found%20our%20next%20software%20engineer&body=Check%20out%20this%20sweet%20project%20he%20did%21%20Yep...%20We%27re%20totally%20hiring%20him.%20<?php echo $repo->getUrl(); ?>"><span class="glyphicon glyphicon-share-alt"></span></a>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="<?php echo $repo->getName(); ?>Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="modal-content" style="border: 1px solid #fff; border-radius: 6px; margin-top: 2em;">
                        <img src="<?php echo $repo->getImg(); // url_exists($repo->getImg()) ? $repo->getImg() : "http://lorempixel.com/400/300/sports/4/"; ?>" name="aboutme" width="100%" height="100%" style="border-radius: 6px 6px 0 0;"></a>
                        <div class="panel-footer text-center">
                            <a href="<?php echo $repo->getUrl(); ?>/archive/master.zip" target="rss"><span class="glyphicon glyphicon-download"></span> Download</a>
                            <a href="<?php echo $repo->getUrl(); ?>" target="rss"><span class="fa fa-github"></span> Github</a>
                            <a href="<?php echo $repo->getDemoLink(); ?>" class="demo-link" target="rss"><span class="fa fa-play-circle-o"></span> Live Demo</a>
                            <a href="mailto:?subject=Found%20our%20next%20software%20engineer&body=Check%20out%20this%20sweet%20project%20he%20did%21%20Yep...%20We%27re%20totally%20hiring%20him.%20<?php echo $repo->getUrl(); ?>"><span class="glyphicon glyphicon-share-alt"></span> Share</a>
                        </div>
                       <!--  <div class="modal-footer">
                            <center>
                            </center>
                        </div> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
</section></br>