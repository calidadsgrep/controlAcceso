<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--====================================================================================================================================-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<!--====================================================================================================================================-->
	<link rel="stylesheet" href="css/style.css">
<!--====================================================================================================================================-->
	<title>Inicio de Sesion</title>
</head>

<?php 
session_start();
session_destroy();
?>
<br><br>
<body>
<div class="container"><br><br>
 	<div class="row">
    	<div class="col-md-6 d1">
            <img src="View\img\logo\censig.png" class="Avatar" width="400" height="400" >
        </div>
        <div class="col-md-5 formulario">        
    	<form  action="indexes.php?c=seguridad&a=Autenticacion" class="login100-form validate-form" method=post action=>
    		 <br> <br> <br>
         <p><a href="">INICIO DE SESIÓN
        </a>
        </p>
        <?php 
        if (isset($_REQUEST['error'])) {
          echo  '<div class="alert alert-warning">El usuario o clave estan equivocados, trata de nuevo </div>';
        }
        if (isset($_REQUEST['expire'])) {
          echo  '<div class="alert alert-warning">LA SESION EXPIRO</div>';
        }
        if (isset($_REQUEST['salir'])) {
          echo  '<div class="alert alert-warning">Ingrese sus datos para ingresar de nuevo</div>';
        }        
        ?>
				
					<div class="col-md-12">
						<i class="fa fa-users"></i>
						<label for="">Usuario</label>
						<input type="text" name="username" class="form-control" placeholder="Usuario" required>
						<br></div>
                        <div class="col-md-12">
						<i class="fa fa-key"></i>
						<label for="">Contraseña</label>
						<input type="password" name="password" class="form-control" placeholder="Contraseña" required>
					</div>
					<br>
                    <div class="frame">
                    <button class=" custom-btn btn-12"><span>Entrar</span><span>Click!</span></button>
                    </div>
		</form>
		</div>
 	</div>
 			<!--<div class="panel-footer" style="text-align: center;">|CENSIG | 2022 |</div>-->
 	<br> 
</div> 

								
<!--====================================FOOOOOOOOTER==============================================-->
<!--<footer class="page-footer font-small green"><a href="https://www.tonygabriel.ga/" class="btn btn-info btn-sm" target="_blank">Soporte</a>
                                     Copyright -->
    <!--<div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://www.tonygabriel.ga/" target="_blank">Gabriel Ramírez | Diseño Web |</a><footer>Desarrollado por: <a href="mailto:togarar98@gmail.com">Gabriel Ramirez</a></footer>
    </div>
                                     Fin de Copyright 
</footer>-->
<!--==============================FINDE FOOOTER==============================================-->


<!--====================================================================================================================================-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!--====================================================================================================================================-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!--====================================================================================================================================-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>


<style>
    body{
	font-family: Roboto,Arial, Helvetica, sans-serif;
	box-sizing: content-box;
}
.container{
	background-color: #023e8a;
	border-radius: 5px; 
    box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);  
   
}

.Avatar{
	border-radius: 500px;
	border: 20px solid #f9c74f;
	background-color: #457;
    box-shadow: 2px 2px 5px #999;    
}

h3 {
     font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
     color: #f5f5f5;
}
.formulario{
    text-align: center;
    background-color: 0096c7;
	border-radius: 9px;
    display: flex ;
    justify-content: center;
   
}



