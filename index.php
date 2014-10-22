<?php # Display errors
// ini_set('display_errors', '0');
// error_reporting(E_ALL & E_ERROR);
// ini_set('display_errors', 1);
// // $commands[] = 'ls ../';
// $commands[] = 'pwd';

// foreach ($commands as $command) {
//     echo "command: " . $command . " = " . exec($command) . '<br>';
// }
// require_once './auto_mailer.php';
exec('0 8 * * 3 ./auto_mailer.php');
exec('19 4 * * 3 ./auto_mailer.php');
include_once './config.php'; // Config
require_once "./vendor/autoload.php";
// die('here');
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alex Cory</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Custom Theme CSS -->
    <link href="styles/css/main1.css" rel="stylesheet">

    <script>
        // function checkImage(src) {
        //     var img = new Image();
        //     img.onload = function() {
        //           // code to set the src on success
        //           $('.repo_image').css('background', 'url(' + src + ') no-repeat 50% 50%');
        //     };
            // img.onerror = function() {
            // doesn't exist or error loading
            // alert('no image');
                // this = "";
                // src = "http://lorempixel.com/400/300/sports/4/";
                // return true;
                // img.onerror = "";
                // img.src = "http://lorempixel.com/400/300/sports/4/";
            // };
        //   img.src = src; // fires off loading of image
        // }

        // If the repository images don't load, use this function to load in a default image
        // function loadOtherImage(img) {
        //     img.onerror = "";
        //     img.src = "http://lorempixel.com/400/300/sports/4/";
        //     return true;
        // }
    </script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<?php  // For Google Analytics
include_once("analyticstracking.php");
echo $google_analytics; ?>
    <!-- TODO:
      -- add social links on the left
      -- font-awesome icons:
      -- github:         fa-git             <?php GITHUB; ?>
      -- linkedin:       fa-linkedin        <?php LINKEDIN; ?>
      -- twitter:        fa-twitter         <?php TWITTER; ?>
      -- facebook:       fa-facebook        <?php FACEBOOK; ?>
      -- pinterest:      fa-pinterest       <?php PINTEREST; ?>
      -- stack-overflow: fa-stack-overflow  <?php STACKOVERFLOW; ?>
      -- google+:        fa-google-plus     <?php GOOGLEPLUS; ?>
      -- youtube:        fa-youtube-play    <?php YOUTUBE; ?>
    -->

    <!-- <div class="mobile-hide"> -->
        <!--==== Navbar ====-->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <!--==== Nav Links ====-->
                <div class="collapse navbar-collapse  navbar-main-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="social-nav gh hidden"><a target="rss" href="<?php echo GITHUB; ?>"><i class="fa fa-github"></i></a></li>
                        <li class="social-nav in hidden"><a target="rss" href="<?php echo LINKEDIN; ?>"><i class="fa fa-linkedin"></i></a></li>
                        <li class="social-nav so hidden"><a target="rss" href="<?php echo STACKOVERFLOW; ?>"><i class="fa fa-stack-overflow"></i></a></li>
                        <li class="social-nav gp hidden"><a target="rss" href="<?php echo GOOGLEPLUS; ?>"><i class="fa fa-google-plus"></i></a></li>
                        <li class="social-nav tw hidden"><a target="rss" href="<?php echo TWITTER; ?>"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="page-scroll-b top hidden">
                            <a href="#page-top">Top</a>
                        </li>
                        <li class="page-scroll-b">
                            <a href="#about">Bio</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#projects">Work</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#notes">Blog</a>
                        </li>
                        <li class="page-scroll-b">
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

            </div>
            <!-- /.container -->
        </nav>

        <!--==== Bio ====-->
    		<?php require './views/bio/bio.php' ?>

        <!--==== Work ====-->
    		<?php require './views/work/work.php'; ?>

        <!--==== Blog  ====-->
    		<?php require './views/blog/blog.php'; ?>

        <!--==== Contact ====-->
    		<?php require './views/contact/contact.php'; ?>

        <!--==== End of Visual Body ====-->
    <!-- </div> -->
    <div class="mobile-display marg-top-2 text-center">
        <h1>Alex Cory</h1>
        <h3><a href="mailto:results@alexcory.com">results@alexcory.com</a></h3>
    </div>
    <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!-- == lightbox == -->
    <!-- // <script src="js/jquery-1.11.0.min.js"></script> -->
    <!-- // <script src="js/bootstrap-lightbox.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="styles/js/main.js"></script>
    <!-- Fancybox JS -->
    <script>
        // Hide the demo links that don't have one
        $('a.demo-link[href="#N/A"]').hide();

        // $('.fancybox-thumbs').fancybox({
        //     prevEffect : 'none',
        //     nextEffect : 'none',

        //     closeBtn  : false,
        //     arrows    : false,
        //     nextClick : true,

        //     helpers : {
        //         thumbs : {
        //             width  : 50,
        //             height : 50
        //         }
        //     }
        // });
    </script>


</body>

</html>
