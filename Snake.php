<!DOCTYPE html>
<html lang="en">
<head>

<title>СтепСофт</title>
<link rel="shortcut icon" href="TitlePic1.jpg" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:url"           content="https://www.stepsoft.org/Snake.php" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Софтуерна школа Step Soft" />
<meta property="og:description"   content="Курсове по програмиране на С++ в Силистра" />
<meta property="og:image"         content="http://www.stepsoft.org/public_html/Logo.JPG" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/snakeCss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script> 
</head>
<body onload = "Init()">
<img style = "display: none;" src = "SnakeGame.JPG">	

<?php
	$record= $_COOKIE['scoreJS'];
	
	$saveRecord = "";
	$myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/Score.txt","r");
	$saveRecord = fgets($myfile);
	//echo $saveRecord; echo " "; echo $record;
	fclose($myfile);
	if((int)$record > (int)$saveRecord)
	{
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/Score.txt","wb");
		fwrite($fp,$record);
		fclose($fp);
	}
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/bg_BG/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style = "color:red;">Софтуерна школа Step Soft</a>
    </div>
    <ul class="nav navbar-nav">
      <li id = "listHome"><a href="Home.html" onMouseOver="this.style.backgroundColor='black'" onMouseOut="this.style.backgroundColor=''"><i class="fa fa-home"> Начало</i></a></li>
      <li id = "listTuitions"><a href="Tuitions.html" onMouseOver="this.style.backgroundColor='black'" onMouseOut="this.style.backgroundColor=''"><i class="fas fa-graduation-cap"> Обучения</i></a></li>
      <li id = "listGallery" ><a href="Gallery.html" onMouseOver="this.style.backgroundColor='black'" onMouseOut="this.style.backgroundColor=''"><i class="fa fa-photo"></i> Галерия</i></a></li>
      <li id = "listContacts"><a href="Contacts.php" onMouseOver="this.style.backgroundColor='black'" onMouseOut="this.style.backgroundColor=''"><i class="fas fa-envelope"> Контакти</i></a></li>
	  <li id = "listGames" class="dropdown" style = "background-color: black;"><a class="dropdown-toggle" data-toggle="dropdown" href="" onMouseOver="this.style.backgroundColor='black'" onMouseOut="this.style.backgroundColor=''"><i class='fas fa-gamepad'> Игри</i><span class="caret"></span></a>
		<ul class="dropdown-menu">
		
		
	      <li id = "listGamePic" style = "margin-top:-5px;">
			<div>
				<img id = "gamePic" src="PlayGames.png" alt="BugKillers" width="100" height="50" style = "border-radius: 5px;">
				<img id = "gamePicWb" src="PlayGamesW.png" alt="BugKillers" width="100" height="50" style = "border-radius: 5px;">
			</div>
		  </li>
		  
		  
          <li><a href="Toto5_35.html" onMouseOver="this.style.color='red'" onMouseOut="this.style.color=''">Тото 2</a></li>
          <li><a href="Snake.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color=''">Змията</a></li>
        </ul>
      </li>
	  <li id = "fsShareButton"><div class="fb-share-button" data-href="http://stepsoft.org/Snake.php" data-layout="button_count" data-size="small" data-mobile-iframe="false"><a target="_top" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fstepsoft.org%2FSnake.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Споделяне</a></div>
      <li id = "likeBtn"><div class="fb-like" data-href="http://stepsoft.org/Snake.php" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>	
	</ul>	
  </div>
</nav>