body {
  position: relative;
  background-color: #0f222b;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

body,
html {
	height: 100%;
	margin: 0;
	padding: 0;
	font-family: 'Helvetica', sans-serif;
	background: rgb(26, 188, 156);
	background: -moz-linear-gradient(-45deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
	background: -webkit-linear-gradient(-45deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
	background: linear-gradient(135deg, rgba(26, 188, 156, 1) 0%, rgba(142, 68, 173, 1) 100%);
}

h1 {
	font-size: 24px;
	margin: 10px 0 0 0;
	font-weight: lighter;
	text-transform: uppercase;
	color: #eeeeee;
}

p {
	font-size: 12px;
	font-weight: light;
	color: #333333;
}

span a {
	font-size: 18px;
	color: #cccccc;
	text-decoration: none;
	margin: 0 10px;
	transition: all 0.4s ease-in-out;

}

@keyframes float {
	0% {
		box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
		transform: translatey(0px);
	}
	50% {
		box-shadow: 0 25px 15px 0px rgba(0,0,0,0.2);
		transform: translatey(-20px);
	}
	100% {
		box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
		transform: translatey(0px);
	}
}


.d1{
    display: flex ;
    justify-content: center;
}

.avatar {
	width: 400px;
	height: 400px;
	box-sizing: border-box;
	border: 5px white solid;
	border-radius: 50%;
	overflow: hidden;
	box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
	transform: translatey(0px);
	animation: float 6s ease-in-out infinite;
}


.frame {
  width: 90%;
  margin: 40px auto;
  text-align: center;
}
button {
  margin: 20px;
}
.custom-btn {
  width: 130px;
  height: 40px;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}
/* 12 */
.btn-12{
  position: relative;
  right: 20px;
  bottom: 20px;
  border:none;
  box-shadow: none;
  width: 130px;
  height: 40px;
  line-height: 42px;
  -webkit-perspective: 230px;
  perspective: 230px;
}
.btn-12 span {
  background: rgb(0,172,238);
  background: linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%);
  display: block;
  position: absolute;
  width: 130px;
  height: 40px;
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  border-radius: 5px;
  margin:0;
  text-align: center;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all .3s;
  transition: all .3s;
}
.btn-12 span:nth-child(1) {
  box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001;
  -webkit-transform: rotateX(90deg);
  -moz-transform: rotateX(90deg);
  transform: rotateX(90deg);
  -webkit-transform-origin: 50% 50% -20px;
  -moz-transform-origin: 50% 50% -20px;
  transform-origin: 50% 50% -20px;
}
.btn-12 span:nth-child(2) {
  -webkit-transform: rotateX(0deg);
  -moz-transform: rotateX(0deg);
  transform: rotateX(0deg);
  -webkit-transform-origin: 50% 50% -20px;
  -moz-transform-origin: 50% 50% -20px;
  transform-origin: 50% 50% -20px;
}
.btn-12:hover span:nth-child(1) {
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  -webkit-transform: rotateX(0deg);
  -moz-transform: rotateX(0deg);
  transform: rotateX(0deg);
}
.btn-12:hover span:nth-child(2) {
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
 color: transparent;
  -webkit-transform: rotateX(-90deg);
  -moz-transform: rotateX(-90deg);
  transform: rotateX(-90deg);
}



/*setup*/
*{
  margin: 0;
  padding: 0;
}

@font-face {
  font-family: 'Monoton';
  font-style: normal;
  font-weight: 400;
  src: local('Monoton'), local('Monoton-Regular'), url(http://themes.googleusercontent.com/static/fonts/monoton/v4/AKI-lyzyNHXByGHeOcds_w.woff) format('woff');
}

@font-face {
  font-family: 'Iceland';
  font-style: normal;
  font-weight: 400;
  src: local('Iceland'), local('Iceland-Regular'), url(http://themes.googleusercontent.com/static/fonts/iceland/v3/F6LYTZLHrG9BNYXRjU7RSw.woff) format('woff');
}

@font-face {
  font-family: 'Pacifico';
  font-style: normal;
  font-weight: 400;
  src: local('Pacifico Regular'), local('Pacifico-Regular'), url(http://themes.googleusercontent.com/static/fonts/pacifico/v5/yunJt0R8tCvMyj_V4xSjafesZW2xOQ-xsNqO47m55DA.woff) format('woff');
}

@font-face {
  font-family: 'PressStart';
  font-style: normal;
  font-weight: 400;
  src: local('Press Start 2P'), local('PressStart2P-Regular'), url(http://themes.googleusercontent.com/static/fonts/pressstart2p/v2/8Lg6LX8-ntOHUQnvQ0E7o3dD2UuwsmbX3BOp4SL_VwM.woff) format('woff');
}

@font-face {
  font-family: 'Audiowide';
  font-style: normal;
  font-weight: 400;
  src: local('Audiowide'), local('Audiowide-Regular'), url(http://themes.googleusercontent.com/static/fonts/audiowide/v2/8XtYtNKEyyZh481XVWfVOj8E0i7KZn-EPnyo3HZu7kw.woff) format('woff');
}

@font-face {
  font-family: 'Ubuntu', sans-serif;
  font-style: normal;
  font-weight: 400;
  src: local('Vampiro One'), local('VampiroOne-Regular'), url(http://themes.googleusercontent.com/static/fonts/vampiroone/v3/Ho2Xld8UbQyBA8XLxF1_NYbN6UDyHWBl620a-IRfuBk.woff) format('woff');

 }


/*neeeeoooon*/
p{
  text-align:center;
  font-size:1.5em;
  margin:20px 0 20px 0; 
  font-family: 'Ubuntu', sans-serif;
  
}

a{
  text-decoration:none; 
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  transition: all 0.5s;
}

p:nth-child(1) a{
  color:#FF1177;
  font-family:Monoton;
}
p:nth-child(1) a:hover{
  -webkit-animation: neon1 1.5s ease-in-out infinite alternate;
  -moz-animation: neon1 1.5s ease-in-out infinite alternate;
  animation: neon1 1.5s ease-in-out infinite alternate; 
}

p:nth-child(2) a{
  font-size:1.5em;
  color:#228DFF;
  font-family:Iceland;
}
p:nth-child(2) a:hover{
  -webkit-animation: neon2 1.5s ease-in-out infinite alternate;
  -moz-animation: neon2 1.5s ease-in-out infinite alternate;
  animation: neon2 1.5s ease-in-out infinite alternate;
}

p:nth-child(3) a{
  color:#FFDD1B;
  font-family:Pacifico;
}
p:nth-child(3) a:hover{ 
  -webkit-animation: neon3 1.5s ease-in-out infinite alternate;
  -moz-animation: neon3 1.5s ease-in-out infinite alternate;
  animation: neon3 1.5s ease-in-out infinite alternate; 
}

p:nth-child(4) a{
  color:#f5f5f5;
  font-family:Ubuntu;
  font-size:0.8em;
}
p:nth-child(4) a:hover{
  -webkit-animation: neon4 1.5s ease-in-out infinite alternate;
  -moz-animation: neon4 1.5s ease-in-out infinite alternate;
  animation: neon4 1.5s ease-in-out infinite alternate;
}

p:nth-child(5) a{
  color:#FF9900;
  font-family:Audiowide;
}
p:nth-child(5) a:hover{
  -webkit-animation: neon5 1.5s ease-in-out infinite alternate;
  -moz-animation: neon5 1.5s ease-in-out infinite alternate;
  animation: neon5 1.5s ease-in-out infinite alternate; 
}

p:nth-child(6) a{
  color:#BA01FF;
  font-family:Vampiro One;
}
p:nth-child(6) a:hover{
  -webkit-animation: neon6 1.5s ease-in-out infinite alternate;
  -moz-animation: neon6 1.5s ease-in-out infinite alternate;
  animation: neon6 1.5s ease-in-out infinite alternate;
}

p a:hover{
color:#ffffff;  
}



/*glow for webkit*/
@-webkit-keyframes neon1 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #FF1177,
               0 0 70px  #FF1177,
               0 0 80px  #FF1177,
               0 0 100px #FF1177,
               0 0 150px #FF1177;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #FF1177,
               0 0 35px #FF1177,
               0 0 40px #FF1177,
               0 0 50px #FF1177,
               0 0 75px #FF1177;
  }
}

@-webkit-keyframes neon2 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #228DFF,
               0 0 70px  #228DFF,
               0 0 80px  #228DFF,
               0 0 100px #228DFF,
               0 0 150px #228DFF;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #228DFF,
               0 0 35px #228DFF,
               0 0 40px #228DFF,
               0 0 50px #228DFF,
               0 0 75px #228DFF;
  }
}

@-webkit-keyframes neon3 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #FFDD1B,
               0 0 70px  #FFDD1B,
               0 0 80px  #FFDD1B,
               0 0 100px #FFDD1B,
               0 0 150px #FFDD1B;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #FFDD1B,
               0 0 35px #FFDD1B,
               0 0 40px #FFDD1B,
               0 0 50px #FFDD1B,
               0 0 75px #FFDD1B;
  }
}

@-webkit-keyframes neon4 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #B6FF00,
               0 0 70px  #B6FF00,
               0 0 80px  #B6FF00,
               0 0 100px #B6FF00,
               0 0 150px #B6FF00;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #B6FF00,
               0 0 35px #B6FF00,
               0 0 40px #B6FF00,
               0 0 50px #B6FF00,
               0 0 75px #B6FF00;
  }
}

