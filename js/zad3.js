TablicaDwa = [];  //utworzenie tablicy

var input = document.getElementById("inputText2");      // oblsuga zatwierdzania enterem
input.addEventListener("keyup", function(event) {       // oblsuga zatwierdzania enterem
  if (event.keyCode === 13) {                           // oblsuga zatwierdzania enterem
   event.preventDefault();                              // oblsuga zatwierdzania enterem
   dodaj2();                                            // oblsuga zatwierdzania enterem
  }                                                     // oblsuga zatwierdzania enterem
});                                                     // oblsuga zatwierdzania enterem

function wyczysc2(){    //funkcja czyszczaca tablice
    TablicaDwa=[];
    document.getElementById("values2").innerHTML = TablicaDwa.join(", ");
    document.getElementById('output2').innerHTML="";
    
}

function dodaj2()    //funkcja dodajaca elementy do tablicy
{
  var wartosc2 = document.getElementById("inputText2").value;
  if(isNaN(wartosc2))            //if sprawdzajacy czy wprowadzona wartosc jest liczba
  {  
    TablicaDwa.push(wartosc2);
    wartosc2= "";
    document.getElementById("inputText2").value = "";
    document.getElementById("values2").innerHTML = TablicaDwa.join(", ");
  }
  else
  {
   
  alert('wprowadzona wartosc nie jest litera');  
    wartosc2="";
    document.getElementById("inputText2").value = "";
  }
  
}


function koniec2(){

    if(TablicaDwa.length<10){
        alert('za malo liter');
        window.location.reload();
    }else{
        document.getElementById('output2').innerHTML+='Litery z odwroconym rozmiarem: <br>';
        for(var i=0;i<TablicaDwa.length;i++){
            if(TablicaDwa[i]==TablicaDwa[i].toUpperCase()){
                TablicaDwa[i]=TablicaDwa[i].toLowerCase();
            }else if(TablicaDwa[i]==TablicaDwa[i].toLowerCase()){
                TablicaDwa[i]=TablicaDwa[i].toUpperCase();
            }
            document.getElementById('output2').innerHTML+=TablicaDwa[i]+' ';
        }

        var wymieszane = TablicaDwa.sort((a, b) => 0.5 - Math.random());
        for(var i=0;i<TablicaDwa.length;i++){TablicaDwa[i]=TablicaDwa[i].toLowerCase();}
        document.getElementById('output2').innerHTML+='<br> Tablica w losowej kolejności: <br>'+TablicaDwa.join(", ");
    }
}


// Jakub Majcherski 2022