<div class="container-fluid" style = "margin-top:-21px;">
  <div class="row">
    <div class="col-sm-2" style="background-color:lavender border = 0px;"></div>
    <div class="col-sm-8" style="background-color:black;">
	
      <img id="snakeHead" width="20" height="20" src="snake.jpeg" style = "display: none;">
	  <img id="snakeLeft" width="20" height="20" src="snakeLeft.jpg" style = "display: none;">
	  <img id="snakeUp" width="20" height="20" src="snakeUp.jpeg" style = "display: none;">
	  <img id="snakeDown" width="20" height="20" src="snakeDown.jpeg" style = "display: none;">
	  <img id="snakeBody" width="20" height="20" src="SnakeNeck.jpg" style = "display: none;">
	  <img id="Apple" width="20" height="20" src="apple.jpg" style = "display: none;">
	  <img id="fireL" width="20" height="20" src="fireL.jpg" style = "display: none;">
	  <img id="BricksL" width="20" height="20" src="Bricks.JPG" style = "display: none;">
	  
      <div align = "center">
        <p style = "color: white;">Натиснете някой от бутоните(стрелките) за начало на играта.</p>
        <br>
	    <ul style = "list-style-type: none; margin-top: 0px; padding: 0;">
	    	<li style = "display: inline; margin: 20px; color: white;" id = "message" style = "color: white;" >Змията</li>
			<li style = "display: inline; margin: 20px; color: red;"><button onclick = "Pause()">Пауза/Старт</button></li>
			<p id = "newLine" style = "display: none;"></p>
	    	<li style = "display: inline; margin: 20px; color: white;" id = "messageR" style = "color: white;">Резултат: 0</li>
	    	<li style = "display: inline; margin: 20px; color: red;">Рекорд: <?php $myfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/Score.txt","r");
	    											$saveRecord = fgets($myfile);
	    											echo $saveRecord; 
	    										?>
	    	</li>
        
	    </ul>
		<canvas style = "border: 5px solid blue;" id="gc" ></canvas>
		
		<button id = "Up" onclick  = "moveUp()" style = "display: none; color: red; font-size: 40px;">Горе</button><br>
		<button id = "Left" onclick  = "moveLeft()" style = "display: none; color: red; font-size: 40px;">Ляво</button><button style="visibility:hidden;">but</button></button><button id = "Right" onclick  = "moveRight()" style = "display: none; color: red; font-size: 40px;">Дясно</button><br>
		<button id = "Down" onclick  = "moveDown()" style = "display: none; color: red; font-size: 40px;">Долу</button>
		
	</div>
	  
	  <br>
      <p id = "pFinal">2018-2019 Софтуерна школа Step Soft - Силистра</p>
	</div>
    <div class="col-sm-2" style="background-color:lavender border = 0px;"></div>
  </div>
</div>

<script> 

scoreJS = 0;
document.cookie = "scoreJS = " + scoreJS;


function showScore()
{
	document.getElementById("messageR").innerHTML = "Резултат:" + scoreJS;
}

var img = document.getElementById("snakeHead");
var imgLeft = document.getElementById("snakeLeft");
var imgUp = document.getElementById("snakeUp");
var imgDown = document.getElementById("snakeDown");
var imgNeck = document.getElementById("snakeBody");
var imgApple = document.getElementById("Apple");
var imgFireL = document.getElementById("fireL");
var imgBricksL = document.getElementById("BricksL");

function Init() {
	showButtons();
	windowWidth();
    canv=document.getElementById("gc");
    ctx=canv.getContext("2d");
		  window.addEventListener('resize', resizeCanvas, false);
          window.addEventListener('orientationchange', resizeCanvas, false);
          resizeCanvas();
    document.addEventListener("keydown",keyPush);
	
	if(w< 750)
		stop = setInterval(game1,120);
	else
		stop = setInterval(game1,100);
	
	
	
}

var w = $(window).width();

function showButtons()
{
	if(w< 750)
	{
		document.getElementById("Left").style.display = "";
		document.getElementById("Right").style.display = "";
		document.getElementById("Up").style.display = "";
		document.getElementById("Down").style.display = "";
	}
	else{
		document.getElementById("Left").style.display = "none";
		document.getElementById("Right").style.display = "none";
		document.getElementById("Up").style.display = "none";
		document.getElementById("Down").style.display = "none";
	}
}

var w = $(window).width();

function resizeCanvas() {
	
		if(w< 750)
		{
			canv.width = Math.floor(window.innerWidth - (window.innerWidth/10));
			canv.height = Math.floor(window.innerWidth - (window.innerWidth/10));
		}
		else{
			canv.width = Math.floor(window.innerWidth - (window.innerWidth/1.625));
			canv.height = Math.floor(window.innerWidth - (window.innerWidth/1.625));
		}
}

