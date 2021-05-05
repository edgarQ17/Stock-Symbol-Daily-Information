<?php
 //access (connect) the database: cunydbmap; setup 4 parameters
 $host = "localhost";
 $port = 3308;
 $username = "root";
 $password = "";
 $database = "stocks";

 
 //for later use
 $databaseTable = "stock_table";
 
 //create connection
 $conn = new mysqli($host, $username, $password, $database, $port);

 //store SQL command in a variable
 $SQLselect = "select * from " . $databaseTable;
 
 //variable that holds the run of the SQL command
 $results = mysqli_query($conn,$SQLselect) or die("query did not run");
 
 //number of matching record(s)
 $numrecs = mysqli_num_rows($results);
 
 if ($numrecs > 0)
 {
 //start sending select element to HTML
 print "<select id='stockList' onchange='displaymap()'>";
 print "<option value=''>Select a stock</option>";
 
 //loop through the matching record(s)
 while ($recordArray = mysqli_fetch_array($results))
 {
 //extract the table columns' values


 $exchange = $recordArray[0];
 $symbol = $recordArray[1]; 
 $name = $recordArray[2];
 $lastSale = $recordArray[3];
 $marketCap = $recordArray[4];
 $adrTso = $recordArray[5];
 $ipoYear = $recordArray[6];
 $sector = $recordArray[7];
 $industry = $recordArray[8];
 $summaryQuote = $recordArray[9];
 
 //passing variable
 $passingInfo = $exchange.",".$symbol.",".$name.",".$lastSale.",".$marketCap.",".$adrTso.",".$ipoYear.",".
$sector.",".$industry.",".$summaryQuote;
 
 //send option to HTML
 print "<option value='".$passingInfo."'>".$name."</option>";
 }//end of loop
 
 //send close select to HTML
 print "</select>";
 }
 else print "No record(s) found";
 ?>