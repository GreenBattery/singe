<?php
/**
 * Created by PhpStorm.
 * User: nucc1
 * Date: 27/05/2018
 * Time: 22:22
 */

?>
<!doctype html>
<html>
<head>
<title>File Singe!</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
	<link rel="stylesheet" href="binary.css" type="text/css" >

	<!-- datatables library -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<style type="text/css">


body {
	font-family: sans-serif;
}

.zclip {

}
.foot td {
	border-top: 1px solid green;
}
.data {
	width: 2em;
	padding: 0.4em;
}

.data input {
	width: 3em;
}

.results {
	border: 1px solid black;
}

.results th {
	border-bottom: 1px solid black;
	text-align: left;

}

.results td {
	min-width: 8em;
	border: 1px solid #ccc;
}

.score {
	font-weight: bold;
	font-size: larger;
}

.comment {
	min-width: 15em;
}

table {
		border-collapse: collapse;
	}

.total {
	color: blue;
}

label {
	font-weight: bold;
	color: #555;
}

input[type=text] {
	border-radius: 0.4em;
	padding: 0.5em;
}

.outputs {

    padding: 1em;
    border: 1px dotted #ccc;
}

#copy {
    padding: 0.4em;
    border-radius: 5%;
    border: 1px dotted #ccc;
    background-color: yellow;
    color: black;
}
</style>
</head>
<body>
<div class='container'>


<div class='page-header' id="topheader"><h1>File Singe</h1></div>

<?php
//if form wasn't submitted, display it.
if (!array_key_exists("data", $_FILES)) {
	//display form
?>
<form action="./index.php" method="POST" enctype="multipart/form-data">
<fieldset class="form-group">
	<label for="data">File Upload</label>
	<input type="file" name="data" id="data" class="form-control-file" />
	<small class="text-muted">Choose a file that is a CSV export of alerts</small>
</fieldset>

<input type="submit" class="btn btn-primary" value="Upload" />
</form>

<?php
}else {
 ?>
 <h2>File uploaded </h2>
 <?php
 echo "<h1>" . htmlentities($_FILES['data']['name']) . "</h1>";



	$fname = $_FILES['data']['tmp_name']; //file uploaded, temp name.

	$fh = fopen($fname, "r");
	$headers = fgetcsv($fh);
	var_dump($headers);

	//loop over rest of file.
	while ($data = fgetcsv($fh)) {
	    echo "<img src='{$data[5]}' />\n";
	}
}