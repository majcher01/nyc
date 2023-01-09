let tytul = document.title;
let liczbazdjec = document.images.length;
let liczbaodnosnikow = document.links.length;
let liczbaformularzy = document.forms.length;

document.getElementById("tytul").innerHTML="Tytuł strony: "+tytul;
document.getElementById("zdjecia").innerHTML="Liczba zdjec: "+liczbazdjec;
document.getElementById("odnosniki").innerHTML="Liczba odnosnikow: "+liczbaodnosnikow;
document.getElementById("formularze").innerHTML="Liczba formularzy: "+liczbaformularzy;