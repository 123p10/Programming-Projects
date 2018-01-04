var canvas = document.getElementById("mainCanvas");
var context = canvas.getContext("2d");

var width = 1700;
var height = 700;
var speed = 5;
var speed2 = 10;
var score = 0;
var score2 = 0;
var keys = [];
var timer = 1800;
var ended = false;
var player1Score = 0;
var player2Score = 0;
var bullets = [];
var bSpeed = 35;
var hp2 = 100;
var started = false;
var fps = 30;
//var j;

var player = {
	x: 100,
	y: height/2,
	width: 20,
	height: 20
};
var player2 = {
	x: width - 100,
	y: height/2,
	width: 20,
	height: 20
};
var cube = {
	x: Math.random() * (width - 60),
	y: Math.random() * (height - 60),
	width: 60,
	height: 60
};

window.addEventListener("keydown", function(e){
	keys[e.keyCode] = true;
}, false);

window.addEventListener("keyup", function(e){
	delete keys[e.keyCode];
}, false);
/*
up 38
down 40
left 37
right 39

*/


var cursorX;
var cursorY;


	if(sessionStorage.getItem("p1score")){
		player1Score = sessionStorage.getItem("p1score");
	}
	if(sessionStorage.getItem("p2score")){

	player2Score = sessionStorage.getItem("p2score");
	}
	if(!sessionStorage.getItem("p1score")){

		player1Score = 0;
	}
	if(!sessionStorage.getItem("p2score")){

		player2Score = 0;
	}


function bullet(x,y,width,height,angle,velx,vely){
	this.x = x;
	this.y = y;
	this.width = width;
	this.height = height;
	this.velx = velx;
	this.vely = vely;
	//this.angle = angle;
	
	console.log(angle);
	bullets.push(this);
}

function angle(cx, cy, ex, ey) {
  var dy = ey - cy;
  var dx = ex - cx;
  var theta = Math.atan2(dy, dx); // range (-PI, PI]
  theta *= 180 / Math.PI; // rads to degs, range (-180, 180]
  //if (theta < 0) theta = 360 + theta; // range [0, 360)
  return theta;
}

function game(){
	if(started){
		update();
		render();
	}
	if(!started){
		menuRender();
		menuUpdate();
	}
}
//Menu
function menuRender(){
	//<button onclick="myFunction()">Click me</button>
	context.clearRect(0,0,width,height);

	context.fillStyle = "#a9a9a9";
	context.fillRect(width/2 -200 ,height/2 + 100,400,100);
	context.fillRect(width - 250 ,height/2,200,50);
	context.fillRect(width - 250 ,height/2 + 100,200,50);

	context.fillStyle = "black";
	context.font = "bold 70px arial";
	context.textAlign="center"; 

	context.fillText("Start",width/2 ,height/2 + 170)
	context.font = "bold 30px arial";

	context.fillText("30 FPS",width - 150 ,height/2 + 35)
	context.fillText("60 FPS",width - 150 ,height/2 + 135)

	
}
function menuUpdate(){
	canvas.onmousedown=function(e){
		if(isPointInsideRect(e.pageX,e.pageY,width/2 -200,height/2 + 100,400,100)){
			started = true;
		}
		if(isPointInsideRect(e.pageX,e.pageY,width - 250,height/2,200,50)){
			fps = 30;
		}
		if(isPointInsideRect(e.pageX,e.pageY,width - 250,height/2 + 100,200,50)){
			fps = 60;
		}
	}
}
function isPointInsideRect(pointX,pointY,rectX,rectY,rectWidth,rectHeight){
    return  (rectX <= pointX) && (rectX + rectWidth >= pointX) &&
                 (rectY <= pointY) && (rectY + rectHeight >= pointY);
}
















