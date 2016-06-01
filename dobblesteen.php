<?php

for ($i=0; $i<5; $i++){
$random = rand(1, 5);
create_image($random);
$aWorp[$i] = $random;
print "<img src=$random.png?".date("U").">";
}

$aScore = analyse($aWorp);
pokerOrNot($aScore);




function  create_image($random){
        $im = @imagecreate(200, 200) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 0, 0, 0);   // yellow
        
        $blue = imagecolorallocate($im, 255, 0, 0); 
    
    if ($random == 1){
         imagefilledellipse($im, 100, 100, 40, 40, $blue); //4
        
    }
    
    else if($random == 2){
        imagefilledellipse($im, 40, 40, 40, 40, $blue); //1 
        imagefilledellipse($im, 160, 160, 40, 40, $blue); //7
    }
    
    else if($random == 3){
        imagefilledellipse($im, 40, 40, 40, 40, $blue); //1
        imagefilledellipse($im, 100, 100, 40, 40, $blue); //4
        imagefilledellipse($im, 160, 160, 40, 40, $blue); //7
    }
    
    else if($random == 4){
        imagefilledellipse($im, 40, 40, 40, 40, $blue); //1
        imagefilledellipse($im, 160, 40, 40, 40, $blue); //2
        imagefilledellipse($im, 40, 160, 40, 40, $blue); //6
        imagefilledellipse($im, 160, 160, 40, 40, $blue); //7
    }
    
    else if($random == 5){
        imagefilledellipse($im, 40, 40, 40, 40, $blue); //1
        imagefilledellipse($im, 160, 40, 40, 40, $blue); //2
        imagefilledellipse($im, 100, 100, 40, 40, $blue); //4
        imagefilledellipse($im, 40, 160, 40, 40, $blue); //6
        imagefilledellipse($im, 160, 160, 40, 40, $blue); //7
    }
    
    else if($random == 6){
        imagefilledellipse($im, 40, 40, 40, 40, $blue); //1
        imagefilledellipse($im, 160, 40, 40, 40, $blue); //2
        imagefilledellipse($im, 40, 100, 40, 40, $blue); //3
        imagefilledellipse($im, 160, 100, 40, 40, $blue); //5
        imagefilledellipse($im, 40, 160, 40, 40, $blue); //6
        imagefilledellipse($im, 160, 160, 40, 40, $blue); //7
    }
                      // blue
//  imagefilledellipse($im, 40, 40, 40, 40, $blue); //1
//  imagefilledellipse($im, 160, 40, 40, 40, $blue); //2
//  imagefilledellipse($im, 40, 100, 40, 40, $blue); //3
//  imagefilledellipse($im, 100, 100, 40, 40, $blue); //4
//  imagefilledellipse($im, 160, 100, 40, 40, $blue); //5
//  imagefilledellipse($im, 40, 160, 40, 40, $blue); //6
//  imagefilledellipse($im, 160, 160, 40, 40, $blue); //7
        
        imagepng($im, $random . ".png");
        imagedestroy($im);
    
      
}
function analyse($aWorp){
    $aScore = array (0,0,0,0,0,0,0);//initialiseer de array met alle waarden op 0
    for ($i = 1 ; $i <= 6 ; $i++){//outer loop
		for ($j = 0 ; $j <5 ; $j++){//inner loop
            if ($aWorp[$j] == $i){
                $aScore[$i]++;
            }}}
    return $aScore; //$aScore is een lokale variabele.
	//via de return krijg je de array $aScore  'buiten de functie'
}

function pokerOrNot($aScore){
    echo "<br>analyse van de werp<br>";
    rsort($aScore);
    echo "<br>";
    
    if ($aScore[0] == 5) {
        echo "Poker";
    }
    if ($aScore[0] == 4) {
        echo "Carre";
    }
    if ($aScore[0] == 3) {
        if ($aScore[1] == 2) {
            echo "Fullhouse!";
        } else {
            echo "Three of a kind!";
        }
    }
    if ($aScore[0] == 2) {
        if ($aScore[1] == 2) {
            echo "Two Pair!";
        } else {
            echo "One Pair!";
        }
    } 
    if ($aScore[0] == 1) {
        echo "To bad...";
    }
}

    
    
?>
<br>
<button onclick="reload()">gooi nog een keer</button>
<script>
function reload(){
    location.reload();
}

</script>
<style>
    img{
        border: 1px solid red;
        margin-right: 1em;
        border-radius: 20px;
        
    }
</style>

<?php
    function printSource(){ // dit script handhaven, zorg dat het blijft werken, zonodig filename aanpassen
  echo "<h1>de source code</h1>";
  $all_lines = file("dobblesteen.php");  
  foreach ($all_lines as $line_num => $line)  
   {  
     // echo "Line No.-{$line_num}: " . htmlspecialchars($line) . "<br>\n";  
   echo " " . htmlspecialchars($line) . "<br>\n";  
   }  
  }
    
    printSource();
    ?>
