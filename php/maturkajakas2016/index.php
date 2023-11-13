<?php
$liczby=array();

$myfile = fopen("dane4.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  array_push($liczby,fgets($myfile));
}
fclose($myfile);

unset($liczby[2000]);  
  


function pierwsza($l){
    if ($l == 1)
    return 0;
    for ($i = 2; $i <= $l/2; $i++){
        if ($l % $i == 0)
            return 0;
    }
    return 1;
    //jezeli 1 to pierwsza
}


$ilepierwszych=0;
$pierwsze=array();

foreach($liczby as $s){
    if(pierwsza($s)==1){
        $ilepierwszych++;
        array_push($pierwsze, $s);
    }
}

echo "<h2>6.1</h2>".$ilepierwszych;
sort($pierwsze);
echo "<h2>6.2</h2>";
echo "MIN: ".$pierwsze[0]."<br>MAX: ".end($pierwsze);

$pary=array();
rsort($pierwsze);
for($i=0;$i<count($pierwsze);$i++){
    if($i==235){break;}
    if( ($pierwsze[$i]-$pierwsze[$i+1])==2 ){
        array_push($pary, ($pierwsze[$i]." i ".$pierwsze[$i+1]));
    }
}

echo "<br>
<h2>6.3</h2>
";
echo "pary: <br>".join("<br>", $pary);

//var_dump($liczby);


?>