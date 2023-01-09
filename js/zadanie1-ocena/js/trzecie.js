let produkty=["sok","banan","masło","jogurt"];
let ceny=[10,20,12,23];

document.write("lista produktow <table>");
for(var i=0;i<produkty.length;i++){
    document.write("<tr><td>"+produkty[i]+"</td><td>"+ceny[i]+" zł"+"</td></tr>");
}

document.write("</table>");

var cenyrosnaco=ceny.sort();
document.write("<br>ceny posortowane rosnaco: "+cenyrosnaco.join(", "));

var cenymalejaco=cenyrosnaco.reverse();
document.write("<br>ceny posortowane malejaco: "+cenymalejaco.join(", "));
