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

    <!-- == Lightbox CSS == -->
    <link href="styles/css/lightbox.css" rel="stylesheet" />
    <link href="styles/css/bootstrap-lightbox.css" rel="stylesheet">
    <link href="styles/css/bootstrap-lightbox.min.css" rel="stylesheet">

    <!-- Custom Theme CSS -->
    <link href="styles/css/main.css" rel="stylesheet">

    <!-- Fancybox CSS -->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <!--==== Navbar ====-->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">

            <!--==== Nav Links ====-->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="page-scroll-b">
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
		<?php include 'views/bio/bio.php' ?>

    <!--==== Work ====-->
		<?php include 'views/work/work.php'; ?>

    <!--==== Blog  ====-->
		<?php include 'views/blog/blog.php'; ?>

    <!--==== Contact ====-->
		<?php include 'views/contact/contact.php'; ?>

    <!--==== End of Visual Body ====-->

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
        $('.fancybox-thumbs').fancybox({
            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : false,
            arrows    : false,
            nextClick : true,

            helpers : {
                thumbs : {
                    width  : 50,
                    height : 50
                }
            }
        });
    </script>


</body>

</html>
