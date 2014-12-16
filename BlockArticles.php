
<?php 
//side bar
// Random list 10 records from $tbl_name
echo "<h4>Recommended $tbl_name :</h4>";

//Return Random Records, conditions as your search
	//order by RAND()  Too slow
	//$query2 = "SELECT * FROM $tbl_name";
	//$query2 .=" order by RAND() LIMIT 10;";
	
	$res = mysql_query("SELECT COUNT(*) FROM $tbl_name");
	$row = mysql_fetch_array($res);
	$offset = rand(0, $row[0]-1);
	$res10 = mysql_query("SELECT * FROM $tbl_name LIMIT $offset, 10");
	
	if (!$res10) die ("Database access failed: " . mysql_error());
    $rows10 = mysql_num_rows($res10);

	 for ($j = 0 ; $j< $rows10 ; ++$j){
	 $row = mysql_fetch_row($res10);
	 //echo ($j+1).'.';
	 echo substr(($j+1),-1).'.';
	 //in case title too long
	 if (strlen($row[1])>30 )
		echo '<a href="Result_Article.php?articleid='.$row[0].'"><i>'.substr($row[1],0,27).'...</i></a></br>';
	else
		echo '<a href="Result_Article.php?articleid='.$row[0].'"><i>'.$row[1].'</i></a></br>';
    }

?>	