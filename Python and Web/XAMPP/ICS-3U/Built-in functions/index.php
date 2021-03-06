<?php
session_start();

$_SESSION["songs"] = array("190M Rap" => 58,
"Be More" => 5438375,
"Drift Away" => 5724612,
"Hello" => 1871110,
"Just Because" => 4691825,
"Panda Sneeze" => 58
);

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Tarj's Music Player! </title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"></link>
    </head>
    
    <body style = "background-color: #000000">
        
        <center>
            <h1 style = "color: #e50000"><u>Tarj's Music Player!</u></h1>

        <form method = "POST">
            <div>
                <input type = "text" class = "form-control" name = "songName" placeholder = "Enter Name" style = "width:170px">
            </div>
            <div>
                <input type = "number" class = "form-control" name = "songSize" placeholder = "Enter Size" style = "width:170px">
            </div> 
            
            <div>
                <input type = "text" class = "form-control" name = "removeSong" placeholder = "Remove" style = "width:170px">
            </div> 
            
            <div>
                <input type = "text" class = "form-control" name = "findSong" placeholder = "Find" style = "width:170px">
            </div> 
            
            <div>
                <button type = "submit" name="display" class= "btn btn-secondary" style = "width:120px">Display Songs</button>
            </div>
            
            <div>
                <button type = "submit" name="add" class= "btn btn-secondary" style = "width:120px">Add Song</button>
            </div>

            <div>
                <button type = "submit" name="remove" class= "btn btn-secondary" style = "width:120px">Remove Song</button>
            </div>
            
            <div>
                <button type = "submit" name="sort" class= "btn btn-secondary" style = "width:120px">Sort</button>
            </div>
            
            <div>
                <button type = "submit" name="smallSongs" class= "btn btn-secondary" style = "width:120px">Small</button>
            </div>
            
            <div>
                <button type = "submit" name="find" class= "btn btn-secondary" style = "width:120px">Find Song</button>
            </div>
            
            <div>
                <button type = "submit" name="clear" class= "btn btn-secondary" style = "width:120px">Clear</button>
            </div>

            <div>
                <button type = "submit" name="reset" class= "btn btn-secondary" style = "width:120px">Reset</button>
            </div>
            
            <h3 style = "color:#e50000"><u>OUTPUT:</u></h3>
            </center>
        </form>
        <center>
        <?php include('func_assign2.php'); ?>
        
        <font color = "#e50000">
        <?php
        
        $empty = "";
        $empty1 = " ";
        
            if(isset($_POST['add'])) {
                if($_POST['songName'] == $empty or $_POST['songName'] == $empty1 or $_POST['songSize'] == $empty
                or $_POST['songSize'] == $empty1) {
                    echo "ERROR - NO ENTRY IN REQUIRED FIELDS!";
                }
                elseif(isset($_POST['add'])) {
                    if ($_POST['songSize'] > -1){
                        echo add_songs_playlist($_POST['songName'], $_POST['songSize']);
                    }else {echo "Song Size cannot be less than 0!";}
            }
            }
            
            if(isset($_POST['remove'])) {
                if($_POST['removeSong'] == $empty or $_POST['removeSong'] == $empty1) {
                    echo "ERROR - NO ENTRY IN REQUIRED FIELDS!";
                }
                elseif(isset($_POST['remove'])) {
                echo remove_songs_playlist($_POST['removeSong']);
            }
            }
            
            
            if(isset($_POST['sort'])) {
                echo sort_playlist();
            }
            
            if(isset($_POST['smallSongs'])) {
                echo small_songs();
            }
            
            if(isset($_POST['find'])) {
                if($_POST['findSong'] == $empty or $_POST['findSong'] == $empty1) {
                    echo "ERROR - NO ENTRY IN REQUIRED FIELDS!";
                }
                elseif(isset($_POST['find'])) {
                echo find_a_song($_POST['findSong']);
            }
            }
            
            
            if(isset($_POST['clear'])) {
                echo clear();
            }
            
            if(isset($_POST['display'])) {
                echo display();
            }
            
            if(isset($_POST['reset'])) {
                echo reset_array();
            }
        
        ?>
        </font>
        </center>
    </body>
</html>