function update(){
	//console.log(cursorX);
	timer -= 1;
	if(timer <= 0){
		
		if(hp2 > 0){
			alert("player two won");
			ended = true;
			player2Score++;

		}
		
	}
	if(hp2 <= 0 ){
			alert("player one won");
			player1Score++;
			ended = true;
	}
	if(keys[87]){
		//console.log("up");	
		player.y -= speed;
	}
	if(keys[83]){
	//	console.log("down");	
		player.y += speed;
	}
	if(keys[65]){
	//	console.log("left");	
		player.x -= speed;
	}
	if(keys[68]){
	//	console.log("right");	
		player.x += speed;
	}
	
	if(keys[38]){
		//console.log("up");	
		player2.y -= speed2;
	}
	if(keys[40]){
	//	console.log("down");	
		player2.y += speed2;
	}
	if(keys[37]){
	//	console.log("left");	
		player2.x -= speed2;
	}
	if(keys[39]){
	//	console.log("right");	
		player2.x += speed2;
	}
	if(keys[69]){
	//	console.log("right");	
		//var j = new bullet(player.x,player.y,20,20);
	}
	canvas.onmousedown=function(e){
		//var mx,my = (cursorX - player.x, cursorY - player.y);
		//var angle = Math.atan2(-my, mx);
		//var t = angle(e.pageX,e.pageY,player.x,player.y);
		tx = e.pageX - player.x;
		ty = e.pageY - player.y;
		var dist = Math.sqrt(tx*tx+ty*ty);
		var rad = Math.atan2(ty,tx);
		var angle = rad/Math.PI * 180;
		var velX = (tx/dist)*bSpeed;
		var velY = (ty/dist)*bSpeed;


		//console.log(ang);
		var j = new bullet(player.x,player.y,20,20,0,velX,velY);
 		//console.log(e.pageX + " / " + e.pageY);
		console.log(e.pageX,e.pageY);
		
	};

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
		player.x = 0;
	}
	if(player2.y < 0){
		player.y = 0;
	}
	if(player2.x >= width - player2.width){
		player2.x = width - player2.width;
	}
	if(player2.y >= height - player2.height){
		player2.y = height - player2.height;
	}
	
	if(collision(player,player2)){
		//console.log("collided");
		//player.x = 10;
		//player.y = 10;
		process2();
	}
	for(i = 0; i < bullets.length;i++){
		if(collision(player2,bullets[i])){
		//console.log("collided");
		//player.x = 10;
		//player.y = 10;
		process();
	}
	}
	for(i = 0;i < bullets.length;i++){
		
		//bullets[i].x += bullets[i].velx;
		//bullets[i].y += bullets[i].vely;

	//	bullets[i].velx = Math.cos(bullets[i].angle - (Math.PI/2)) * speed;
	//	bullets[i].vely = Math.sin(bullets[i].angle - (Math.PI/2)) * speed;
	
		bullets[i].x += bullets[i].velx;
		bullets[i].y += bullets[i].vely;
	//	console.log(bullets[i].angle);

	}
	
}
function render(){
	context.clearRect(0,0,width,height);
	
	context.fillStyle = "blue";
	context.fillRect(player.x,player.y,player.width,player.height);

	context.fillStyle = "red";
	context.fillRect(player2.x,player2.y,player2.width,player2.height);

	//context.fillRect(cube.x,cube.y,cube.width,cube.height);
	context.fillStyle = "black";

	context.font = "bold 30px helvetica";
	context.textAlign="center"; 
	context.fillText("Shoot.io",width/2,30);
	context.font = "bold 15px helvetica";
	context.textAlign="start"; 

//	context.fillText("Player 1 Score: " + score, 10,30);
	//context.fillText("Player 2 Health: " + hp2, 10,50);
	context.fillStyle = "green";

	context.fillRect(player2.x - 15, player2.y + 30, 50*(hp2/100),5);
	context.fillStyle = "black";

	context.fillText("Player 1 Games: " + parseInt(player1Score), 10,30);
	context.fillText("Player 2 Games: " + parseInt(player2Score), 10,50);

	context.font = "bold 30px helvetica";

	context.fillText(Math.floor((timer/1000)*30), width - 45,40);
	//context.fillRect(j.x,j.y,j.width,j.height);
	for(i = 0;i < bullets.length;i++){
		context.fillRect(bullets[i].x,bullets[i].y,bullets[i].width,bullets[i].height);
	}

}

function process(){
	hp2 -= 5
	cube.x = Math.random() * (width - 20);
	cube.y =Math.random() * (height - 20);	
}
function process2(){
	score2++;
	cube.x = Math.random() * (width - 20);
	cube.y =Math.random() * (height - 20);
}


function collision(first, second){
	return !(first.x > second.x + second.width || first.x+first.width<second.x || first.y > second.y + second.height || first.y + first.height<second.y);
	
}

setInterval(function(){
	if(!ended){
		game();
	}
	if(ended){
	var url = window.location.href ;	
	var win = window.open(url, "Shoot.io");
	win.location.reload();
	//	var p1score = player1Score;
	if(sessionStorage.getItem('p1score')){
		sessionStorage.setItem('p1score', player1Score);
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

	
		//window.close();
	}
},1000/fps);


/*setInterval(function(){
	timer--;
},1000/50);*/

//remember history
