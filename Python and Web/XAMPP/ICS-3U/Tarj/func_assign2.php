<?php

function display() {
    foreach($_SESSION["songs"] as $name => $size_song) {
     echo $name. " ". $size_song. ".mp3". "b". "</br>";
}
}

function add_songs_playlist($names, $size) {

  $_SESSION["songs"][$names] = $size;
  foreach($_SESSION["songs"] as $n => $s)
{
  echo $n . ".mp3 $s b"."</br>";
}

}



function remove_songs_playlist($i) {
  
  unset($_SESSION["songs"][$i]);
  
  foreach($_SESSION["songs"] as $o => $u) {
    echo $o. ".mp3 $u b". "</br>";
  }
}



function sort_playlist() {
  
  ksort($_SESSION["songs"]);
  foreach(["songs"] as $m => $j){
    echo $m. ".mp3 $j b". "</br>"; 
  }
}

function small_songs() {
    
  foreach($_SESSION["songs"] as $namee => $sizee){
    if ($sizee < 1000){
      echo $namee. ".mp3". " is less than 1000b". "</br>";
    }
    else {echo null;}
  }
  
}


function find_a_song($letter) {
$i = strlen($letter);

foreach($_SESSION["songs"] as $key => $value) {
  $flag = false;
  
  for ($x = 0; $x < $i; $x++) {
    if (strlen($key) - 1 < $x) {
      break;
    }
   else if ($letter[$x] == "?") {
      continue;
    }
    elseif ($letter[$x] == $key[$x]) {
      continue;
    }
    elseif ($letter[$x] == "*") {
      $flag = true;
      break;
    }
    else {
      break;
    }
  }
  if($flag == true){
    echo $key. ".mp3". " ". $value. "b". "</br>";
  }
  
}
}

function clear() {
    unset($_SESSION["songs"]);
    echo "Songs have been cleared";
}

function reset_array() {
    $_SESSION["songs"] = array("190M Rap" => 58,
"Be More" => 5438375,
"Drift Away" => 5724612,
"Hello" => 1871110,
"Just Because" => 4691825,
"Panda Sneeze" => 58
);

}

?>