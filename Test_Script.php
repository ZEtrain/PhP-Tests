<?php

#This is my first ever PHP script written totally by myself!!!
#Hope it all goes well.....and it works


// Script Options, -f (file) required -h (help) optional -d (debug) optonal
$Options = getopt("f:hd");
var_dump($Options);

if ($file == false) {
		die ("Unable to open file");
}

if (filesize(shift) == 0) {
		die ("File is empty");
}

//Below lines open file and then splits the three space seperated strings into three arrays to be used later in the script
$fopen = fopen($file, r);
list($hostnames, $LocNames, $Address) = explode(" ", $file, 3);

if (debug = 1) {
		var_dump($hostnames,$LocNames,$Address);
}
/* Below line can be uncommented for debugging file formatting issues that will affect splitting of values.
print_r(list($hostnames, $LocNames, $Address) = explode(" ", $file, 3));
*/
foreach ($hostnames as $key => $value) {
	$query = sprintf("SELECT id from object_def WHERE instance='node' and name='%s', mysql_real_escape_string($value)"));
}
$ObjDefIDs = mysql_query($query);

if (!$ObjDefIDs) {
	$message = 'This Device Does Not Exist Yet!' . mysql_error() . "\n";
	die($message);
}
//open file and split the contents into 3 arrays

//First array is the hostnames
//Second array is the Location Codes
//Third array is the full address

//Use first array to get the node ID to be use to update the location_id in object_def


//Use the second array to see if there are any entries in the location table that meet the entries in this array.
//If not then will be use later to create a new entry in the locations table.

//Use third array to update the location for each GRP:node in object_def and could also be used to create new entry
//into the location table.

?>
