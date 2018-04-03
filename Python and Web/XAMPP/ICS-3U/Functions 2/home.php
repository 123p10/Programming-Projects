<h1>190M Music Playlist</h1>
<?php
session_start();
$doPrint = true;
$orig = array(
	"190M Rap.mp3"=> 58,
	"Be More.mp3"=> 5438375,
	"Drift Away.mp3"=>5724612,
	"Hello.mp3"=>1871110,
	"Just Because.mp3"=>4691825,
	"Panda Sneeze.mp3"=>58
);

if(isset($_SESSION['array'])){
	$files = $_SESSION['array'];
}
else{
	$files = $orig;

}
if(isset($_GET['choice']) ){
	if($_GET['choice'] == "add" && isset($_GET['addSongSize']) && isset($_GET['addSongSize'])){
		$files = add_songs_playlist($_GET['addSongName'],$_GET['addSongSize'],$files);
	}
	else if($_GET['choice'] == "remove" && isset($_GET['removeSongName'])){
		$files = remove_songs_playlist($_GET['removeSongName'],$files);
	}
	else if($_GET['choice'] == "sortSongValue"){
		$files = sort_songsValue_playlist($files);
	}
	else if($_GET['choice'] == "sortSongName"){
		$files = sort_songsName_playlist($files);
	}
	else if($_GET['choice'] == "clear"){
		unset($_SESSION['array']);
		$files = $orig;
	}
	else if($_GET['choice'] == "searchKeyword" && isset($_GET['keyword'])){
		$doPrint = false;
		find_a_song($_GET['keyword'],$files);
	}
	else if($_GET['choice'] == "smallSong"){
		$doPrint = false;
		small_songs($files);
	}
}
if($doPrint){
	foreach($files as $key=>$val){
		echo "$key ($val b)<br>";
	}
	$_SESSION['array'] = $files;
}

function add_songs_playlist($name,$num,$arr){
	$arr[$name] = $num;
	return $arr;
}
function remove_songs_playlist($name,$arr){
	unset($arr[$name]);
	return $arr;
}
function sort_songsValue_playlist($arr){
	asort($arr);
	return $arr;
}
function sort_songsName_playlist($arr){
	ksort($arr);
	return $arr;
}
function find_a_song($key,$arr){
	foreach($arr as $k=>$v){
		$print = false;
		for($i = 0;$i < strlen($key);$i++){
			if($key[$i] == "?"){
				continue;
			}
			else if($key[$i] == $k[$i]){
				continue;
			}
			else if($key[$i] == "*"){
				$print = true;
			}
			else{
				break;
			}
		}
		if($print){
			echo "$k ($v b)<br>";
		}
		
	}
}
function small_songs($arr){
	foreach($arr as $key=>$val){
		if($val < 1000){
			echo "$key ($val b)<br>";
		}
	}
}



?><br>
<form action="" method="get">
	Clear Session<input type="radio" name="choice" value="clear"><br>
	Add Song<input type="radio" name="choice" value="add">
	Song Name<input type="text" name="addSongName">
	Song Size<input type="text" name="addSongSize"><br>
	
	Remove Song<input type="radio" name="choice" value="remove">
	Song Name<input type="text" name="removeSongName">
	<br>
	Sort Songs by Size<input type="radio" name="choice" value="sortSongValue"><br>
	Sort Songs by Name<input type="radio" name="choice" value="sortSongName"><br>
	Search with Keyword<input type="radio" name="choice" value="searchKeyword">
	Keyword<input type="text" name="keyword"><br>
	Show Songs less than 1000b.<input type="radio" name="choice" value="smallSong">
<br>
<input type="submit">

</form>