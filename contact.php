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
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>business casual</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3033.6442557001124!2d-74.45321999999996!3d40.50524899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3c70071f59935%3A0x43117a289c6aa436!2sSchool+of+Communication+and+Information!5e0!3m2!1sen!2sus!4v1415131230164" width="600" height="450" frameborder="0" style="border:0"></iframe>
                </div>
                <div class="col-md-4">
                    <p>Phone:
                        <strong>(848) 932-7500</strong>
                    </p>
                    <p>Email:
                        <strong><a href="mailto:mlis@comminfo.rutgers.edu">Master of Library and Information Science</a></strong>
                    </p>
                    <p>Address:
                        <strong>4 Huntington St
                            <br>New Brunswick, NJ 08901</strong>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>form</strong>
                    </h2>
                    <hr>
                    <p>The School of Communication and Information (SC&I) seeks to understand communication, information, and media processes, organizations, and technologies as they affect individuals, societies, and the relationships among them. </p>
                    <form role="form" action="contact_me.php" method="post">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input name="email" type="email" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Phone Number</label>
                                <input name="phone" type="tel" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Message</label>
                                <textarea name="message" class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <!--button type="submit" class="btn btn-default">Submit</button-->
								  <input type="submit" value="Submit" />
                            </div>
							
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

<?php include 'footer.php'; ?>

</body>

</html>
