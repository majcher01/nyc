window.onload=function(){
let liczby = [];

for(var i=0;i<100;i++){
    liczby[i]=Math.floor(Math.random() * 500);
}


let sort = liczby.sort(function(a, b){return a - b});
let max = sort[99];

for(var i=0;i<liczby.length;i++){}


document.getElementById('output4').innerHTML='max: '+max;


}