var head = false;
px=py=5;
if(w< 750)
{
	gs= Math.ceil(Math.sqrt(Math.floor(window.innerWidth - (window.innerWidth/10))));
    tc= Math.ceil(Math.sqrt(Math.floor(window.innerWidth - (window.innerWidth/10))));
}
else{
	gs= Math.ceil(Math.sqrt(Math.floor(window.innerWidth - (window.innerWidth/1.625))));
	tc= Math.ceil(Math.sqrt(Math.floor(window.innerWidth - (window.innerWidth/1.625))));
}

ax=9;
ay=9;
xv=yv=0;
trail=[];
tail = 1;
var e = event.keyCode;


function game1() {
    px+=xv;
    py+=yv;
    if(px<0) {
        px= tc-1;
    }
    if(px>tc-1) {
        px= 0;
    }
    if(py<0) {
        py= tc-1;
    }
    if(py>tc-1) {
        py= 0;
    }
    ctx.fillStyle="black";
    ctx.fillRect(0,0,canv.width,canv.height);
    Bricks();
    
    for(var i=0;i<trail.length;i++) {      
		if(!head) {
			ctx.drawImage(img, trail[i].x*gs,trail[i].y*gs,gs+2,gs+2);
			if(w >= 750 && scoreJS >= 50 && (trail[i].x*gs >= 6*gs  && trail[i].x*gs <= 6*gs) && (trail[i].y*gs >=  4*gs && trail[i].y*gs <= (gs-6)*gs)) 
			{
				clearInterval(stop);
				document.cookie = "scoreJS = " + scoreJS;
				var snakedead = "Змията гризна стената и загина!";
				var audio = new Audio('Roar.mp3');
				audio.play();
				document.getElementById("message").innerHTML = snakedead.fontcolor("red");
				setTimeout(function(){ reloadPage(); }, 5000);
				
			}
			if(w >= 750 && scoreJS >= 100 && (trail[i].x*gs >= (gs-7)*gs && trail[i].x*gs <= (gs-7)*gs) && (trail[i].y*gs >=  4*gs && trail[i].y*gs <= (gs-6)*gs))
			{
				clearInterval(stop);
				document.cookie = "scoreJS = " + scoreJS;
				var snakedead = "Змията гризна стената и загина!";
				var audio = new Audio('Roar.mp3');
				audio.play();
				document.getElementById("message").innerHTML = snakedead.fontcolor("red");
				setTimeout(function(){ reloadPage(); }, 5000);
				
			}
			if(w < 750 && scoreJS >= 50 && (trail[i].x*gs >= 5*gs && trail[i].x*gs <= 5*gs ) && (trail[i].y*gs >=  4*gs && trail[i].y*gs <= canv.width-4*gs))
			{
				clearInterval(stop);
				document.cookie = "scoreJS = " + scoreJS;
				var snakedead = "Змията гризна стената и загина!";
				var audio = new Audio('Roar.mp3');
				audio.play();
				document.getElementById("message").innerHTML = snakedead.fontcolor("red");
				setTimeout(function(){ reloadPage(); }, 5000);
				
			}
			if(w < 750 && scoreJS >= 100 && (trail[i].x*gs >= (gs-6)*gs && trail[i].x*gs <= (gs-6)*gs ) && (trail[i].y*gs >= Math.floor(canv.width/5.29) && trail[i].y*gs <= Math.ceil(canv.width/1.259)))
			{
				clearInterval(stop);
				document.cookie = "scoreJS = " + scoreJS;
				var snakedead = "Змията гризна стената и загина!";
				var audio = new Audio('Roar.mp3');
				audio.play();
				document.getElementById("message").innerHTML = snakedead.fontcolor("red");
				setTimeout(function(){ reloadPage(); }, 5000);
				
			}
			switch(e)
			{
				case 37: ctx.drawImage(imgLeft, trail[i].x*gs,trail[i].y*gs,gs+2,gs+2);
					window.addEventListener("keydown", keydown, false);
					window.addEventListener("keyup", keyup, false);
					function keydown(event) {
						if(event.keyCode == 32){ 
							ctx.drawImage(imgFireL, (trail[i].x-1)*gs, trail[i].y*gs,gs+4,gs+4);
						}
					}
					function keyup(event) {
						if(event.keyCode == 32){ 
						}
					}
				break;
				case 39: ctx.drawImage(img, trail[i].x*gs,trail[i].y*gs,gs+2,gs+2); break;
				case 38: ctx.drawImage(imgUp, trail[i].x*gs,trail[i].y*gs,gs+2,gs+2); break;
				case 40: ctx.drawImage(imgDown, trail[i].x*gs,trail[i].y*gs,gs+2,gs+2); break;
			
			}
			head = true;
		}
		else 
		{
			ctx.drawImage(imgNeck, trail[i].x*gs,trail[i].y*gs,gs,gs);
			if(trail[i].x==px && trail[i].y==py) 
			{
				clearInterval(stop);
				document.cookie = "scoreJS = " + scoreJS;
				var snakedead = "Змията извърши самоубийство!";
				var audio = new Audio('Roar.mp3');
				audio.play();
				document.getElementById("message").innerHTML = snakedead.fontcolor("red");
				setTimeout(function(){ reloadPage(); }, 5000);
				
			}
			
        }
		
    }
	head = false;
    trail.unshift({x:px,y:py});
    while(trail.length>tail) {
    trail.pop();
    }
    
    if (right && px == ax + 1 && py == ay ||
        left && px == ax - 1 && py == ay ||
        down && px == ax && py == ay + 1 ||
        up && px == ax && py == ay - 1) {
        tail++;
		scoreJS = scoreJS + 10;
		
		showScore();
		ax=Math.floor(Math.random()*tc);
		ay=Math.floor(Math.random()*tc);
		if(ax == 0 || ax >= tc-2) ax = tc-2;
		if(ay == 0 || ay >= tc-2) ay = tc-2;
		if(w >= 750 && scoreJS >= 50 && (ax >= 6  && ax <= 6 || ax >= gs-7  && ax <= gs-7) && (ay >=  4 && ay <= gs-4)) 
		{
			ax = 2; ay = 2;
		}
		if(w < 750 && scoreJS >= 50 && (ax >= 5  && ax <= 5 || ax >= gs-6  && ax <= gs-6) && (ay >=  3 && ay <= gs-3)) 
		{
			ax = 2; ay = 2;
		}
        
    }
    
	ctx.drawImage(imgApple, ax*gs,ay*gs,gs,gs);
	
}

