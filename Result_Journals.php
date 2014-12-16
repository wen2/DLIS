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
                    <hr>
                    <h2 class="intro-text text-center">Quick
                        <strong>Search</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-9">


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
	$optJournal=trim($_GET['optJournal']);  
	$SearchText=trim($_GET['SearchJournal']);  
	$tbl_name="Journals";		//your table name
	$fld_name="Title";

	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	$limit = 20; 						//how many items to show per page
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	//$where="";
	//if (isset($_POST['optJournals']) || isset($_POST['ArticlesText'])){

	if  (isset($_GET['where'])){
		$where=trim($_GET['where']);  
		//echo 'where='.$where;
	}else{
		if ($optJournal=="PP") {
			$where=" AND A.Title LIKE '{$SearchText}%'";
		}elseif ($optJournal=="KP") {
			$where=" AND A.Title LIKE '%{$SearchText}%'";
		}else{
			$where=" AND (A.Title LIKE '%{$SearchText}%'  OR A.Publisher LIKE '%{$SearchText}%'  OR A.Keyword LIKE '%{$SearchText}%'  OR A.Subjects LIKE '%{$SearchText}%')";
		}
	}

	//$where=" AND BookTitle LIKE '%{$SearchText}%'";
	$cquery = "SELECT COUNT(*) as num FROM $tbl_name A WHERE 1=1 ";
	$cquery .= $where;
	$total_pages = mysql_fetch_array(mysql_query($cquery));
	$total_pages = $total_pages[num];
	
/* Setup vars for query. */
	$targetpage = "Result_Journals.php"; 	//your file name  (the name of this file) 

	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

//if (isset($_GET['optJournal']) || isset($_GET['SearchText'])){


	//echo nl2br($optJournal);
	//echo nl2br($SearchText);

	
	$query = "SELECT * FROM $tbl_name A WHERE 1=1 ";
	$query .= $where;
	$query .=" ORDER BY $fld_name ";
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
			$pagination.= "<a href=\"$targetpage?page=$prev&where=$where\">&laquo; previous</a>";
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
					$pagination.= "<a href=\"$targetpage?page=$counter&where=$where\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage?page=$counter&where=$where\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1&where=$where\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage&where=$where\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1&where=$where\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2&where=$where\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&where=$where\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1&where=$where\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage&where=$where\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1&where=$where\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2&where=$where\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&where=$where\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next&where=$where\">next &raquo;</a>";
		else
			$pagination.= "<span class=\"disabled\">next &raquo;</span>";
		$pagination.= "</div>\n";		
	}

	
	$rows = mysql_num_rows($result);
	//$row = mysql_fetch_assoc($result)
	//echo '<h3>Show SQL Query(View):</h3>';
	//echo $query.'<br />';
	
	//Search Results: 1 - 10 of 106
	$end=$start + $limit;
	if ($end>$total_pages)
		$end=$total_pages;
	echo '<h3 class="page-title">Search Results: '.($start +1).' - '.$end.' of '.$total_pages.'</h3>';
    // here we can mix in CSS style
    echo '<div class=\'resultStyle\'>';  
    // here we began a table and each row in the database will be displayed as a raw in the table  
		while($row = mysql_fetch_array($result)){

			echo '<b><a href="'.$row[3].'">'.$row[1].'</a></b></br>';
			echo '<b>Publisher</b>: '.$row[4];
			echo '  <b>Year</b>: '.$row[9];
			echo '<br/>';
			echo '<b>Language</b>: '.$row[5];
			echo ' <b>Country</b>: '.$row[13];
			echo '  <b>ISSN</b>: '.$row[6];
			echo '<br/>';
			echo '<b>Keyword</b>: '.$row[8];
			echo '<br/>';
			echo '<b>Subjects</b>: '.$row[12];
			echo '<br/>';
			echo '<br/>';
		
    }
    
	
    echo  '</div>';	// /.resultStyle
	//}
?>
<?php echo $pagination;?>
					
</div> <!--/.col-md-9-->
<div class="col-md-3">
<?php include 'BlockJournals.php';?>		
                </div><!--/.col-md-3-->
                <div class="clearfix"></div>
            </div><!--/.box-->
        </div><!--/.row-->


    </div>
    <!-- /.container -->

<?php include 'footer.php'; ?>

</body>

</html>
