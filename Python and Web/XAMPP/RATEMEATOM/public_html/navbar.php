<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
	require_once 'core/init.php';
	$username = Input::get('user');
    $user = new User($username);

?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Rate Me</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><?php echo $user->data()->name;?> <span class="caret"></span></a>
          <ul class="dropdown-menu " role="menu">
            <li class="dropdown-item" ><a href="changepassword.php">Change Password</a></li>
            <li class="dropdown-item"><a href="update.php">Update Profile</a></li>
            <li class="dropdown-item"><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      <li class="search-container">
          <form action="search.php">
            <input type="text" placeholder="Search.." name="search" id="search">
      <!--      <button type="submit"><i class="fa fa-search"></i></button>-->
          </form>
      </li>
    </ul>

    </div>
  </div>
</nav>

<style>
  .collapse{
    position:relative;

  }
  .dropdown-item{
  	position:relative;
  	float:center;
  	left:25%;
  }
  .search-container{
    position:relative;
    
  }
  #search{
    position:absolute;
    top:75%;
    height:100%;
  }
</style>