function Bricks1(){
	if(scoreJS >= 50)
		ctx.drawImage(imgBricksL, 140, 120, 20, 300);
	if(scoreJS >= 100)
		ctx.drawImage(imgBricksL, 350, 120, 20, 300);
}

function Bricks(){
	if(w >= 750)
	{	if(scoreJS >= 50) ctx.drawImage(imgBricksL, 6*gs, 5*gs, canv.width/26.45, canv.width/1.763);
	
		if(scoreJS >= 100) ctx.drawImage(imgBricksL, (gs-7)*gs, 5*gs, canv.width/26.45, canv.width/1.763);
	}
	if(w < 750)
	{
	    if(scoreJS >= 50) ctx.drawImage(imgBricksL, 5*gs, 4*gs, canv.width/26.45, canv.width/1.763);
	    
	    if(scoreJS >= 100) ctx.drawImage(imgBricksL, (gs-6)*gs, 4*gs, canv.width/26.45, canv.width/1.763);
	}
}

var left = false; 
var right = false;
var up = false;
var down = false;

function reloadPage() {
    location.reload();
}

function moveLeft() {
    if(!right) {xv=-1;yv=0; e = 37; left = true; right = false; up = false; down = false;}
}

function moveUp() {
    if(!down) {xv=0;yv=-1; e = 38; up = true; left = false; right = false;}
}

function moveRight() {
    if(!left) {xv=1;yv=0; e = 39; right = true; left = false; up = false; down = false;}
}

function moveDown() {
   if(!up) {xv=0;yv=1; e = 40; down = true; left = false; right = false;}
}

