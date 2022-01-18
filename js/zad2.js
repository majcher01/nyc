TablicaJeden = [];  //utworzenie tablicy



function wyczysc(){    //funkcja czyszczaca tablice
    TablicaJeden=[];
    document.getElementById("values").innerHTML = TablicaJeden.join(", ");
    
}

function dodaj()    //funkcja dodajaca elementy do tablicy
{
  var wartosc = document.getElementById("inputText").value;
  if(isNaN(wartosc))            //if sprawdzajacy czy wprowadzona wartosc jest liczba
  {  
    alert('wprowadzona wartosc nie jest liczbą');  
    wartosc="";
    document.getElementById("inputText").value = "";
  }
  else
  {
    TablicaJeden.push(wartosc);
  wartosc= "";
  document.getElementById("inputText").value = "";
  document.getElementById("values").innerHTML = TablicaJeden.join(", ");
  }
  
}

function koniec(){    //funkcja wykonuje sie po zakonczeniu wprowadzania liczb przez uzytkownika
    let check=0;
for(var i=0;i<TablicaJeden.length;i++){
if(TablicaJeden[i]===""){check=1;}
}
                                            //sprawdzenie czy tablica zawiera niezdefiniowane wartosci
if(check==1){
    alert('tablica nie może zawierać niezdefiniowanych wartości');
    window.location.reload();
}else{

var TablicaJedenInt = TablicaJeden.map(function (x) { return parseInt(x, 10); });           //konwersja na typ liczbowy
TablicaJedenInt = TablicaJedenInt.sort(function(a, b){return a - b});   //sortowanie

let min = TablicaJedenInt[0];       //minimum
let max = TablicaJedenInt[(TablicaJedenInt.length - 1)];  //maksimum
let suma=0;
for(i=0;i<TablicaJedenInt.length;i++){suma=suma+TablicaJedenInt[i];}
let avg = suma/TablicaJedenInt.length;                                          //obliczanie sumy
let count =0;
for(i=0;i<TablicaJedenInt.length;i++){
    if(TablicaJedenInt[i]==3){count=count+1;}                   //obliczanie ilosci wystapien liczby 3
}

const median = arr => {
    let middle = Math.floor(arr.length / 2);
      arr = [...arr].sort((a, b) => a - b);                             //funkcja liczaca mediane
    return arr.length % 2 !== 0 ? arr[middle] : (arr[middle - 1] + arr[middle]) / 2;
};
  
let mediana = median(TablicaJedenInt);

let powers=[];

for(var i=0;i<TablicaJedenInt.length;i++){
    powers[i]=(TablicaJedenInt[i]**2);              //petelka podnoszaca tablice do potegi 2
}

let count2=0, count3=0, count1=0;

for(var i=0;i<TablicaJedenInt.length;i++){
    if((TablicaJedenInt[i]%2)==0){
        count2+=1;
    }else{                                      //petelka sprawdzajaca ile jest liczb przystych, nieparzystych i podzielnych przez 3
        count1+=1;
    }
    if((TablicaJedenInt[i]%3)==0){
        count3+=1;
    }
}




//wyswietlenie danych na ekran
document.getElementById('output').innerHTML='najwieksza: '+max+'<br> najmniejsza: '+min+"<br> srednia: "+avg+"<br> ilosc wystapien liczby 3: "+count+"<br> mediana: "+mediana;

if(TablicaJedenInt.length>=3){          //if sprawdzajacy czy jest wystarczajaca ilosc elementow aby policzyc 3 najwieksze i najmniejsze elementy
    document.getElementById('output').innerHTML+='<br> 3 najwieksze elementy: '+TablicaJedenInt[(TablicaJedenInt.length-1)]+' '+TablicaJedenInt[(TablicaJedenInt.length-2)]+' '+TablicaJedenInt[(TablicaJedenInt.length-3)]+'<br> 3 najmniejsze elementy: '+TablicaJedenInt[0]+' '+TablicaJedenInt[1]+' '+TablicaJedenInt[2];
}else{
    document.getElementById('output').innerHTML+="<br> Tablica nie zawiera wystarczająco dużo elementów, aby obliczyć 3 najwieksze i najmniejsze elementy";
}

document.getElementById('output').innerHTML+='<br> tablica podniesiona do kwadratu: <br>'+powers.join(", ")+"<br> liczba parzystych: "+count2+"<br> liczba nieparzystych: "+count1+"<br> liczba podzielnych przez 3: "+count3;

}
}
