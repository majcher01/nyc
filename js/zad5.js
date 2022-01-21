let tablica = new Array(100);
tablica[0]=0, tablica[1]=1;

for (var i=2;i<100;i++){
    tablica[i]=(tablica[i-1]+tablica[i-2]);
}

for (var i =0;i<tablica.length;i++){
    tablica[i]=Math.pow(2, i);
}

tablica[0]=3
for(var i=1;i<tablica.length;i++){
    tablica[i]=(tablica[i-1]+3);
}

function isPrime(num) {
    for(var i = 2; i < num; i++)
      if(num % i === 0) return false;
    return num > 1;
  }

tablica=[];

var i=3;
do{
    if(isPrime(i)==true){
        tablica.push(i);
    }

    i++
}while(tablica.length<100)
console.log(tablica);
console.log(isPrime(6))
  
