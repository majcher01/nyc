
function funkcja1(){
    var dlugosc = prompt("podaj dlugosc");
    var elementy = prompt("podaj elementy (po spacji)");

    let tablica=elementy.split(" ");
    tablica.length=dlugosc;

    document.getElementById("drugie").innerHTML=tablica.join(", ")+"<br><br>"+"dlugosc tablicy: "+tablica.length;


}