<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<html>

<p>
  <?php
error_reporting(0);
@ini_set('display_errors', 0);  
  
/* SMF theme
require("/home/xxxxx/public_html/Osmosis/SSI.php"); 

$context['page_title_html_safe'] = 'Ratters';
template_header(); 
*/
?>




<?php

//API Stuff
$keyID="xx";
$vcode="xxxxxxx";
$accountKey="1000"; //the division you want


//pull API
$url = "http://api.eveonline.com/corp/WalletJournal.xml.aspx?keyID=".$keyID."&vcode=".$vcode."&accountKey=".$accountKey."";

$file = file_get_contents($url);



$xml = new SimpleXMLElement($file);

//parsing XML

if ($xml === false)
{
    die('Error parsing XML');  
}
//now we can loop through the xml structure
foreach ($xml -> result -> rowset-> row as $row)


//echo "<table><thead><tr><th>Time</th><th>Name</th><th>System</th><th>Amount</th><th>Corp Balance</th></tr></thead><tbody>";
{

//name
 //   $transactionType = $row['ownerName2'];   
	//amount
	 
  //  $typeName = $row['amount'];
	
$myFields = array("Time:" => $row['date'],
				  "Name:" => $row['ownerName2'],
				  "System:"  => 'OPSEC', 
                  "Amount:"  => $row['amount'],
				  "Balance:"  => $row['balance']);

echo '<tbody><table><tr>';

//echo "<table><thead><tr><th>Name</th><th>Email</th></tr></thead><tbody>";


foreach($myFields as $field_title => $field_value)


   echo 
   		'<td>', $field_title, '</td>
         <td>', $field_value, '</td>';

echo '</tbody></tr></table>';
}

//test


?>


</p>
     
    </body>
</html>


 <?php 

template_footer(); ?>




