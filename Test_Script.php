<?php

#This is my first ever PHP script written totally by myself!!!
#Hope it all goes well.....and it works
$debug = '0';

//Connect to MySQL database
try {
	$dsn = 'mysql:host=localhost;dbname=CaseSentry';
	$dbh = new PDO($dsn, 'root', '');
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	//Change to ERRMODE_SILENT for a quieter script
} catch (PDOException $e) {
	echo 'Failed: ' . $e->getMessage();
}

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

//Function gets gathers Object_def_id and puts it into an array to be used later in the script
function subroutine($hostnames) {

	foreach ($hostnames as $key => $value) {
		$query = sprintf("SELECT id from object_def WHERE instance='node' and name='%s', mysql_real_escape_string($hostnames)");
	}
		$results = mysql_query($query);

	while( $row = mysql_fetch_assoc($results)){
    	$ObjDefIDs[] = $results; // Inside while loop
	}

	if (!$ObjDefIDs) {
		$message = 'Device '$hostnames' .  Does Not Exist Yet!' . mysql_error() . "\n";
	die($message);
	}

}

function subroutine($LocNames) {

	foreach ($LocNames as $key => $value) {
		$query = sprintf("SELECT id, name from location where name='%s', mysql_real_escape_string($LocNames)");
	}
		$results = mysql_query($query);

	while ($row = mysql_query($results)) {
		$Loc_ID[$results['id']] = $row;
		$Loc_Code[$results['name']] = $row;
	}
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
