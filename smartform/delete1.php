<?php
include("config.php");
include("contentdb.php");

$id= $_POST["id"];
$question= $_POST["question"];
$opt1= $_POST["opt1"];
$opt2= $_POST["opt2"];
$opt3= $_POST["opt3"];
$answer= $_POST["answer"];

$Query="INSERT into qtable (id,question,opt1,opt2,opt3,answer)
values ('$id','$question', '$opt1' , '$opt2', '$opt3' , '$answer')";

$result = mysql_query($Query) ;
if (!$result)
{
print ("Your information has been passed into current database!
\n");
} else {
print ("The query could not be executed for inserting your data!
");
}
$query = "SELECT * FROM qtable ORDER BY id";
$result = mysql_query($query)
or die ("Couldn't execute query for collecting your data.");

/* Display results in a table */
print ("\n");
print ("\n");
print ("No\n");
print ("Question\n");
print ("Option 1\n");
print ("Option 2\n");
print ("Option 3\n");
print ("Answer\n");
print ("Del/Edit\n");
print ("\n");
if ($result = mysql_query($query)) { // see if any rows were returned
if (mysql_num_rows($result) > 0) {

while ($row = mysql_fetch_array($result)) {
extract($row);
print ("\n");
print( "$row[id]\n");
print ("$row[question]\n");
print ("$row[opt1]\n");
print ("$row[opt2]\n");
print ("$row[opt3]\n");
print ("$row[answer]\n");

print ("\n");
print ("");
}
mysql_free_result($result);
} else {
echo "Error in query: $query. ".mysql_error(); // print error message
}
}
print ("\n");
echo " ";

$id= $_POST["id"];
if (isset($Delete)) {

$toDelete = implode(', ', $_POST['id']);
$query = "DELETE FROM `qtable` WHERE ID IN ($toDelete)";
if(mysql_query($query)) {
echo 'Hooray, the filthy rows were deleted';
}
else echo 'Bad luck schmuck
' . mysql_error();
}
// close connection
mysql_close($db);
?> 