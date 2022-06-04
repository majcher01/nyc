function start(){
getLocation();
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition, showError);
  } else { 
    alert("Twoja przeglądarka nie wspiera geolokalizacji.");
  }
}

var x;

function showPosition(position, x) {
  
    var lat= position.coords.latitude ; 
    var long= position.coords.longitude;
    //console.log(lat + " "+ long);
    
   var res=lat+","+long;
   x=res;
}

console.log(x);

function showError(error) {
    switch(error.code) {
      case error.PERMISSION_DENIED:
        alert("Do poprawnego działania strony jest wymagana zgoda na lokalizację.");
        window.location.reload(true);
        break;
      case error.POSITION_UNAVAILABLE:
        alert("Informacje o lokalizacji są niedostępne.");
        break;
      case error.UNKNOWN_ERROR:
        x.innerHTML = "Wystąpił nieznany błąd.";
        break;
    }}


 //End of main func   
}