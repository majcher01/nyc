var tab1 = [7,3,1,6,9,5,4,10,2,2]; //utworzenie tab1

document.write(tab1[4]+"<br>"); //wyswietlenie 5tej komorki
tab1[6]=12;  //zmiana wartosci w 7 komorce
document.write('<b>tab1</b>  ');

for(var i=0;i<tab1.length;i++){
    if((2*tab1)>9){document.write(" ");}
    document.write(tab1[i]+" ");  //wypisanie calej tablicy
}
var tab2 = tab1.slice();   //utworzenie tab2 i skopiowanie wartosci
//document.write('<br><br>');

document.write('<br><br><b>tab2</b>  ');

for(var i=0;i<tab2.length;i++){
    if((2*tab2)>9){document.write(" ");}
    document.write(tab2[i]+" ");  //wyswietlenie calej tab2
}

var tab3=[];
document.write('<br><br><b>tab3</b>  ');
for(var i=0;i<tab2.length;i++){
    tab3[i]=tab1[i]+tab2[i];
    document.write(tab3[i]+" ");  //wyswietlenie calej tab3

}


// Jakub Majcherski 2022

