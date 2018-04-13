<?php
#Alright so to prevent bad stuff my_profile and profile will be the same thing
#So simply add elements if this is my profile or not 

require_once 'core/init.php';

if(!$username = Input::get('user')) {
    Redirect::to('index.php');
} else {
    $user = new User($username);

    if(!$user->exists()) {
        Redirect::to(404);
    } else {
        $data = $user->data();
?>

        <h3><?php echo escape($data->username); ?></h3>
        <p>Name: <?php echo escape($data->name); ?></p>
		
<?php
    }
}
#Lets update our rating by compiling all of the ratings shall we?
$user->updateRating($user);
echo "Total Rating:" . $user->getRating($user) . "<br>";



#echo Session::get('user');
$my_user = new User(Session::get('user'));
if(!($my_user->data()->username == escape($user->data()->username))){
	?>
	<form action="" method="post">
    <div class="field">
        <label for="rating">Rating:</label>
        <input type="text" name="rating" value="<?php echo escape(Input::get('rating')); ?>" id="rating">
		<input type="hidden" name="token" id="token"value="<?php echo Token::generate(); ?>">
		<input type="submit" value="Rate">

	</div>
	</form>
	<?php
}

else{
	#echo "Dumbass you cant rate yourself";
	?>
    <ul>
        <li><a href="update.php">Update Profile</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="logout.php">Log out</a></li>
    </ul>

	<?php
}
#This is for the input form send rating if you haven't rated already
if(Input::exists()) {		
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'rating' => array('required' => true)
		));

        if($validate->passed()) {
			if(!($my_user->hasRated($user))){
				$my_user->rate($user->data()->username,Input::get('rating'));
			}
        } else {
            foreach($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
    
}


#Print all my ratings
if($user->getRatings($user) !== false){
	foreach ($user->getRatings($user)->results() as $row) {
		echo $row->sender_user . " rated " . $row->client_user . " as a " . $row->rating;
		#Alright TODO: find the user with sender_user or client_user and get their name
	}
}


?>