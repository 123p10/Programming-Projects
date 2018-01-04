//Reference the canvas or display from the HTML File
var canvas = document.getElementById("mainCanvas");
var context = canvas.getContext("2d");
//Width of the canvas
var width = 1700;
//Height of the Canvas
var height = 700;
//Speed for Player 1
var speed = 5;
//Speed for Player2
var speed2 = 6;
//Score for Player 1
var score = 0;
//An array of keys so we can have multiple keypresses
var keys = [];
//The Timer in seconds
var timer = 60;
//Boolean to check if the game has ended
var ended = false;
//This is the Number of Games Player 1 has won
var player1Score = 0;
//This is the Number of Games Player 2 has won
var player2Score = 0;
//Array of all the bullet objects that exist
var bullets = [];
//Speed that all the bullets should move at
var bSpeed = 50;
//The health of the Player 2
var hp2 = 25;
//Check if game has started
var started = false;
//The Frames per second of the Game this is just here so we can just change it
var fps = 30;
//The ammo that Player 1 can use
var ammo = 15;
//This is an array of all the "health" powerups on the canvas
var hpList = [];
//This is an array for all the "shotgun" powerups on the canvas
var triBulls = [];
//The Name displayed for Player 1
var p1Name = "p1";
//The Name displayed for Player 2
var p2Name = "p2";
//Does player 1 have the powerup "shotgun"
var triBullet = false;
//This is here so we can have the flashing title screen Shoot.io
var shootiocolor = "#000000";
//Sets the x coordinate of the cursor
var cursorX;
//Sets the y coordinate of the cursor
var cursorY;


// This is our player object for (future use should be used as a function so incase we wish to spawn a new player or tweak the settings)
var player = {
	x: 100,
	y: height/2,
	width: 20,
	height: 20
};
// This is our player 2 object for (future use should be used as a function so incase we wish to spawn a new player or tweak the settings)
var player2 = {
	x: width - 100,
	y: height/2,
	width: 30,
	height: 30
};
//Simply checks when we press a key down
window.addEventListener("keydown", function(e){
	//Sets that key to true in the array
	keys[e.keyCode] = true;
}, false);
//Checks if we have let go of the key or that key is up
window.addEventListener("keyup", function(e){
	//Deletes that key from the array
	delete keys[e.keyCode];
}, false);

//Our Random Color function
function getRandomColor() {
	//Gives us a list in a string of all the digits or characters we can use from 0 to F
    var letters = '0123456789ABCDEF';
	//You need the # there for hexadecimal
    var color = '#';
	// sets i to 0 then checks if i is less than 6 and if so increment 1 and go through the code
    for (var i = 0; i < 6; i++) {
		//We add 1 character from the list 6 type by adding a letter each time it goes through this loop randomly
		//Math.floor just means round down if it is a decimal
		//Math.random() * 16 means randomly choose a number from 0 to 15
		
        color += letters[Math.floor(Math.random() * 16)];
    }
	//When we call this function later give us the output of it
    return color;
}
	/*
		***I would use localStorage.getitem in the future***
		
		It provides you to have a essentially permanent storage even if you close the browser you must wipe your browser data
		However Mr.Knowles said that I should use sessionsStorage for the assessment
		
	
	*/
	//Get the score of player 1 from the variable we stored in this tab and set the local variable in this script to that variable
	//Or get variable from tab and store it for this game
	if(sessionStorage.getItem("p1score")){
		player1Score = sessionStorage.getItem("p1score");
	}
	if(sessionStorage.getItem("p2score")){

	player2Score = sessionStorage.getItem("p2score");
	}


//Object template for the bullet it has all the variables we need for it and later we can create a new bullet from this code
//The angle variable is unecessary I thought I would need it however I did not but at the time where we instantiate the object the order of where we put the variables matter 
//See the line in Update() method
	//For all this we set the variables that we declare when we create the object to the objects local variable

	function bullet(x,y,width,height,angle,velx,vely){
	this.x = x;
	this.y = y;
	this.width = width;
	this.height = height;
	this.velx = velx;
	this.vely = vely;
	//We add the bullet to the bullets array so we can work with all the bullets instead of working one by one
	bullets.push(this);
}
//Object template for Health Powerup with variables for drawing
function hpUp(x,y,width,height){
	//Set the variables to the local hard variable of the object see above in bullet()
	this.x = x;
	this.y = y;
	this.width = width;
	this.height = height;
	//Add health powerup to health powerup array 
	hpList.push(this);
}

