<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>showResults PHP page</title>
<link rel="stylesheet" type="text/css" href="css/final.css" />
<link rel="stylesheet" href="css/style_menu01.css" type="text/css" media="all"/>
<style type="text/css">
.resultStyle {
	font-size:14px;
	color:#00F;
	margin-top:25px;
}

</style>
</head>

<body>
<div id="container">
<?php include 'header.php'; ?>
<div id="content">
<h2>Search Results in Books</h2>
<h3>These results can show the images of books.</h3>

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
if (isset($_POST['ISBN']) && isset($_POST['Title']) && isset($_POST['Author'])){
	$ISBN=trim($_POST['ISBN']);  
	$Title=trim($_POST['Title']);  
	$Author=trim($_POST['Author']);  
	/*
	echo nl2br($ISBN);
	echo nl2br($Title);
	echo nl2br($Author);
	*/
	$query = "SELECT DISTINCT * FROM Books";  
	$query .=" WHERE 1=1";
	if ($ISBN>"") { $query .=" AND ISBN LIKE '%{$ISBN}%'";}
	if ($Title>"") { $query .=" AND BookTitle LIKE '%{$Title}%'";}
	if ($Author>"") { $query .=" AND A.Name LIKE '%{$Author}%'";}
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
<br/><br/><br/>
</div>
<?php include 'footer.php'; ?>
<div/>
</body>
</html>
