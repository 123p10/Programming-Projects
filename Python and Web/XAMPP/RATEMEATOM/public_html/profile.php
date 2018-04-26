<head>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<!--- Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="bootstrap/css/starability/starability-all.min.css">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<?php
include ('navbar.php');
include('checklogin.php');
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

#This is for the input form send rating if you haven't rated already
if(Input::exists()) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'rating' => array('required' => true)
		));

  if($validate->passed()) {
			if(!($my_user->hasRated($user))){
      		$my_user->rate($user->data()->username,6 - (Input::get('rating')));
          $user->updateRating($user);
			}
    }
    else {
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
	}	$user->updateRating($user);
}

?>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

<html>
<body>
<div class="container">	<center>
	<div class="row">
		<div class="">
    	 <div class="well profile">
            <div class="col-sm-12">
                    <b>
                      <h1 style="text-align: center"><?php echo $user->data()->name;?></h1>
                    </b>
					          <h5 style="text-align: center"><?php echo $user->data()->username;?></h5>
            </div>
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4">
                    <h2><strong> <?php echo $user->numberofRated(); ?> </strong></h2>
                    <p><small>Rated</small></p>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <h2><strong><?php echo $numRatings; ?></strong></h2>
                    <p><small>Ratings</small></p>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <h2><strong><?php echo $user->getRating($user); ?> / 5</strong></h2>
                      <p><small>Score</small></p>
                  </div>

            					<?php
            					if(!($my_user->data()->username == escape($user->data()->username))){
            					?>
                      <form action="" method="POST" >
                        <div class="txt-center">

                        <fieldset class="starability-basic">

                          <input type="radio" id="rate5" name="rating" value="5" />
                          <label for="rate5" title="Amazing">5 stars</label>

                          <input type="radio" id="rate4" name="rating" value="4" />
                          <label for="rate4" title="Very good">4 stars</label>

                          <input type="radio" id="rate3" name="rating" value="3" />
                          <label for="rate3" title="Average">3 stars</label>

                          <input type="radio" id="rate2" name="rating" value="2" />
                          <label for="rate2" title="Not good">2 stars</label>

                          <input type="radio" id="rate1" name="rating" value="1" />
                          <label for="rate1" title="Terrible">1 star</label>
                        </fieldset>
                        <input type="submit" value="RATE" id="submit" name="submit"></submit>
                      </div>
                      </form>
					         <?php } ?>
					     </div>
        </div>
    	</div>
		</div>
	</div>
</center>
</body>
</html>


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

  .starability-basic{
    position:relative;
    margin:auto;
  }
  #submit{
    border-radius: 8px;
    width:100%;
    height:10%;
    font-size: 30px;
    background-color: #ffb68c;
    color:white;
    border:none;

  }
  body{
    background-color: #606060;
  }
  form{
    padding-left:0;
    padding-top:0;
  }

</style>