function keyPush(evt) {
    switch(evt.keyCode) {
        case 37:
            if(!right) {xv=-1;yv=0; e = 37; left = true; right = false; up = false; down = false;}
            break;
        case 38:
			evt.preventDefault();
            if(!down) {xv=0;yv=-1; e = 38; up = true; left = false; right = false;}
            break;
        case 39:
            if(!left) {xv=1;yv=0; e = 39; right = true; left = false; up = false; down = false;}
            break;
        case 40:
			evt.preventDefault();
            if(!up) {xv=0;yv=1; e = 40; down = true; left = false; right = false;}
            break;
    }
}


function listBorder() {
  var w = $(window).width();
   
  if(w > 750) {
    document.getElementById("listHome").style.borderLeft = "1px solid #bbb";
	document.getElementById("listHome").style.borderRight = "1px solid #bbb";
	document.getElementById("listTuitions").style.borderRight = "1px solid #bbb";
	document.getElementById("listGallery").style.borderRight = "1px solid #bbb";
	document.getElementById("listContacts").style.borderRight = "1px solid #bbb";
	document.getElementById("listGames").style.borderRight = "1px solid #bbb";
	document.getElementById("gamePic").style.display = "none";
	document.getElementById("gamePicWb").style.display = "block";
	document.getElementById("listGamePic").style.backgroundColor = "white";
	document.getElementById("newLine").style.display = "none";
	
	document.getElementById("listHome").style.borderTop = "0px";
	document.getElementById("listHome").style.borderBottom = "0px";
	document.getElementById("listHome").style.borderBottom = "0px";
	document.getElementById("listTuitions").style.borderBottom = "0px";
	document.getElementById("listGallery").style.borderBottom = "0px";
	document.getElementById("listContacts").style.borderBottom = "0px";
	document.getElementById("listGames").style.borderBottom = "0px";
  }
else {
    document.getElementById("listHome").style.borderLeft = "0px";
	document.getElementById("listHome").style.borderRight = "0px";
	document.getElementById("listTuitions").style.borderRight = "0px";
	document.getElementById("listGallery").style.borderRight = "0px";
	document.getElementById("listContacts").style.borderRight = "0px";
	document.getElementById("listGames").style.borderRight = "0px";
	document.getElementById("gamePic").style.display = "block";
	document.getElementById("gamePicWb").style.display = "none";
	document.getElementById("listGamePic").style.backgroundColor = "black";
	document.getElementById("newLine").style.display = "";
	
	document.getElementById("listHome").style.borderTop = "1px solid #bbb";
	document.getElementById("listHome").style.borderBottom = "1px solid #bbb";
	document.getElementById("listHome").style.borderBottom = "1px solid #bbb";
	document.getElementById("listTuitions").style.borderBottom = "1px solid #bbb";
	document.getElementById("listGallery").style.borderBottom = "1px solid #bbb";
	document.getElementById("listContacts").style.borderBottom = "1px solid #bbb";
	document.getElementById("listGames").style.borderBottom = "1px solid #bbb";
  }  
}

function responsiveH() {
  var w = $(window).width();
  if(w < 750) {
    $(document).ready(function(){
        $("h2").css("font-size", "22px");
    });
  }
  else {
    $(document).ready(function(){
        $("h2").css("font-size", "");
    });
  }
}	
 
$(window).resize(function(){
	showButtons();
    windowWidth();
});

function ChangeButtonPosition() {
  document.getElementById("fsShareButton").style.margin = "15px 0px 0px 100px";
  document.getElementById("likeBtn").style.margin = "15px 0px 0px 30px";
 }
 
function returnDefaultButtonPosition() {
  document.getElementById("fsShareButton").style.margin = "15px 0px 0px 15px";
  document.getElementById("likeBtn").style.margin = "15px 0px 0px 15px";
  
}

function windowWidth(){
  var w = $(window).width();
  listBorder();
  responsiveH();
  if(w < 750) {
    ChangePosition();
	returnDefaultButtonPosition();
  } else {
      ChangeButtonPosition();
  } 
}
function ChangePosition() {
  document.getElementById("pFinal").style.margin = "60px 0px 0px 0px";
  
}
var playPause = false;
function Pause()
{
	if(!playPause)
	{	
		clearInterval(stop);
		playPause = true;
	}
	else
	{
		stop = setInterval(game1,100);
		playPause = false;
	}
}

</script>
</body>

</html>
