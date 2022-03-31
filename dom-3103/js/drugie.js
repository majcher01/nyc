//let data = new Date(day, month, year);
//let czas = new Date(hours, minutes, seconds);
let xd = new Date();
let data = xd.getDate()+"/"+(xd.getMonth()+1)+"/"+xd.getFullYear();

let czas = xd.getHours()+":"+xd.getMinutes()+":"+xd.getSeconds();



document.getElementById("dataiczas").innerHTML=data+" | "+czas;