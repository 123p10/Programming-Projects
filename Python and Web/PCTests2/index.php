 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<?php
if(!isset($_GET['CURRDIR'])){
	$currdir = '\resources\\';
}
else{
	$currdir = $_GET['CURRDIR'];
}
#print_r(scandir(getcwd()));
$directories = glob(getcwd() . $currdir . '/*' , GLOB_ONLYDIR);
#print_r($directories);
if(sizeof($directories) > 0){
	foreach($directories as $dir){
	#	print(basename($dir) . "\n");
		print("<a class = \"btn btn-default btn-block btn-lg\" href=index.php?CURRDIR=" . $currdir . '\\' . basename($dir) . '\\' . ">" . basename($dir) ."</a><br>");
	}
		
}
else{
  $files = glob(getcwd() . $currdir .  '\*.{jpg,png}', GLOB_BRACE);
  print_r($files);
  foreach($files as $file)
  {
	echo "<img src=\"" . $file . "\" width=50%>";
  }
  $files = glob(getcwd() . $currdir  . '/*.{pdf,PDF}', GLOB_BRACE);
  foreach($files as $file)
  {
	echo "<iframe src=\"{$file}\" width=\"100%\" style=\"height:100%\"></iframe>";
  }


}
/*$path = scandir(getcwd());
foreach($path as $e){
	if($e[0] != '.'){
		print $e;
	}
}*/
?>