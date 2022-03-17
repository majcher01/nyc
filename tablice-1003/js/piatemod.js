
function zad5m(){
    var dlugoscm = prompt("podaj dlugosc");
    var elementym = prompt("podaj elementy (po spacji)");

    let tablicam=elementym.split(" ");
    tablicam.length=dlugoscm;

    document.getElementById("wynik5m").innerHTML=tablicam.join(", ")+"<br><br>"+"dlugosc tablicy: "+tablicam.length;

    for(var i=0;i<tablicam.length;i++){
        tablicam[i]=parseInt(tablicam[i]);

    }

    console.log(tablicam);

    var x=tablicam.sort();

    document.getElementById("wynik5m").innerHTML+="<br><br> Tablica posortowana: "+x.join(", ");

    x.reverse();

    document.getElementById("wynik5m").innerHTML+="<br><br> Tablica posortowana malejaco: "+x.join(", ");





}