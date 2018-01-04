var canvas = document.getElementById("mainCanvas");
var context = canvas.getContext("2d");
var img = new Image();
var hitmarker = new Image();
var magikarp = new Image();
var width = 1700;
var height = 700;
var speed = 5;
var score = 0;
var score2 = 0;
var keys = [];
var timer = 1800;
var ended = false;
var player1Score = 0;
var player2Score = 0;
img.src = 'doge.png';
hitmarker.src = 'hitmarker.png';
magikarp.src = 'magikarp.gif';

var player = {
	x: 10,
	y: 10,
	width: 20,
	height: 20
};
var player2 = {
	x: 100,
	y: 100,
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




function game(){
	update();
	render();
	
}

function update(){
	timer -= 1;
	if(timer <= 0){
		if(score > score2){
			alert("player one won");
			player1Score++;
			ended = true;
		}
		if(score2 > score){
			alert("player two won");
			ended = true;
			player2Score++;

		}
		if(score == score2){
			alert("No one won it was a tie");
			ended = true;
			
		}
	}
	if(keys[38]){
		//console.log("up");	
		player.y -= speed;
	}
	if(keys[40]){
	//	console.log("down");	
		player.y += speed;
	}
	if(keys[37]){
	//	console.log("left");	
		player.x -= speed;
	}
	if(keys[39]){
	//	console.log("right");	
		player.x += speed;
	}
	
	if(keys[87]){
		//console.log("up");	
		player2.y -= speed;
	}
	if(keys[83]){
	//	console.log("down");	
		player2.y += speed;
	}
	if(keys[65]){
	//	console.log("left");	
		player2.x -= speed;
	}
	if(keys[68]){
	//	console.log("right");	
		player2.x += speed;
	}
	
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
	
	if(collision(player,cube)){
		//console.log("collided");
		//player.x = 10;
		//player.y = 10;
		process();
	}
		if(collision(player2,cube)){
		//console.log("collided");
		//player.x = 10;
		//player.y = 10;
		process2();
	}
	
	
}
function render(){
	context.clearRect(0,0,width,height);
	
	context.fillStyle = "blue";
	context.drawImage(magikarp,player.x,player.y,player.width,player.height);
	context.fillStyle = "red";
	//context.drawImage(player2.)
	context.fillRect(player2.x,player2.y,player2.width,player2.height);
	context.drawImage(img, cube.x, cube.y,cube.width,cube.height);
	//context.fillRect(cube.x,cube.y,cube.width,cube.height);
	context.fillStyle = "black";

	context.font = "bold 30px helvetica";
	context.textAlign="center"; 
	context.fillText("Zelda Ocarina of Dime",width/2,30);
	context.font = "bold 15px helvetica";
	context.textAlign="start"; 

	context.fillText("Player 1 Score: " + score, 10,30);
	context.fillText("Player 2 Score: " + score2, 10,50);
	
	
	context.fillText("Player 1 Games: " + parseInt(player1Score), 10,70);
	context.fillText("Player 2 Games: " + parseInt(player2Score), 10,90);

	context.font = "bold 30px helvetica";

	context.fillText(Math.floor((timer/1000)*30), width - 45,40);

}

function process(){
	score++;
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
},1000/30);
/*setInterval(function(){
	timer--;
},1000/50);*/

//remember history
