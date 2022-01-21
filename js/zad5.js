let tablica = new Array(100);
tablica[0]=0, tablica[1]=1;
console.log(tablica);

for (var i=2;i<100;i++){
    tablica[i]=(tablica[i-1]+tablica[i-2]);
}

console.log(tablica);
