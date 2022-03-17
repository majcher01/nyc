

function zad4(){

    var list = [1,2,3,4,5,6,7,8,9,10];

for (var x = 0, ln = list.length; x < ln; x++) {
  setTimeout(function(y) {    
    console.log(list[y]);
    document.getElementById("interwal").innerHTML+=" "+list[y];
  }, x * 1000, x); // we're passing x
}





}