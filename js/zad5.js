let tablica = new Array(100);  //utworzenie tablicy
tablica[0]=0, tablica[1]=1;
window.onload=function(){
for (var i=2;i<100;i++){
    tablica[i]=(tablica[i-1]+tablica[i-2]); //wypelnienie tablicy ciagiem fibonnaciego
}
document.getElementById('output6').innerHTML+='ciag fibonacciego:<br>'+tablica.join(', '); //wyswietlenie danych na ekran
for (var i =0;i<tablica.length;i++){
    tablica[i]=Math.pow(2, i);      //znalezienie kolejnych poteg liczby 2
}
document.getElementById('output6').innerHTML+='<br><br>potegi liczby 2:<br>'+tablica.join(', '); //wyswietlenie danych
tablica[0]=3
for(var i=1;i<tablica.length;i++){
    tablica[i]=(tablica[i-1]+3);        //wypelnienie tablicy ciagiem liczb
}
document.getElementById('output6').innerHTML+='<br><br> ciag liczb:<br>'+tablica.join(', '); //wyswietlenie
function isPrime(num) {
    for(var i = 2; i < num; i++)        //funkcja sprawdzajaca czy liczba jest pierwsza
      if(num % i === 0) return false;
    return num > 1;
  }

tablica=[];         //wyczyszczenie tablicy

var i=3;
do{                         //wypenienie tablicy liczbami pierwszymi
    if(isPrime(i)==true){
        tablica.push(i);
    }

    i++
}while(tablica.length<100)
document.getElementById('output6').innerHTML+='<br><br> pierwsze 100 liczb pierwszych:<br>'+tablica.join(', '); //wyswietlenie danych na ekran
  
}


// Jakub Majcherski 2022