//Like above
function triBull(x,y,width,height){
	this.x = x;
	this.y = y;
	this.width = width;
	this.height = height;
	triBulls.push(this);
}

// Our game loop
function game(){
	//If the game has started then update and render the canvas for the game
	if(started){
		update();
		render();
	}
	//If the game has not started then update and render the canvas for the Menu
	if(!started){
		menuRender();
		menuUpdate();
	}
	
}

//Render function for menu
function menuRender(){
	//Clear rect so when an object moves we erase the remains of that object every frame if we do not have this then moving an object will cause multiple copies of that object to remain on the canvas
	context.clearRect(0,0,width,height);
	//Set color of object or text
	context.fillStyle = "#a9a9a9";
	//Draw a rect with the x,y,width and height
	context.fillRect(width/2 -200 ,height/2 + 100,400,100);
	context.fillRect(width - 250 ,height/2,200,50);
	context.fillRect(width - 250 ,height/2 + 100,200,50);
	context.fillRect(50 ,height/2 ,250,50);
	context.fillRect(50 ,height/2 + 100 ,250,50);
	context.fillRect(width/2 - 200 ,height/2 + 250,400,50);

	
	//If one of these settings is true darken the button so the player knows what options he has chosen 
	if(fps == 30){
		context.fillStyle = "#888888";
		context.fillRect(width - 250 ,height/2,200,50);

	}
	if(fps == 60){
		context.fillStyle = "#888888";
		context.fillRect(width - 250 ,height/2 + 100,200,50);
	}
	if(ammo == 15){
		context.fillStyle = "#888888";
		context.fillRect(50 ,height/2 + 100 ,250,50);


	}
	if(ammo == Infinity){
		context.fillStyle = "#888888";
		context.fillRect(50 ,height/2 ,250,50);

	}
	

	context.fillStyle = "black";
	//Set the font as bold with a size of 60 pixels and font arial
	context.font = "bold 60px arial";
	//Imagine when you click the center button on word the words you type are typed from the center and go out that is what is done here
	context.textAlign="center"; 
	//Draw text with the "text",x,y
	context.fillText("Player 1: " + player1Score,width/4,80);
	context.fillText("Player 2: " + player2Score,width*(3/4),80);	
	context.font = "bold 40px arial";
	//Wipe Data currently does nothing because we are now working with python
	context.fillText("Wipe Data",width/2 ,height/2 + 290);
	context.font = "bold 150px arial";
	//Set the color for the logo to the variable shootiocolor
	context.fillStyle = shootiocolor;

	context.fillText("Shoot.io",width/2 ,height/2);
	context.font = "bold 70px arial";
	context.fillStyle = "black";

	context.fillText("Start",width/2 ,height/2 + 170);

	context.font = "bold 30px arial";

	context.fillText("30 FPS",width - 150 ,height/2 + 35);
	context.fillText("60 FPS",width - 150 ,height/2 + 135);
	context.fillText("INFINITE AMMO",170 ,height/2 + 35);
	context.fillText("FINITE AMMO",170 ,height/2 + 135);
	
	
	
	context.fillText("Abilities",width/2 - 440,height/2 - 15);
	context.fillText("Entities",width/2 + 440,height/2 - 15);

	context.fillStyle = "green";
	context.fillRect(width/2 - 500,height/2,20,20);
	context.fillStyle = "brown";
	context.fillRect(width/2 - 500,height/2 + 50,20,20);
	
	context.fillStyle = "blue";
	context.fillRect(width/2 + 500,height/2,20,20);
	context.fillStyle = "red";
	context.fillRect(width/2 + 500,height/2 + 50,20,20);
	context.fillStyle = "black";
	context.fillRect(width/2 + 500,height/2 + 100,20,20);


	
	context.font = "bold 15px arial";

	context.fillStyle = "black";
	context.fillText("+4% HP for P2", width/2 - 420,height/2 + 15);
	context.fillText("Shotgun for P1", width/2 - 420,height/2 + 65);
	context.fillText("Player 1", width/2 + 450,height/2 + 15);
	context.fillText("Player 2", width/2 + 450,height/2 + 65);
	context.fillText("Bullet", width/2 + 450,height/2 + 115);



	
	
}
//Menu Update function
function menuUpdate(){
	//Check when in the canvas the user has click something use the variable e to reference it
	canvas.onmousedown=function(e){
		//This next code is all checking if when we click if the position of the cursor is inside a certain area so if we clicked on a button
		//I used a function I made called isPointInsideRect see later on for that function
		if(isPointInsideRect(e.pageX,e.pageY,width/2 -200,height/2 + 100,400,100)){
			started = true;
			start();
			context.fillStyle = "#a9a9a9";
			context.fillRect(width/2 -200 ,height/2 + 100,400,100);

		}
		if(isPointInsideRect(e.pageX,e.pageY,width - 250,height/2,200,50)){

			fps = 30;
		}
		if(isPointInsideRect(e.pageX,e.pageY,width - 250,height/2 + 100,200,50)){
			fps = 60;
		}
		if(isPointInsideRect(e.pageX,e.pageY,50,height/2,250,50)){
			ammo = Infinity;
		}
		if(isPointInsideRect(e.pageX,e.pageY,50,height/2 + 100,250,50)){
			ammo = 15;
			
		}
		
	}
}
//isPointInsideRect takes these variables
/*
pointX is the x position of the mouse however can be used for other circumstances
pointY it the y position of the mouse
rectX is the x position of the rectangle
rectY is the y position of the rectangle
rectWidth is the width of the rectangle
rectHeight is the height of the rectangle
 
	This then checks if the pointX and pointY are in the bound of the rectangle
*/
function isPointInsideRect(pointX,pointY,rectX,rectY,rectWidth,rectHeight){
    return  (rectX <= pointX) && (rectX + rectWidth >= pointX) &&
                 (rectY <= pointY) && (rectY + rectHeight >= pointY);
}

