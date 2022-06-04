function start(){

  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition, showError);
  } else { 
    alert("Twoja przeglądarka nie wspiera geolokalizacji.");
  }



function showPosition(position) {
  var lat=position.coords.latitude;
  var long=position.coords.longitude;
  var loc = lat+","+long;

  let adrespogoda = "https://api.weatherapi.com/v1/forecast.json?key=27857f76493a4af2b9a205210212012&q="+loc+"&days=7&aqi=yes&alerts=yes&lang=pl";
  
$.getJSON(adrespogoda, function(pogoda){

//current
let condtext = (pogoda.current.condition.text).replace(/"/g,' ');
let imgsrc = pogoda.current.condition.icon;
let cloudval = pogoda.current.cloud;

let tresc1 = condtext + "<img style='margin-left: 40px;' src='https:"+imgsrc+"'>" ;
let tresc2 = "<span style='margin-right: 20px'>Zachmurzenie: </span>"+cloudval+"%";

//forecast1
let condtext2 = (pogoda.forecast.forecastday[1].day.condition.text).replace(/"/g,' ');
let imgsrc2 = pogoda.forecast.forecastday[1].day.condition.icon;
let datefor1 = (pogoda.forecast.forecastday[1].date).replace(/"/g,' ');

let tresc3 = "<img src='"+imgsrc2+"'>";
tresc3 += "<br>"+condtext2+"<br>"+datefor1;

//forecast2
let condtext3 = (pogoda.forecast.forecastday[2].day.condition.text).replace(/"/g,' ');
let imgsrc3 = pogoda.forecast.forecastday[2].day.condition.icon;
let datefor2 = (pogoda.forecast.forecastday[2].date).replace(/"/g,' ');

let tresc4 = "<img src='"+imgsrc3+"'>";
tresc4 += "<br>"+condtext3+"<br>"+datefor2;

//write to html elements
document.getElementById('currentweather').innerHTML = tresc1;
document.getElementById('currentweather2').innerHTML = tresc2;

document.getElementById('forecast1').innerHTML = tresc3;
document.getElementById('forecast2').innerHTML = tresc4;
});








}






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