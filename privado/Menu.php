<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
font-family: "Lato", sans-serif;
}

.sidenav {
height: 100%;
width: 0;
position: fixed;
z-index: 1;
top: 0;
left: 0;
background-color: #FF461B;
overflow-x: hidden;
transition: 0.5s;
padding-top: 60px;
}

.sidenav a {
padding: 8px 8px 8px 32px;
text-decoration: none;
font-size: 25px;
color: #FBD792;
display: block;
transition: 0.3s;
}

.sidenav a:hover {
color: #81A2FF;
}

.sidenav .closebtn {
position: absolute;
top: 0;
right: 25px;
font-size: 36px;
margin-left: 50px;
}

@media screen and (max-height: 450px) {
.sidenav {padding-top: 15px;}
.sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<a href="#">Materiales</a>
<a href="#">Servicio</a>
<a href="#">Cliente</a>
<a href="#">Nosotros</a>
</div>

<h2>Autopartes</h2>
<p></p>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; menu
</span>

<script>
function openNav() {
document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
document.getElementById("mySidenav").style.width = "0";
}
</script>
  
</body>
</html> 