

function zad4(){

    var i = 0;
    while ( i < 10 ) {
        // This block will be executed 100 times.
        setInterval(document.getElementById("interwal").innerHTML+=" "+i, 1000);
        i++; // Increment i
    }




}