@-webkit-keyframes neon5 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #FF9900,
               0 0 70px  #FF9900,
               0 0 80px  #FF9900,
               0 0 100px #FF9900,
               0 0 150px #FF9900;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #FF9900,
               0 0 35px #FF9900,
               0 0 40px #FF9900,
               0 0 50px #FF9900,
               0 0 75px #FF9900;
  }
}

@-webkit-keyframes neon6 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px #fff,
               0 0 30px #fff,
               0 0 40px #ff00de,
               0 0 70px #ff00de,
               0 0 80px #ff00de,
               0 0 100px #ff00de,
               0 0 150px #ff00de;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #ff00de,
               0 0 35px #ff00de,
               0 0 40px #ff00de,
               0 0 50px #ff00de,
               0 0 75px #ff00de;
  }
}

/*glow for mozilla*/
@-moz-keyframes neon1 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #FF1177,
               0 0 70px  #FF1177,
               0 0 80px  #FF1177,
               0 0 100px #FF1177,
               0 0 150px #FF1177;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #FF1177,
               0 0 35px #FF1177,
               0 0 40px #FF1177,
               0 0 50px #FF1177,
               0 0 75px #FF1177;
  }
}

@-moz-keyframes neon2 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #228DFF,
               0 0 70px  #228DFF,
               0 0 80px  #228DFF,
               0 0 100px #228DFF,
               0 0 150px #228DFF;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #228DFF,
               0 0 35px #228DFF,
               0 0 40px #228DFF,
               0 0 50px #228DFF,
               0 0 75px #228DFF;
  }
}

