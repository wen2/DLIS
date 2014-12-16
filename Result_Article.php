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
	<link href="css/final.css" rel="stylesheet">
    
	<!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
	<!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
<style type="text/css">

</style>
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



<?php  // searchResults.php

// want to connect to MySQL database
// first load into memory the database credentials defined in login file
require_once 'login_web.php'; // remember to change to your lastname

/// use database credentials to connect to MySQL
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

// test if successful in connecting to MySQL
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

// test if successful in connecting to your database
mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());

// test to make sure that we selected a radio button ... 
	$articleid=trim($_GET['articleid']);  
	$tbl_name="Articles";		//your table name

	
	$query = "SELECT * FROM $tbl_name A WHERE id= $articleid";
    $result = mysql_query($query);
    if (!$result) die ("Database access failed: " . mysql_error());
	
    // here we can mix in CSS style
    // here we began a table and each row in the database will be displayed as a raw in the table  

	$row = mysql_fetch_array($result);
	
	echo '<hr><h2 class="intro-text text-center">';
    echo '<strong>'.$row[1].'</strong>';
    echo '</h2><hr></div>';
    echo '<div class="col-md-9">';
	echo '<div class=\'resultStyle\'>';  
	echo $row[2];
	echo $row[3];
	echo $row[4];
echo '</a>'; //all filed missed
?>

						</div> <!--/.resultStyle-->
					</div> <!--/.col-md-9-->
		
					<div class="col-md-3">
						<?php include 'BlockArticles.php';?>		
					</div><!--/.col-md-3-->

					<div class="clearfix"></div>

				</div><!--/.box-->
        </div><!--/.row-->

    </div> <!-- /.container -->

<?php include 'footer.php'; ?>

</body>

</html>
