<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
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
    }
}
#Lets update our rating by compiling all of the ratings shall we?
$user->updateRating($user);

$my_user = new User(Session::get('user'));
if(!($my_user->data()->username == escape($user->data()->username))){
}

else{
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
            'star' => array('required' => true)
		));

        if($validate->passed()) {
			if(!($my_user->hasRated($user))){
				$my_user->rate($user->data()->username,Input::get('star')[0]);
			}
        } else {
            foreach($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
    
}

$numRatings = 0;
#Print all my ratings
if($user->getRatings($user) !== false){
	foreach ($user->getRatings($user)->results() as $row) {
		#echo $row->sender_user . " rated " . $row->client_user . " as a " . $row->rating;
		#Alright TODO: find the user with sender_user or client_user and get their name
		$numRatings++;
	}
}

?>

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2><?php echo $user->data()->name;?></h2>
                </div>             
            </div>            
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4">
                    <h2><strong> <?php echo $user->numberofRated(); ?> </strong></h2>                    
                    <p><small>Rated</small></p>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <h2><strong><?php echo $numRatings; ?></strong></h2>                    
                    <p><small>Ratings</small></p>
					<div class="txt-center">
					<?php
					if(!($my_user->data()->username == escape($user->data()->username))){
					

					?>
					  <form action="" method="post">
							<div class="rating" >
								<input id="star5" name="star[]" type="radio" value="5" class="radio-btn hide" />
								<label for="star5" >☆</label>
								<input id="star4" name="star[]" type="radio" value="4" class="radio-btn hide" />
								<label for="star4" >☆</label>
								<input id="star3" name="star[]" type="radio" value="3" class="radio-btn hide" />
								<label for="star3" >☆</label>
								<input id="star2" name="star[]" type="radio" value="2" class="radio-btn hide" />
								<label for="star2" >☆</label>
								<input id="star1" name="star[]" type="radio" value="1" class="radio-btn hide" />
								<label for="star1" >☆</label>
								<div class="clear"></div>
								<input type="hidden" name="token" id="token"value="<?php echo Token::generate(); ?>">

								<input type="submit">
							</div>
						</form>
					<?php } ?>
					</div>     
					
                </div>
                <div class="col-xs-12 col-sm-4">
                    <h2><strong><?php echo $user->getRating($user); ?></strong></h2>                    
                    <p><small>Score</small></p>
				</div>
            </div>
    	 </div>                 
		</div>
	</div>
</div>
<style>
@import url(http://fonts.googleapis.com/css?family=Lato:400,700);
body
{
    font-family: 'Lato', 'sans-serif';
    }
.profile 
{
    min-height: 355px;
    display: inline-block;
    }
figcaption.ratings
{
    margin-top:20px;
    }
figcaption.ratings a
{
    color:#f1c40f;
    font-size:11px;
    }
figcaption.ratings a:hover
{
    color:#f39c12;
    text-decoration:none;
    }
.divider 
{
    border-top:1px solid rgba(0,0,0,0.1);
    }
.emphasis 
{
    border-top: 4px solid transparent;
    }
.emphasis:hover 
{
    border-top: 4px solid #1abc9c;
    }
.emphasis h2
{
    margin-bottom:0;
    }
span.tags 
{
    background: #1abc9c;
    border-radius: 2px;
    color: #f5f5f5;
    font-weight: bold;
    padding: 2px 4px;
    }
.dropdown-menu 
{
    background-color: #34495e;    
    box-shadow: none;
    -webkit-box-shadow: none;
    width: 250px;
    margin-left: -125px;
    left: 50%;
    }
.dropdown-menu .divider 
{
    background:none;    
    }
.dropdown-menu>li>a
{
    color:#f5f5f5;
    }
.dropup .dropdown-menu 
{
    margin-bottom:10px;
    }
.dropup .dropdown-menu:before 
{
    content: "";
    border-top: 10px solid #34495e;
    border-right: 10px solid transparent;
    border-left: 10px solid transparent;
    position: absolute;
    bottom: -10px;
    left: 50%;
    margin-left: -10px;
    z-index: 10;
    }
	.txt-center {
  text-align: center;
}
.hide {
  display: none;
}

.clear {
  float: none;
  clear: both;
}

.rating {
    width: 90px;
    unicode-bidi: bidi-override;
    direction: rtl;
    text-align: center;
    position: relative;
}

.rating > label {
    float: right;
    display: inline;
    padding: 0;
    margin: 0;
    position: relative;
    width: 1.1em;
    cursor: pointer;
    color: #000;
}

.rating > label:hover,
.rating > label:hover ~ label,
.rating > input.radio-btn:checked ~ label {
    color: transparent;
}

.rating > label:hover:before,
.rating > label:hover ~ label:before,
.rating > input.radio-btn:checked ~ label:before,
.rating > input.radio-btn:checked ~ label:before {
    content: "\2605";
    position: absolute;
    left: 0;
    color: #FFD700;
}

</style>