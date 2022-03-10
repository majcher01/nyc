
function zad5(){
    var dlugosc = prompt("podaj dlugosc");
    var elementy = prompt("podaj elementy (po spacji)");

    let tablica=elementy.split(" ");
    tablica.length=dlugosc;

    document.getElementById("wynik5").innerHTML=tablica.join(", ")+"<br>"+"dlugosc tablicy: "+tablica.length;


}