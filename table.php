<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biological database</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" href="style5.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    
</head>

<body>
<div class="w3-top">
  <div class="w3-bar w3-green w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="start.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" text-decoration="none">Home</a>
    <a href="dbname.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About Databases</a>
    <a href="columns.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About Columns</a>
    <a href="table.php" class="w3-bar-item w3-button w3-padding-large w3-white">Database</a>
    <a href="tutorial.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Tutorial</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="dbname.html" class="w3-bar-item w3-button w3-padding-large">About Databases</a>
    <a href="columns.html" class="w3-bar-item w3-button w3-padding-large">About Columns</a>
    <a href="table.php" class="w3-bar-item w3-button w3-padding-large">Database</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
  </div>
</div>
<header class="w3-container w3-green w3-center" style="padding: 70px 50px 16px">
  <h2 class="w3-margin w3-xxlarge">Alleropedia</h2>
  <p class="w3-xlarge">Comprehensive database for Allergens</p>
</header>
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
  session_start();
?>

<div class="searchdiv">
  <br>
<h2>Filter the text for the fields</h2> 
<form id="search_form" name="search_form1" method="POST" action="table.php" >
<div class="flex-container">
        <div class="column">
        
           <span class="input_h" >Database</span> <input type="text" name="dbase" value=""/> <br>
           <span class="input_h"> Species  </span><input type="text" name="species" value=""/> <br>
           <span class="input_h"> Common Name </span><input type="text" name="common" value=""/><br>
           <span class="input_h"> Biochemical Name</span> <input type="text" name="biochemical" value=""/> <br>
           <span class="input_h"> Authority </span><input type="text" name="authority" value=""/> <br>
           <span class="input_h">Habitat</span> <input type="text" name="habitat" value=""/> <br>
           <span class="input_h"> Organism Type</span> <input type="text" name="org" value=""/> <br>
           <span class="input_h" >IUIS Name</span><input type="text" name="IUIS" value=""/><br>

</div>
<div class="column bg-alt">
           <span class="input_h" >Source</span><input type="text" name="source" value=""/><br>
           <span class="input_h" >Accession</span> <input type="text" name="Accession" value=""/><br>
           <span class="input_h" >Length</span><input type="text" name="Length" value=""/> <br>
           <span class="input_h" >Route of allergen exposure</span><input type="text" name="Route" value=""/><br>
           <span class="input_h" >Group1</span> <input type="text" name="Group" value=""/><br>
           <span class="input_h" >Allergenecity</span> <input type="text" name="Allergenecity" value=""/><br>
           <span class="input_h" >Gene ID</span> <input type="text" name="Geneid" value=""/><br>
           </div>
    </div>

 <div class="container">
 <br><br>
 <div class="row">
 <div class="col d-flex justify-content-center">
            <br> <input type="submit" name="search" value="Search" class="search_button">
 </div>
</div>
<br><br>
<div class="row">
 <div class="col d-flex justify-content-center">
            <input type="reset" name="reset" value="Reset" class="reset_button">
 </div>
</div>
</div>
</div>

</form><br>
</div>
<div class="container">
<div class="row">
  <div class="col-sm">
   
<h2><br><br>Display fields with starting characters as</h2> 
            <form action="table.php" method="POST">
  <div class="select_drop">
    <select name="sort" required >
        <!--<option value="" disabled selected>Choose option</option>-->
        <option value="Species">SPECIES</option>
        <option value="Common Name">COMMON NAME</option>
        <option value="Accession">ACCESSION</option>
        <option value="Authority">AUTHORITY</option>
        <option value="Habitat">HABITAT</option>
        <option value="Organism Type">ORGANISM TYPE</option>
        <option value="IUIS Name">IUIS NAME</option>
        <option value="Biochemical Name">BIOCHEMICAL NAME</option>
        <option value="Route of allergen exposure">ROUTE OF ALLERGEN EXPOSURE</option>
        <option value="Source">SOURCE</option>
        <option value="Group1">GROUP</option>
     
    </select>

    <select name="sorta" required>
        <!--<option value="" disabled selected>Choose option</option>-->
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
        <option value="F">F</option>
        <option value="G">G</option>
        <option value="H">H</option>
        <option value="I">I</option>
        <option value="J">J</option>
        <option value="K">K</option>
        <option value="L">L</option>
        <option value="M">M</option>
        <option value="N">N</option>
        <option value="O">O</option>
        <option value="P">P</option>
        <option value="Q">Q</option>
        <option value="R">R</option>
        <option value="S">S</option>
        <option value="T">T</option>
        <option value="U">U</option>
        <option value="V">V</option>
        <option value="W">W</option>
        <option value="X">X</option>
        <option value="Y">Y</option>
        <option value="Z">Z</option>
    </select>
