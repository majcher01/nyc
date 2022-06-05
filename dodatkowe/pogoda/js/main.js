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

//place
let place = (pogoda.location.name).replace(/"/g,' ')+", "+(pogoda.location.tz_id).replace(/"/g,' ');
document.getElementById("loc").innerHTML=place;


//current
let condtext = (pogoda.current.condition.text).replace(/"/g,' ');
let imgsrc = pogoda.current.condition.icon;
let cloudval = pogoda.current.cloud;
let wiaterpredkosc = pogoda.current.wind_kph;
let wiaterkierunek = (pogoda.current.wind_dir).replace(/"/g,' ');
let cisnienie = pogoda.current.pressure_mb;
let temp = pogoda.current.temp_c;
let tempodcz = pogoda.current.feelslike_c;
let wilgotnosc = pogoda.current.humidity;
let widzialnosc = pogoda.current.vis_km;
let update = (pogoda.current.last_updated).replace(/"/g,' ');

let tresc1 = condtext; 
let curimg = "<img class='curimg' src='https:"+imgsrc+"'>" ;
let chmurki = cloudval;


//forecast1
let iconf1 = pogoda.forecast.forecastday[1].day.condition.icon;
let f1hd = (pogoda.forecast.forecastday[1].day.condition.text).replace(/"/g,' ');
let f1mintemp = pogoda.forecast.forecastday[1].day.mintemp_c;
let f1maxtemp = pogoda.forecast.forecastday[1].day.maxtemp_c;
let f1avgtemp = pogoda.forecast.forecastday[1].day.avgtemp_c;
let f1avgvis = pogoda.forecast.forecastday[1].day.avgvis_km;
let f1avghm = pogoda.forecast.forecastday[1].day.avghumidity;
let f1rain = pogoda.forecast.forecastday[1].day.daily_chance_of_rain;
let f1sunrise = (pogoda.forecast.forecastday[1].astro.sunrise).replace(/"/g,' ');
let f1sunset = (pogoda.forecast.forecastday[1].astro.sunset).replace(/"/g,' ');
let f1date = pogoda.forecast.forecastday[1].date;





//forecast2
let condtext3 = (pogoda.forecast.forecastday[2].day.condition.text).replace(/"/g,' ');
let imgsrc3 = "https:"+pogoda.forecast.forecastday[2].day.condition.icon;
let datefor2 = (pogoda.forecast.forecastday[2].date).replace(/"/g,' ');

let tresc4 = "<img src='"+imgsrc3+"'>";
tresc4 += "<br>"+condtext3+"<br>"+datefor2;

//write to html elements

  //cur
document.getElementById('curimg').innerHTML = curimg;
document.getElementById('currentweather').innerHTML = tresc1;
document.getElementById('currentweather2').innerHTML = chmurki;
document.getElementById('wiaterpredkosc').innerHTML = wiaterpredkosc;
document.getElementById('wiaterkierunek').innerHTML = wiaterkierunek;
document.getElementById('cisnienie').innerHTML = cisnienie;
document.getElementById('temp').innerHTML = temp;
document.getElementById('tempodcz').innerHTML = tempodcz;
document.getElementById('wilgotnosc').innerHTML = wilgotnosc;
document.getElementById('widzialnosc').innerHTML = widzialnosc;
document.getElementById('update').innerHTML = update;

  //f1
document.getElementById('f1ico').innerHTML="<img class='forimg' src='https:"+iconf1+"'>";
document.getElementById('f1hd').innerHTML=f1hd;
document.getElementById('f1mintemp').innerHTML=f1mintemp;
document.getElementById('f1maxtemp').innerHTML=f1maxtemp;
document.getElementById('f1avgtemp').innerHTML=f1avgtemp;
document.getElementById('f1avgvis').innerHTML=f1avgvis;
document.getElementById('f1avghm').innerHTML=f1avghm;
document.getElementById('f1rain').innerHTML=f1rain;
document.getElementById('f1sunrise').innerHTML=f1sunrise;
document.getElementById('f1sunset').innerHTML=f1sunset;
document.getElementById('f1date').innerHTML=f1date;









//document.getElementById('forecast1').innerHTML = tresc3;
//document.getElementById('forecast2').innerHTML = tresc4;
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