//Start function so when we first press start we do this code
function start(){
		//Spawn a health powerup with the object template from above with a random x and y but width and height of 20
		//Note for Math.random you can do just Math.Random * 20 for the range but if you want a min and max you do Math.Random() * (max - min)
		var l = new hpUp(Math.random() * (width - 20),Math.random() * (height - 20),20,20);
		//Spawn a shotgun powerup with the object template from above with a random x and y but width and height of 20
		var m = new triBull(Math.random() * (width - 20),Math.random() * (height - 20),20,20);
}

//Update Function this happens every tick
function update(){
	//Set the player 1 name and player 2 name 
	p1Name = document.getElementById("firstID").value;
	p2Name = document.getElementById("secondID").value;
	//When the timer is less than or equal to 0
	if(timer <= 0){
		//If the second player is still alive
		if(hp2 > 0){
			//alert creates a textbox like a popup which temporarily freezes the game until ok is pressed
			alert("player two won");
			//Say the game has ended
			ended = true;
			//Add 1 to the amount of games Player 2 had won or increment one
			player2Score++;

		}
		
	}
	// if the player 2 is dead
	if(hp2 <= 0 ){
		//same as above
			alert("player one won");
			//increment score
			player1Score++;
			//Game has ended
			ended = true;
	}
	
	
	//This next code is all using JS keycodes which are numbers based on the keys of a keyboard
	//This next code just changes the position of the players based on the keys they pressed
	//They check if the key is pressed by check if the keys are in the array with if(keys[num]){}
	if(keys[87]){
		player.y -= speed;
	}
	if(keys[83]){
		player.y += speed;
	}
	if(keys[65]){
		player.x -= speed;
	}
	if(keys[68]){
		player.x += speed;
	}
	
	if(keys[38]){
		player2.y -= speed2;
	}
	if(keys[40]){
		player2.y += speed2;
	}
	if(keys[37]){
		player2.x -= speed2;
	}
	if(keys[39]){
		player2.x += speed2;
	}
	//If !tribullet means if player does not have the shotgun ability
	if(!triBullet){
		//Checks if we pressed the mouse down
		canvas.onmousedown=function(e){
		//WARNING MATH MATH MATH Math
		
		//Uses Pythagorean Theroem
		
		//Gets the x distance between the cursor and the player 1 so we just subtract the 2 values
		tx = e.pageX - player.x;
		//Gets the y distance between the cursor and the player 1 so we just subtract the 2 values
		ty = e.pageY - player.y;
		//Now we use a squared + b squared = c squared
		//So tx is a and ty is b
		//so tx*tx + ty*ty = C squared
		//So we use Math.sqrt to squareroot c
		var dist = Math.sqrt(tx*tx+ty*ty);
		
		var velX = (tx/dist)*bSpeed;
		var velY = (ty/dist)*bSpeed;
		
		//Check if ammo is greater than 0
		if(ammo > 0 ){
			//Create a bullet object with x,y,width,height,angle(not needed),velocityx,velocity y
			var j = new bullet(player.x,player.y,20,20,0,velX,velY);
			//Decrement 1
			ammo--;
		}
		
		
	};
	}
	//Same code as Before except I duplicated it two more times for the shotgun 
	//Check if we have the powerup shotgun
	if(triBullet){
	canvas.onmousedown=function(e){

		
		tx = e.pageX - player.x;
		ty = e.pageY - player.y;
		var dist = Math.sqrt(tx*tx+ty*ty);
		var velX = (tx/dist)*bSpeed;
		var velY = (ty/dist)*bSpeed;
		//I use 80 just so we can have the spread of the shotgun where two of the bullets go out of the gun left or right
		var tx2 = (e.pageX - 80) - player.x;
		var ty2 = (e.pageY - 80) - player.y;
		var dist2 = Math.sqrt(tx2*tx2+ty2*ty2);
		var velX2 = (tx2/dist2)*bSpeed;
		var velY2 = (ty2/dist2)*bSpeed;
		
		var tx3 = (e.pageX + 80) - player.x;
		var ty3 = (e.pageY + 80) - player.y;
		var dist3 = Math.sqrt(tx3*tx3+ty3*ty3);
		var velX3 = (tx3/dist3)*bSpeed;
		var velY3 = (ty3/dist3)*bSpeed;
		// We need this because if we shoot when ammo is greater than 0 but less than 3 than we will end up with negative ammo
		if(ammo > 2){
			var j = new bullet(player.x,player.y,20,20,0,velX,velY);
			var k = new bullet(player.x,player.y,20,20,0,velX3,velY3);
			var l = new bullet(player.x,player.y,20,20,0,velX2,velY2);

			ammo-=3;
		}		
		
	};
	}

		
	

	//All this code below is the wall hitboxes
	//So if the player goes past 0 coordinate we return it back to 0
	if(player.x < 0){
		player.x = 0;
	}
	if(player.y < 0){
		player.y = 0;
	}
	if(player.x >= width - player.width){
		player.x = width - player.width;
	}
	if(player.y >= height - player.height){
		player.y = height - player.height;
	}
	if(player2.x < 0){
		player2.x = 0;
	}
	if(player2.y < 0){
		player2.y = 0;
	}
	if(player2.x >= width - player2.width){
		player2.x = width - player2.width;
	}
	if(player2.y >= height - player2.height){
		player2.y = height - player2.height;
	}
	//for loop set i to 0 while the i is less than the bullets array length increment i and go through the code
	for(i = 0; i < bullets.length;i++){
		if(collision(player2,bullets[i])){
			//Process function is essentialy our points function
			process();	
		}
	}
	
	for(i = 0;i < bullets.length;i++){
		//We add the velocity x and y to the bullets x and y this is neccessarry for future you could have a decremental function so after a while the bullet slows down 
		//Like velx -= integer
		bullets[i].x += bullets[i].velx;
		bullets[i].y += bullets[i].vely;
		}
	for(i = 0; i < hpList.length;i++){
		if(collision(player2,hpList[i])){
			//We increse the health of player 2 by one you could do hp2++ but if you want to change it later you have to do
			//   +=   is the addition function which is like x = x + integer but instead its x+=integer
			hp2+= 1;
			//I destroy the health powerup from the array
		    hpList = hpList.splice(i - 1,1);
			//Spawn health powerup
			var l = new hpUp(Math.random() * (width - 20),Math.random() * (height - 20),20,20);	
		}
	}
	for(i = 0; i < triBulls.length;i++){
		//We use collision function which checks if something is inside rect it comes from the video in class and does not work for buttons
		if(collision(player,triBulls[i])){
			//Set tribullet to true so the game knows we have the shotgun ability
			triBullet = true;
			//Remove the shotgun powerup from the array by settings the array to essentially nothing just []
			triBulls = [];
		}
	}
}