@-moz-keyframes neon3 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #FFDD1B,
               0 0 70px  #FFDD1B,
               0 0 80px  #FFDD1B,
               0 0 100px #FFDD1B,
               0 0 150px #FFDD1B;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #FFDD1B,
               0 0 35px #FFDD1B,
               0 0 40px #FFDD1B,
               0 0 50px #FFDD1B,
               0 0 75px #FFDD1B;
  }
}

@-moz-keyframes neon4 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #B6FF00,
               0 0 70px  #B6FF00,
               0 0 80px  #B6FF00,
               0 0 100px #B6FF00,
               0 0 150px #B6FF00;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #B6FF00,
               0 0 35px #B6FF00,
               0 0 40px #B6FF00,
               0 0 50px #B6FF00,
               0 0 75px #B6FF00;
  }
}

@-moz-keyframes neon5 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #FF9900,
               0 0 70px  #FF9900,
               0 0 80px  #FF9900,
               0 0 100px #FF9900,
               0 0 150px #FF9900;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #FF9900,
               0 0 35px #FF9900,
               0 0 40px #FF9900,
               0 0 50px #FF9900,
               0 0 75px #FF9900;
  }
}

@-moz-keyframes neon6 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px #fff,
               0 0 30px #fff,
               0 0 40px #ff00de,
               0 0 70px #ff00de,
               0 0 80px #ff00de,
               0 0 100px #ff00de,
               0 0 150px #ff00de;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #ff00de,
               0 0 35px #ff00de,
               0 0 40px #ff00de,
               0 0 50px #ff00de,
               0 0 75px #ff00de;
  }
}

/*glow*/
@keyframes neon1 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #FF1177,
               0 0 70px  #FF1177,
               0 0 80px  #FF1177,
               0 0 100px #FF1177,
               0 0 150px #FF1177;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #FF1177,
               0 0 35px #FF1177,
               0 0 40px #FF1177,
               0 0 50px #FF1177,
               0 0 75px #FF1177;
  }
}

@keyframes neon2 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #228DFF,
               0 0 70px  #228DFF,
               0 0 80px  #228DFF,
               0 0 100px #228DFF,
               0 0 150px #228DFF;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #228DFF,
               0 0 35px #228DFF,
               0 0 40px #228DFF,
               0 0 50px #228DFF,
               0 0 75px #228DFF;
  }
}

@keyframes neon3 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #FFDD1B,
               0 0 70px  #FFDD1B,
               0 0 80px  #FFDD1B,
               0 0 100px #FFDD1B,
               0 0 150px #FFDD1B;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #FFDD1B,
               0 0 35px #FFDD1B,
               0 0 40px #FFDD1B,
               0 0 50px #FFDD1B,
               0 0 75px #FFDD1B;
  }
}

@keyframes neon4 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #B6FF00,
               0 0 70px  #B6FF00,
               0 0 80px  #B6FF00,
               0 0 100px #B6FF00,
               0 0 150px #B6FF00;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #B6FF00,
               0 0 35px #B6FF00,
               0 0 40px #B6FF00,
               0 0 50px #B6FF00,
               0 0 75px #B6FF00;
  }
}

@keyframes neon5 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px  #fff,
               0 0 30px  #fff,
               0 0 40px  #FF9900,
               0 0 70px  #FF9900,
               0 0 80px  #FF9900,
               0 0 100px #FF9900,
               0 0 150px #FF9900;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #FF9900,
               0 0 35px #FF9900,
               0 0 40px #FF9900,
               0 0 50px #FF9900,
               0 0 75px #FF9900;
  }
}

@keyframes neon6 {
  from {
    text-shadow: 0 0 10px #fff,
               0 0 20px #fff,
               0 0 30px #fff,
               0 0 40px #ff00de,
               0 0 70px #ff00de,
               0 0 80px #ff00de,
               0 0 100px #ff00de,
               0 0 150px #ff00de;
  }
  to {
    text-shadow: 0 0 5px #fff,
               0 0 10px #fff,
               0 0 15px #fff,
               0 0 20px #ff00de,
               0 0 35px #ff00de,
               0 0 40px #ff00de,
               0 0 50px #ff00de,
               0 0 75px #ff00de;
  }
}


/*REEEEEEEEEEESPONSIVE*/
@media (max-width: 650px) {
  
  #container{
    width: 100%;
  }
  
  p{
    font-size:3.5em;
    font-family: 'Ubuntu', sans-serif;
  }

}
</style>    

