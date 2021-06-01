<?php
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "biological_database";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) ;
 
 if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<?php
		if(isset($_POST['export']))
		{	
                    //yourcode
                     
/* vars for export */
// database record to be exported
$db_record = 'DATABASE_DOWNLOAD';


// optional where query
$where = 'WHERE 1 ORDER BY 1';
// filename for export
$csv_filename = 'db_export_'.$db_record.'_'.date('Y-m-d').'.csv';
// database variables


// create empty variable to be filled with export data
$csv_export = '';

// query to get data from database
$sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `Authority`, `Habitat`, `Organism Type`,`MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` FROM 
(SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` ,`Authority`, `Habitat`, `Organism Type`, `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` FROM compare_database 
UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `Authority`, `Habitat`, `Organism Type`, `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` FROM allergen_online_database 
UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `Authority`, `Habitat`, `Organism Type` ,`MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` FROM  allergen_nomenclature_database1
UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `Authority`, `Habitat`, `Organism Type` ,`MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` FROM  allergome_database_source
UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `Authority`, `Habitat`, `Organism Type` ,`MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` FROM  allergome_database_molecule
) as TableC ";
$query = $conn->query($sql);
//$query = mysqli_query($conn, "SELECT * FROM ".$db_record1." ".$where);
$field = mysqli_field_count($conn);

// create line with field names
for($i = 0; $i < $field; $i++) {
    $csv_export.= mysqli_fetch_field_direct($query, $i)->name.',';
}

// newline (seems to work both on Linux & Windows servers)
$csv_export.= '
';

// loop through database query and fill export variable
while($row = mysqli_fetch_array($query)) {
    // create line with field values
    for($i = 0; $i < $field; $i++) {
        $csv_export.= '"'.$row[mysqli_fetch_field_direct($query, $i)->name].'",';
    }
    $csv_export.= '
';
}

// Export the data and prompt a csv file for download
header("Content-type: columns/x-csv");
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo($csv_export);
    }
?>