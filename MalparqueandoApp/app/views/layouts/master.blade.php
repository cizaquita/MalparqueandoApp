<!DOCTYPE html>
<html lang="en">
  <head>
  <title>@yield('title', '- MalParqueado ')</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">


  <!-- Stylesheets -->
  
  <!-- Font awesome icon -->
  {{ HTML::style('css/sticky-footer-navbar.css', array('media' => 'screen')) }} 
  
  {{ HTML::style('css/reset.css', array('media' => 'screen')) }} 
  {{ HTML::style('css/parqueo.css', array('media' => 'screen')) }}   
  {{ HTML::style('css/estilo.css', array('media' => 'screen')) }}   
  <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/jquery.mobile-1.3.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.mobile.structure-1.3.2.css"/>
<link rel="stylesheet" type="text/css" href="css/parqueo.css"/>
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
	<!--script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script-->  
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
    
<script>  
$(document).ready
(
    function()
    {
 
        var canvas = $('#canvas'),
            cxt = canvas[0].getContext('2d'),
            video = $('#video'),
            video = video[0];
 
        if (navigator.getUserMedia) {
            navigator.getUserMedia(
                { 'video': true },
                function(stream)
                {
                    video.src = stream;
                    video.play();
                }
            );
        } else if (navigator.webkitGetUserMedia) {
            navigator.webkitGetUserMedia
            (
                { 'video': true },
                function(stream)
                {
                    video.src = window.webkitURL.createObjectURL(stream);
                    video.play();
                }
            );
        } else if (navigator.mozGetUserMedia) {
            navigator.mozGetUserMedia
            (
                { 'video': true },
                function(stream)
                {
                    video.mozSrcObject = stream;
                    video.play();
                },
                function(err)
                {
                    alert('A ocurrido un error! '+err);
                }
            );
        }
        $('#photo').click
        (
            function()
            {
                cxt.drawImage(video, 0, 0, 450, 350)
				var canvas = document.getElementById('canvas');
				otro=canvas.toDataURL('image/jpeg')
				this.value=document.getElementById('oculto').value=otro;
				
            }
        );
    }
);
function success(position) {  
 var status = document.querySelector('#status');  
 status.innerHTML = "¡Su ubicación!";  
 
 var mapcanvas = document.createElement('div');  
 mapcanvas.id = 'mapcanvas';  
 mapcanvas.style.height = '12em';  
 mapcanvas.style.width = '100%';  
 
 document.querySelector('#mapa').appendChild(mapcanvas);  
 
 var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);  
 var myOptions = {  
 zoom: 15,  
 center: latlng,  
 mapTypeControl: false,  
 navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},  
 mapTypeId: google.maps.MapTypeId.ROADMAP  
 };  
 var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);  
 
 var marker = new google.maps.Marker({  
 position: latlng,  
 map: map,  
 title:"Usted está aquí."  
 });  
}  
 
function error(msg) {  
 var status = document.getElementById('status');  
 status.innerHTML= "A ocurrido un Error [" + error.code + "]: " + error.message;   
}  
 
if (navigator.geolocation) {  
 navigator.geolocation.getCurrentPosition(success, error,{maximumAge:60000, timeout: 4000});  
} else {  
 error('Actualiza el navegador web para usar el API de localización');  
} 
</script>  
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
       <div data-role="page">
	<div data-role="header" id="head">
    	<div id="h-cont"></div>
    	<div id="h-left"></div>
    	<div id="logo">
        	<img src="img/logo.png" alt=" " />
        </div><!--Logo-->
        <div id="h-right"></div>
    </div><!--Header-->
    <div data-role="content" data-theme="a">
	<p id="status">Buscando su localizaci&oacute;n…</p> 
    	<div id="mapa">
        	<div id="deco"></div>
        </div><!--Mapa-->
		{{Form::open(array('url' => '/registrar','name'=> 'formulario', 'method' => 'put')) }}
        	<p>Ingrese la placa del vehiculo:</p>
            <input type="text" name="placa" id="name" value=""  />
			<input type="hidden" value="" id="oculto" name="imagen" />
        <div id="btn">
            <ul>
                <li><a id="photo" class="botones camara" href="#"></a></li>
                <li><a class="botones check" href="javascript:document.formulario.submit();"></a></li>
            </ul>
			
        </div><!--Btn-->
        <div id="foto">
        	 <video id="video" width="320" height="320" autoplay="autoplay"></video>
        
        <canvas id="canvas" width="300" height="300"></canvas>
            <div id="deco-foto"></div>
        </div><!--Foto-->
        <div id="espacio"></div>
    </div><!--Content-->
    <div data-role="footer">
    	<div id="f-cont"></div>
        <div id="f-right"></div>
    </div><!--Footer-->
</div><!--Page-->
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
<!-- JS -->
{{ HTML::script('http://code.jquery.com/jquery-1.10.2.min.js') }} {{--  jQuery  --}}
{{ HTML::script('js/bootstrap.js') }}  {{--  Bootstrap  --}}
  </body>
</html>