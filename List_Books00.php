<?php  // searchResults.php

// want to connect to MySQL database
// first load into memory the database credentials defined in login file
require_once 'login_web.php'; // remember to change to your lastname

// use database credentials to connect to MySQL
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

// test if successful in connecting to MySQL
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

// test if successful in connecting to your database
mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());

// test to make sure that we selected a radio button ... 

	$query = "SELECT ISBN,BookTitle,BookAuthor,YearOfPublication,Publisher,ImageURL_S FROM Books LIMIT 10";  
    echo '<h3>Show SQL Query(View):</h3>';
	echo $query.'<br />';
	$result = mysql_query($query);
    if (!$result) die ("Database access failed: " . mysql_error());
    $rows = mysql_num_rows($result);

    // here we can mix in CSS style
    echo '<div class=\'resultStyle\'>';  
    // here we began a table and each row in the database will be displayed as a raw in the table  
    echo '<table> <tr><th>ISBN</th><th>Book Title</th><th>BookAuthor</th><th>YearOfPublication</th><th>Publisher</th><th>Image</th></tr>'; 

    for ($j = 0 ; $j < $rows ; ++$j){
	$row = mysql_fetch_row($result);
	$image = "<img src=\"$row[5]\">";
	// need to consult table to identify correct index for field

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