//Render function all the graphics are here
function render(){
	//Remove all the graphics every frame
	context.clearRect(0,0,width,height);
	
	context.fillStyle = "blue";
	context.fillRect(player.x,player.y,player.width,player.height);

	context.fillStyle = "red";
	context.fillRect(player2.x,player2.y,player2.width,player2.height);

	context.fillStyle = "black";

	context.font = "bold 30px helvetica";
	context.textAlign="center"; 
	context.fillText("Shoot.io",width/2,30);
	context.font = "bold 15px helvetica";
	context.textAlign="start"; 
	context.fillStyle = "green";

	context.fillRect(player2.x + 1, player2.y + 40, 120*(hp2/100),5);
	context.fillStyle = "black";
	context.font = "bold 20px arial";
	context.textAlign="center"; 

	context.fillText(ammo, player.x + 10, player.y + 39);
	context.font = "bold 14px arial";
	context.fillText(p1Name, player.x + 10, player.y - 10);
	context.fillText(p2Name, player2.x + 10, player2.y - 10);
	
	context.textAlign="start"; 

	context.font = "bold 15px helvetica";
	//parseInt(player1Score) basically converts that integer to a string
	context.fillText("Player 1 Games: " + parseInt(player1Score), 10,30);
	context.fillText("Player 2 Games: " + parseInt(player2Score), 10,50);

	context.font = "bold 30px helvetica";

	context.fillText(Math.floor(timer), width - 45,40);


	//Here we draw all the stuff from those arrays
	for(i = 0;i < bullets.length;i++){
		context.fillRect(bullets[i].x,bullets[i].y,bullets[i].width,bullets[i].height);
	}
	for(i = 0;i < hpList.length;i++){
		context.fillStyle = "green";
		context.fillRect(hpList[i].x,hpList[i].y,hpList[i].width,hpList[i].height);
	}
	for(i = 0;i < triBulls.length;i++){
		context.fillStyle = "brown";
		context.fillRect(triBulls[i].x,triBulls[i].y,triBulls[i].width,triBulls[i].height);
	}


	

}
//Score function
function process(){
	//lower hp of player 2 by 5
	hp2 -= 5
}


