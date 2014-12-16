<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd ">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>


<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />


<title>A To Z AD Navigation </title>
<!--
http://webprocafe.com/php-asp-java/3296-alpha-navigation-w-pagination-help.html
-->

<style media="screen" type="text/css">


body {
font-family:Verdana,Geneva,'DejaVu Sans',sans-serif;
font-size: medium;
}


a:link {
color:#000;
padding-left: 2px;
text-decoration:none;
}
 
a:visited {
color:#000;
text-decoration:none;
} 


a:hover {
color:#000;
text-decoration:none;
} 


a:active{
color:#000;
text-decoration:none;
}


#aznavbar {
background-color: #FFEECC;
border: 1px solid #000;
color:#000;
}


a:hover#showall {
font-weight:bold;
}
</style>


<body>


<div id="aznavbar" align="center"> 


<a href="ApList.php?letter=#">#</a> 
<a href="ApList.php?letter=a"> A </a> 
<a href="ApList.php?letter=b"> B </a> 
<a href="ApList.php?letter=c"> C </a> 
<a href="ApList.php?letter=d"> D </a> 
<a href="ApList.php?letter=e"> E </a> 
<a href="ApList.php?letter=f"> F </a> 
<a href="ApList.php?letter=g"> G </a> 
<a href="ApList.php?letter=h"> H </a> 
<a href="ApList.php?letter=i"> I </a> 
<a href="ApList.php?letter=j"> J </a> 
<a href="ApList.php?letter=k"> K </a> 
<a href="ApList.php?letter=l"> L </a> 
<a href="ApList.php?letter=m"> M </a> 
<a href="ApList.php?letter=n"> N </a> 
<a href="ApList.php?letter=o"> O </a> 
<a href="ApList.php?letter=p"> P </a> 
<a href="ApList.php?letter=q"> Q </a> 
<a href="ApList.php?letter=r"> R </a> 
<a href="ApList.php?letter=s"> S </a> 
<a href="ApList.php?letter=t"> T </a> 
<a href="ApList.php?letter=u"> U </a> 
<a href="ApList.php?letter=v"> V </a> 
<a href="ApList.php?letter=w"> W </a> 
<a href="ApList.php?letter=x"> X </a> 
<a href="ApList.php?letter=y"> Y </a> 
<a href="ApList.php?letter=z"> Z </a> 
<a href="ApList.php?letter=*" id="showall">Show All Ads</a>


</div>


<?php


/* Include your code to connect to DB. */
include('login_web.php');
/// use database credentials to connect to MySQL
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

// test if successful in connecting to MySQL
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

// test if successful in connecting to your database
mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());

/* Your DB table name */
$tbl_name="Books";


/* How many adjacent pages should be shown on each side? */
$adjacents = 3;


/* 
First get total number of rows in data table. 
If you have a WHERE clause in your query, make sure you mirror it here.
*/


$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE BookTitle LIKE 'd%'";


$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];


/* Setup vars for query. */

//$s[targetpage] = "ApList.php"; /* your file name(the name of this file) */
if ($_GET[letter]) $s[targetpage] = "ApList.php?letter=$_GET[letter]&";
else $s[targetpage] = "ApList.php?";


$limit = 10;/* how many items to show per page */


$page = $_GET['page'];
if($page) 
$start = ($page - 1) * $limit; /* first item to display on this page */
else
$start = 0; /* if no page var is given, set st to 0 */


/* Get data. */


$query = "SELECT COUNT(*) num FROM $tbl_name WHERE `BookTitle` LIKE 'd%' ";


/* Setup page vars for display. */


if ($page == 0) $page = 1; /* if no page var is given, default to 1. */
$prev = $page - 1;/* previous page is page - 1 */
$next = $page + 1; /* next page is page + 1 */
$lastpage = ceil($total_pages/$limit);/* lastpage is = total pages / items per page, rounded up. */
$lpm1 = $lastpage - 1;/* last page minus 1 */


/*
Now we apply our rules and draw the pagination object. 
We're actually saving the code to a variable in case we want to draw it more than once.
*/


