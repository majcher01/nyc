var tab1 = [7,3,1,6,9,5,4,10,2,2]; //utworzenie tab1

document.write("&nbsp;&nbsp;"+tab1[4]+"<br>"); //wyswietlenie 5tej komorki
document.write('<table>');
tab1[6]=12;  //zmiana wartosci w 7 komorce
document.write('<tr><td><b>tab1</b></td>  ');

for(var i=0;i<tab1.length;i++){
    document.write('<td>'+tab1[i]+'</td>');  //wypisanie calej tablicy
}
document.write('</tr>');
var tab2 = tab1.slice();   //utworzenie tab2 i skopiowanie wartosci
//document.write('<br><br>');

document.write('<tr><td><b>tab2</b></td>  ');
for(var i=0;i<tab2.length;i++){
    document.write('<td>'+tab2[i]+"</td>");  //wyswietlenie calej tab2
}
document.write('</tr>');

var tab3=[];
document.write('<tr><td><b>tab3</b></td>  ');
for(var i=0;i<tab2.length;i++){
    tab3[i]=tab1[i]+tab2[i];
    document.write('<td>'+tab3[i]+"</td>");  //wyswietlenie calej tab3

}
document.write('</tr>');

tab1=tab2.reverse();

document.write('<tr><td><b>tab1 rev.</b></td>  ');

for(var i=0;i<tab1.length;i++){
    document.write('<td>'+tab1[i]+"</td>");  //wyswietlenie calej tab2
}
document.write('</tr></table>');