//Collision function check if object is touching object 2
function collision(first, second){
	return !(first.x > second.x + second.width || first.x+first.width<second.x || first.y > second.y + second.height || first.y + first.height<second.y);	
}
//Set interval is a function which is like an update function it happens every tick or whenever you want it to
//it goes setInterval(function(){},how long until do this function)
setInterval(function(){
	if(!ended){
		game();
	}
	if(ended){
	//Here we store the won games in sessionStorage
	//However if it does not exist than set it to 0 or else when we try to reference it in our code it will show up as "NaN" or Not a Number
	if(sessionStorage.getItem('p1score')){
		sessionStorage.setItem('p1score',player1Score);
	}
	if(sessionStorage.getItem('p2score')){
		sessionStorage.setItem('p2score', player2Score);
	}
	if(!sessionStorage.getItem('p1score') ){
		sessionStorage.setItem('p1score', 0);

	}
	if(!sessionStorage.getItem('p2score') ){
		sessionStorage.setItem('p2score', 0);
	}
	//Reload page when game has ended
	document.location.reload(false);
	
	}
},1000/fps);

setInterval(function(){
if(started){
	timer--;
}
},1000);
setInterval(function(){
	if(started){
	ammo += 1;
	}
},3000);
setInterval(function(){
	shootiocolor = getRandomColor();
}, 100);
