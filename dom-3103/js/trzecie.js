let dzien = xd.getDay();
let miesiac = xd.getMonth();
let dni=["Niedziela","Poniedzialek","Wtorek","Sroda","Czwartek","Piatek","Sobota"];
let miesiace = ["Styczen","Luty","Marzec","Kwiecien","Maj","Czerwiec","Lipiec","Sierpien","Wrzenien","Pazdziernik","Listopad","Grudzien"];

//document.getElementById("trzecie").innerHTML=dni[dzien]+" "+(xd.getMonth()+1)+" "+xd.getFullYear();
document.getElementById("trzecie").innerHTML="Dzien: "+dni[dzien]+"<br>Miesiac: "+miesiace[miesiac]+"<br>Rok: "+xd.getFullYear();