$pagination = "";
if($lastpage > 1)
{
$pagination .= "";


/* previous button */


if ($page > 1) 
$pagination.= "<a href=\"$s[targetpage]page=$prev\" class=\"current\"> previous </a>";
else
$pagination.= "<span class=\"disabled\"> previous </span>";


/* pages */


if ($lastpage < 7 + ($adjacents * 2))/* not enough pages to bother breaking it up */
{
	for ($counter = 1; $counter <= $lastpage; $counter++)
	{
	if ($counter == $page)
		$pagination.= "<span class=\"number\">$counter</span>";
	else
		$pagination.= "<a href=\"$s[targetpage]page=$counter\" class=\"number current\">$counter</a>";
	}
}elseif($lastpage > 5 + ($adjacents * 2))/* enough pages to hide some */
{


/* close to beginning; only hide later pages */


if($page < 1 + ($adjacents * 2))
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$pagination.= "<span class=\"number\">$counter </span>";
else
$pagination.= "<a href=\"$s[targetpage]page=$counter\" class=\"number current\">$counter</a>";
}
$pagination.= "<span class=\"dots\">...</span>";
$pagination.= "<a href=\"$s[targetpage]page=$lpm1\" class=\"number\">$lpm1</a>";
$pagination.= "<a href=\"$s[targetpage]page=$lastpage\" class=\"number current\">$lastpage</a>";
}


/* in middle; hide some front and some back */


elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"$s[targetpage]page=1\" class=\"number\">1</a>";
$pagination.= "<a href=\"$s[targetpage]page=2\" class=\"number\">2</a>";
$pagination.= "<span class=\"dots\">...</span>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
	$pagination.= "<span class=\"number\">$counter</span>";
else
	$pagination.= "<a href=\"$s[targetpage]page=$counter\" class=\"number current\">$counter</ a>";
}
$pagination.= "<span class=\"dots\">...</span>";
$pagination.= "<a href=\"$s[targetpage]page=$lpm1\" class=\"number\">$lpm1</a>";
$pagination.= "<a href=\"$s[targetpage]page=$lastpage\" class=\"number current\">$lastpage</a>";
}


/* close to end; only hide early pages */


else
{
    
$pagination.= "<a href=\"$s[targetpage]page=1\" class=\"number\">1</a>";
$pagination.= "<a href=\"$s[targetpage]page=2\" class=\"number\">2</a>";
$pagination.= "<span class=\"dots\">...</span>";
	for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
	{
		if ($counter == $page)
			$pagination.= "<span class=\"number\">$counter</span>";
		else
			$pagination.= "<a href=\"$s[targetpage]page=$counter\" class=\"number current\">$counter</a>";
	}
}
}


/* next button */
if ($page < $counter - 1)
$pagination.= "<a href=\"$s[targetpage]page=$next\" class=\"number current\"> next </a>";
else
$pagination.= "<span class=\"disabled\"> next </span>";
$pagination.= "</div>\n";
}


/* End of Pagination Script */


?>


<!-- Table Output Code -->


<?php


if ($_GET[letter])
{ // add here some test that there is really just a single letter in the variable $_GET[letter]
$result = mysql_query("SELECT * FROM $tbl_name WHERE BookTitle LIKE '$_GET[letter]%'  LIMIT $start, $limit;") or die(mysql_error());
//}else{
//$result = mysql_query("SELECT * FROM $tbl_name WHERE BookTitle limit 1000") or die(mysql_error());
//)
    
/* i think that you don't need to care about formatting, it will just create new lines if needed
$numCols = 1;
$numPerCol = ceil(mysql_num_rows($result) / $numCols);
*/
$rowcount = $execute->num_rows ;
echo "<b style='color:red'>Results found --> ".number_format($rowcount)."</b>" ;

//echo "<table valign=\"top\"><tr><td>";
echo "<table valign=\"top\">";


//while ($x = mysql_fetch_assoc($result))
//	echo "$x[1]";
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


}


//echo "</td></tr>";

echo "</table>"; 


?>


<!--?=$pagination?--> 
<?php echo $pagination;?>



</div>


</body>
</html>