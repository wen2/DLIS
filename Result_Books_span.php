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
                    <h2 class="intro-text text-center">Quick
                        <strong>Search</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-9"><!----------------------------->
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

//if (isset($_POST['ISBN'])) && (isset($_POST['Title'])){

if (isset($_POST['optBooks']) || isset($_POST['BooksText'])){
echo "--------------------------------------------------";
	$optBooks=trim($_POST['optBooks']);  
	$BooksText=trim($_POST['BooksText']);  

	//echo nl2br($optBooks);
	//echo nl2br($BooksText);

	
	$query = "SELECT * FROM Books";  
	$query .=" WHERE 1=1";
	if ($optBooks=="TP") {
		$query .=" AND BookTitle LIKE '%{$BooksText}%'";
	}
	//$query .=" AND BookTitle LIKE '%{$Title}%'";
	$query .=" LIMIT 100";
	 
	echo '<h3>Show SQL Query(View):</h3>';
	echo $query.'<br />';
    $result = mysql_query($query);
    if (!$result) die ("Database access failed: " . mysql_error());
    $rows = mysql_num_rows($result);
	//$row = mysql_fetch_assoc($result)
    // here we can mix in CSS style
    echo '<div class=\'resultStyle\'>';  
    // here we began a table and each row in the database will be displayed as a raw in the table  
    echo '<table>';
//	<tr><th>ISBN</th><th style="width:200px">Book Title</th><th>Author</th><th>Year of Publication</th><th>Publisher</th><th>Image</th></tr>'; 

    for ($j = 0 ; $j < $rows ; ++$j){
		$row = mysql_fetch_row($result);
		$image = "<img src=\"$row[5]\">";

		// need to consult table to identify correct index for field
		//echo '<tr>';
		//echo '<td>'.$row[0].'</td>';
		//echo '<td>'.$row[1].'</td>';
		//echo '<td>'.$row[2].'</td>';
		//echo '<td>'.$row[3].'</td>';
		//echo '<td>'.$row[4].'</td>';
		//echo '<td>'.$image.'</td>';
        //echo '</tr>';
		
		echo '<tr>';
    echo '<td rowspan="4">'.$image.'</td>';
    echo '<td colspan="2">'.$row[1].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td colspan="2">by '.$row[2].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>Publication: '.$row[3].'</td><td>Publisher: '.$row[4].'</td>';
  echo '</tr>';
  echo '<tr class="spaceUnder">';
    echo '<td colspan="2">ISBN: '.$row[0].'</td>';
  echo '</tr>';
		
		
		
    }
    echo '</table>';  
    echo  '</div>';
	}
?>
					
					
					
				</div>
                <div class="col-md-3">aaaaaaaaaaaaaaaaaaaaaaaaaaaa
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Block
                        <strong>2</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-sm-4 text-center">
                    11111
                </div>
                <div class="col-sm-4 text-center">
                   22222
                </div>
                <div class="col-sm-4 text-center">
                   33333
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <!-- /.container -->

<?php include 'footer.php'; ?>

</body>

</html>