</div>
    <input class="sort_button" type="submit" name="sorting" value="Choose options"><br> <br>
</form>
          
</div>
<div class="col-sm">
<form name="exportform" method="POST" action="download.php" >
  <br><br><br>
  <h2>Click to Download</h2><br>
  <i class="fa fa-download w3-padding-10 w3-text-grey" aria-hidden="true"></i>
  <br><br>
  <input type="submit" name="export" value="DOWNLOAD" class="download_button">
</form>
</div>
</div>
</div>

<div class="container-fluid">
<?php
if (isset($_POST['search'])) {
  $search_term_db = !empty($_POST['dbase']) ? mysqli_real_escape_string($conn,$_POST['dbase']) : 'no_entry';
  $search_term_species = !empty($_POST['species']) ? mysqli_real_escape_string($conn,$_POST['species']) : 'no_entry';
  $search_term_common = !empty($_POST['common']) ? mysqli_real_escape_string($conn,$_POST['common']) : 'no_entry';
  $search_term_biochemical = !empty($_POST['biochemical']) ? mysqli_real_escape_string($conn,$_POST['biochemical']) : 'no_entry';
  $search_term_authority = !empty($_POST['authority']) ? mysqli_real_escape_string($conn,$_POST['authority']) : 'no_entry';
  $search_term_habitat = !empty($_POST['habitat']) ? mysqli_real_escape_string($conn,$_POST['habitat']) : 'no_entry';
  $search_term_org = !empty($_POST['org']) ? mysqli_real_escape_string($conn,$_POST['org']) : 'no_entry';
  $search_term_mw = !empty($_POST['mw']) ? mysqli_real_escape_string($conn,$_POST['mw']) : 'no_entry';
  $search_term_description = !empty($_POST['Description']) ? mysqli_real_escape_string($conn,$_POST['Description']) : 'no_entry';
  $search_term_IUIS = !empty($_POST['IUIS']) ? mysqli_real_escape_string($conn,$_POST['IUIS']) : 'no_entry';
  $search_term_source = !empty($_POST['source']) ? mysqli_real_escape_string($conn,$_POST['source']) : 'no_entry';
  $search_term_accession = !empty($_POST['Accession']) ? mysqli_real_escape_string($conn,$_POST['Accession']) : 'no_entry';
  $search_term_length = !empty($_POST['Length']) ? mysqli_real_escape_string($conn,$_POST['Length']) : 'no_entry';
  $search_term_route = !empty($_POST['Route']) ? mysqli_real_escape_string($conn,$_POST['Route']) : 'no_entry';
  $search_term_group = !empty($_POST['Group']) ? mysqli_real_escape_string($conn,$_POST['Group']) : 'no_entry';
  $search_term_Allergenecity = !empty($_POST['Allergenecity']) ? mysqli_real_escape_string($conn,$_POST['Allergenecity']) : 'no_entry';
  $search_term_geneID = !empty($_POST['Geneid']) ? mysqli_real_escape_string($conn,$_POST['Geneid']) : 'no_entry';

  $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM 
  (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM compare_database 
  UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
  UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergen_nomenclature_database1
  UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_source
  UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
  order by Species) as TableC  WHERE 
  
  (TableC.`Database Name` like '%{$search_term_db}%' OR '$search_term_db'='no_entry') 
  AND (TableC.`Species` like '%{$search_term_species}%' OR '$search_term_species'='no_entry' )  
  AND (TableC.`Common Name` like '%{$search_term_common}%' OR '$search_term_common'='no_entry') 
  AND (TableC.`Authority` like '%{$search_term_authority}%' OR '$search_term_authority'='no_entry' )  
  AND (TableC.`Habitat` like '%{$search_term_habitat}%' OR '$search_term_habitat'='no_entry' )  
  AND (TableC.`Organism Type` like '%{$search_term_org}%' OR '$search_term_org'='no_entry' )  
  AND (TableC.`Group1` like '%{$search_term_group}%' OR '$search_term_group'='no_entry') 
  AND (TableC.`Gene ID` like '%{$search_term_geneID}%' OR '$search_term_geneID'='no_entry') 
  AND (TableC.`Length` like '%{$search_term_length}%' OR '$search_term_length'='no_entry') 
   AND (TableC.`Route of allergen exposure` like '%{$search_term_route}%' OR '$search_term_route'='no_entry') 
   AND (TableC.`IUIS Name` like '%{$search_term_IUIS}%' OR '$search_term_IUIS'='no_entry') 
   AND (TableC.`Accession` like '%{$search_term_accession}%' OR '$search_term_accession'='no_entry')    
   AND (TableC.`Allergenecity` like '%{$search_term_Allergenecity}%' OR '$search_term_Allergenecity'='no_entry')
   AND (TableC.`Biochemical Name` like '%{$search_term_biochemical}%' OR '$search_term_biochemical'='no_entry')
   AND (TableC.`Source` like '%{$search_term_source}%' OR '$search_term_source'='no_entry')";
  $result = $conn->query($sql);
  
}
else if(isset($_POST['sorting']))
{
  $selected = $_POST['sort'];
 
     
      echo $selected; 
      $searchsort = $_POST['sorta'];
      echo $searchsort; 
      if($selected == 'Species')
      {
      $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` , `Authority`, `Habitat`, `Organism Type` FROM 
      (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` , `Authority`, `Habitat`, `Organism Type` FROM compare_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` , `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` , `Authority`, `Habitat`, `Organism Type` FROM  allergen_nomenclature_database1
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_source
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
      order by `Species`) as tableC  WHERE tableC.`Species` like '{$searchsort}%'";
      }
      else if($selected == 'Common Name')
      {
      $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` , `Authority`, `Habitat`, `Organism Type`FROM 
      (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` , `Authority`, `Habitat`, `Organism Type` FROM compare_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` , `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` , `Authority`, `Habitat`, `Organism Type` FROM  allergen_nomenclature_database1
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` , `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_source
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
      order by `Common Name`) as tableC  WHERE tableC.`Common Name` like '{$searchsort}%'";
      }
      else if($selected == 'Accession')
      {
      $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM 
      (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM compare_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergen_nomenclature_database1
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_source
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
      order by `Accession`) as tableC  WHERE tableC.`Accession` like '{$searchsort}%'";
      }
      else if($selected == 'IUIS Name')
      {
      $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM 
      (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM compare_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergen_nomenclature_database1
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type`FROM  allergome_database_source
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
      order by `IUIS Name`) as tableC  WHERE tableC.`IUIS Name` like '{$searchsort}%'";
      }
      else if($selected == 'Authority')
      {
      $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM 
      (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM compare_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergen_nomenclature_database1
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type`FROM  allergome_database_source
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
      order by `IUIS Name`) as tableC  WHERE tableC.`Authority` like '{$searchsort}%'";
      }
      else if($selected == 'Organism Type')
      {
      $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM 
      (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM compare_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergen_nomenclature_database1
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type`FROM  allergome_database_source
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
      order by `IUIS Name`) as tableC  WHERE tableC.`Organism Type` like '{$searchsort}%'";
      }
      else if($selected == 'Habitat')
      {
      $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM 
      (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM compare_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergen_nomenclature_database1
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type`FROM  allergome_database_source
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
      order by `IUIS Name`) as tableC  WHERE tableC.`Habitat` like '{$searchsort}%'";
      }
      else if($selected == 'Biochemical Name')
      {
      $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM 
      (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM compare_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergen_nomenclature_database1
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_source
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
      order by `Biochemical Name`) as tableC  WHERE tableC.`Biochemical Name` like '{$searchsort}%'";
      }
      else if($selected == 'Route of allergen exposure')
      {
      $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM 
      (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM compare_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID` , `Authority`, `Habitat`, `Organism Type`FROM  allergen_nomenclature_database1
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_source
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
      order by `Route of allergen exposure`) as tableC  WHERE tableC.`Route of allergen exposure` like '{$searchsort}%'";
      }
      else if($selected == 'Source')
      {
      $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM 
      (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM compare_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergen_nomenclature_database1
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_source
      UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
      order by `Source`) as tableC  WHERE tableC.`Source` like '{$searchsort}%'";
      }
     
      $result = $conn->query($sql); 
  }
  
else
{
  $sql = "SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM 
  (SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM compare_database 
UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM allergen_online_database 
UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergen_nomenclature_database1
UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_source
UNION ALL SELECT `Database Name`, `Species`, `Common Name`,`Biochemical Name` , `MW(SDS-PAGE)`, `Description`, `IUIS Name` , `Source`, `Accession`, `Length`, `Link` , `Route of allergen exposure`, `Group1`, `Allergenecity`, `Gene ID`, `Authority`, `Habitat`, `Organism Type` FROM  allergome_database_molecule
order by Species) as TableC ";
$result = $conn->query($sql);
}


if($result){
if ($result->num_rows != 0) {
  echo "No. of results: ". $result->num_rows;
  echo "<table id='mytable' ><tr><th> Database Name </th><th>Binomial name of species </th>&nbsp&nbsp<th>Common Name of allergen source</th><th>Biochemical name of allergenic proteins</th><th>Authority</th><th>Habitat of allergen source</th><th>Organism Type of allergen source</th><th>Molecular weight of allergenic proteins</th>
  <th>Description about allergenic proteins</th><th>Different  sources of allergen</th><th>IUIS NAME of allergenic proteins</th><th>Accession number of allergenic protein</th><th>Length of allergenic protein</th><th>Link to website</th>
  <th>Rote of Allergen exposure</th><th>Group  includes genus of source of allergen and allergenic protein.</th><th>Allergencity of allergenic proteins</th><th>Gene ID for organism</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["Database Name"] == 'Allergen Online')
    {
      echo "<tr><td >&nbsp&nbsp".$row["Database Name"]."</td>&nbsp&nbsp&nbsp<td>&nbsp&nbsp".$row["Species"]."</td>&nbsp&nbsp&nbsp<td>".$row["Common Name"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Biochemical Name"]."</td>
      <td>&nbsp&nbsp&nbsp&nbsp".$row["Authority"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Habitat"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Organism Type"]."</td>
    <td>&nbsp&nbsp&nbsp&nbsp".$row["MW(SDS-PAGE)"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Description"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Source"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["IUIS Name"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Accession"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Length"]."</td>
    <td>&nbsp&nbsp&nbsp&nbsp". $row["Link"]. "</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Route of allergen exposure"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Group1"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Allergenecity"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Gene ID"]."</td></tr>";
    }
    else
    {
    echo "<tr><td>&nbsp&nbsp".$row["Database Name"]."</td>&nbsp&nbsp&nbsp<td>&nbsp&nbsp".$row["Species"]."</td>&nbsp&nbsp&nbsp<td>".$row["Common Name"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Biochemical Name"]."</td>
    <td>&nbsp&nbsp&nbsp&nbsp".$row["Authority"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Habitat"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Organism Type"]."</td>
    <td>&nbsp&nbsp&nbsp&nbsp".$row["MW(SDS-PAGE)"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Description"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Source"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["IUIS Name"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Accession"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Length"]."</td>
    <td>&nbsp&nbsp&nbsp&nbsp<a href='" . $row["Link"] . "' target='_blank'>View</a></td><td>&nbsp&nbsp&nbsp&nbsp".$row["Route of allergen exposure"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Group1"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Allergenecity"]."</td><td>&nbsp&nbsp&nbsp&nbsp".$row["Gene ID"]."</td></tr>";
  }
}
  echo "</table>";
} else {
  echo "0 results";
}
}
else{
    echo ("Error description: " . mysqli_error($conn));
}
 
$conn->close();
?>
</div>
</body>
</html>
