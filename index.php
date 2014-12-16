<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SC&I Digital Library</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    
	<!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
	<!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php include 'header.php'; ?>
    

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="images/slide-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="images/slide-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="images/slide-3.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">Digital Library</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>By
                            <strong>SC&amp;I</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Build a Digital Library
                        <strong>worth visiting</strong>
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="images/intro-pic.jpg" alt="">
                    <hr class="visible-xs">
                    <p>Welcome to the School of Communication and Information at Rutgers. Here is where students interested in careers in journalism, media, public relations, information science, librarianship, government, and organizational communication come to study with one of the nation's leading interdisciplinary research faculties. We are committed to meeting the challenges of the future -- challenges to which communication and information are central.</p>
                    <p>SC&amp;I proudly participates in these national organizations:
<ul>
<li>Association for Education in Journalism and Mass Communication
</li><li>Association for Library and Information Science Education
</li><li>Association of Schools of Journalism and Mass Communication
</li><li>American Association of School Libraries
</li><li>American Library Association
</li><li>American Association of Law Libraries
</li><li>American Society for Information Science and Technology
</li><li>International Communication Association
</li><li>International Federation of Library Associations and Institutions
</li><li>National Communication Association
</li><li>Special Libraries Association</li>
</p>
                </div>
            </div>
        </div>

       <div id="row2" class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                     <h2 class="intro-text text-center">Beautiful database
                        <strong>to showcase library</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-sm-4 text-center">
				<a href="List_Books.php"><img src="images\books.jpeg" alt="Books" height="250" width="250"></a>
                    
                </div>
                <div class="col-sm-4 text-center">
                    <a href="List_Articles.php"><img src="images\articles.jpeg" alt="Articles" height="250" width="250"></a>
                </div>
                <div class="col-sm-4 text-center">
				<a href="List_Journals.php"><img src="images\journals.jpeg" alt="Journals" height="250" width="250"></a>
                    
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
				
				

    </div>
    <!-- /.container -->

<?php include 'footer.php'; ?>

</body>

</html>
