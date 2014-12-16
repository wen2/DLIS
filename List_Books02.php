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
                    <h2 class="intro-text text-center">Browse All
                        <strong>Books</strong>
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


	$tbl_name="Books";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$cquery = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($cquery));
	$total_pages = $total_pages[num];
	
/* Setup vars for query. */
	$targetpage = "List_Books.php"; 	//your file name  (the name of this file) 
	$limit = 20; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	//echo nl2br($optBooks);
	//echo nl2br($BooksText);
	
	$query = "SELECT * FROM $tbl_name";  
	$query .=" LIMIT $start, $limit";
	 
	
    $result = mysql_query($query);
    if (!$result) die ("Database access failed: " . mysql_error());
	
		/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
    /* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">&laquo; previous</a>";
		else
			$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next &raquo;</a>";
		else
			$pagination.= "<span class=\"disabled\">next &raquo;</span>";
		$pagination.= "</div>\n";		
	}

	
	$rows = mysql_num_rows($result);
	//$row = mysql_fetch_assoc($result)
	//echo '<h3>Show SQL Query(View):</h3>';
	//echo $query.'<br />';
    // here we can mix in CSS style
    echo '<div class=\'resultStyle\'>';  
    // here we began a table and each row in the database will be displayed as a raw in the table  
//table begin---------------------------------------
    echo '<table>';
//	<tr><th>ISBN</th><th style="width:200px">Book Title</th><th>Author</th><th>Year of Publication</th><th>Publisher</th><th>Image</th></tr>'; 

		while($row = mysql_fetch_array($result)){
		$image = "<img src=\"$row[5]\" alt=\"Image Not Found\"/>";

	
    echo '<tr>';
	echo '<td>'.$row[0].'</td>';
	echo '<td>'.$row[1].'</td>';
	echo '<td>'.$row[2].'</td>';
	echo '<td>'.$row[3].'</td>';
	echo '<td>'.$row[4].'</td>';
	echo '<td>'.$image.'</td>';
        echo '</tr>';
		
		
		
    }
    echo '</table>';  
	
    echo  '</div>';

?>
<?php echo $pagination;?>
					
					
					
				</div>
                <div class="col-md-3">
<h4>Recommended <?php echo $tbl_name;?>:</h4>

<?php 
//side bar
//Return Random Records, conditions as your search
	$query2 = "SELECT * FROM $tbl_name";
	$query2 .=" order by RAND() LIMIT 10;";
	echo $query2.'</br>';
	
	$result2 = mysql_query($query2);
	if (!$result2) die ("Database access failed: " . mysql_error());
    $rows2 = mysql_num_rows($result2);

	 for ($j = 0 ; $j< $rows2 ; ++$j){
	 $row = mysql_fetch_row($result2);
	 echo ($j+1).'.';
	 if (strlen($row[1])>30 )
		echo '<a href="http://amzn.com/'.$row[0].'">'.substr($row[1],0,30).'...</a></br>';
	else
		echo '<a href="http://amzn.com/'.$row[0].'">'.substr($row[1],0,30).'</a></br>';
		//echo ''.$row[0].',';
		//echo ''.$row[1].'</br>';
    }

?>					
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
