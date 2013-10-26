// JavaScript Document

var pictureSource;   // Origen de la imagen
var destinationType; // Formato del valor retornado

// Espera a que PhoneGap conecte con el dispositivo.
//
document.addEventListener("deviceready",onDeviceReady,false);

// PhoneGap esta listo para usarse!
//
function onDeviceReady() {
	pictureSource=navigator.camera.PictureSourceType;
	destinationType=navigator.camera.DestinationType;
}

// Llamada cuando la foto se retorna sin problemas
//
function onPhotoDataSuccess(imageData) {
  // Descomenta esta linea para ver la imagen codificada en base64
  console.log(imageData);

  // Obtiene el elemento HTML de la imagen
  //
  var smallImage = document.getElementById('smallImage');

  // Revela el elemento de la imagen
  //
  smallImage.style.display = 'block';

  // Muestra la foto capturada
  // Se usan reglas CSS para dimensionar la imagen
  //
  smallImage.src = "data:image/jpeg;base64," + imageData;
}

// Llamada cuando la foto se retorna sin problemas
//
function onPhotoURISuccess(imageURI) {
  // Descomenta esta linea para ver la ruta URI al fichero de imagen 
  // console.log(imageURI);

  // Obtiene el elemento HTML de la imagen
  //
  var largeImage = document.getElementById('largeImage');

  // Revela el elemento de la imagen
  //
  largeImage.style.display = 'block';

  // Muestra la foto capturada
  // Se usan reglas CSS para dimensionar la imagen
  //
  largeImage.src = imageURI;
}

// Un botón llamara a esta función
//
function capturePhoto() {
  // Toma la imagen y la retorna como una string codificada en base64
  
  navigator.camera.getPicture(onPhotoDataSuccess, onFail, { quality: 50 });
}

// Un botón llamara a esta función
//
function capturePhotoEdit() {
  // Toma la imagen, permite editarla y la retorna como una string codificada en base64
  navigator.camera.getPicture(onPhotoDataSuccess, onFail, { quality: 20, allowEdit: true }); 
}

// Un botón llamara a esta función
//
function getPhoto(source) {
  // Retorna la ruta del fichero de imagen desde el origen especificado
  navigator.camera.getPicture(onPhotoURISuccess, onFail, { quality: 50, 
	destinationType: destinationType.FILE_URI,
	sourceType: source });
}

// Llamado cuando algo malo ocurre
// 
function onFail(message) {
  alert('Ocurrió un error: ' + message);
}