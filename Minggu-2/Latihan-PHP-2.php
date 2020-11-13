<?php

$arr = ["lanirne", "aduh", "qifuat", "toda", "anevi", "samid", "kifuat"];
    
for ($i = 0; $i < count($arr); $i++) { 
    $keyChangeIndex = $i;
    // echo "keyChange(" . $i .") : " . $keyChangeIndex . " ";
    for ($l=$i + 1; $l < count($arr); $l++) {
        for ($k=0; $k < strlen($arr[$l]); $k++) {
            // ex : 'a' < 'b' = true; 
            if($arr[$l][$k] < $arr[$keyChangeIndex][$k]){
                // echo "<br />" . $arr[$l][$k] . " (1)";
                $keyChangeIndex = $l;
                break;
            } else if($arr[$l][$k] > $arr[$keyChangeIndex][$k]) {
                // echo "<br />" . $arr[$i][$k] . " (2)"; 
                break;
            }
        }
        // echo "<br />";
    }
    
    $temp = $arr[$i];
    $arr[$i] = $arr[$keyChangeIndex];
    $arr[$keyChangeIndex] = $temp;

    // echo "<br />";
    // echo "keyChange(2) : " . $keyChangeIndex . " ";
}

echo "Hasil Dari pengurutan : [ "; 
foreach($arr as $data){
    echo $data . ", ";
}
echo " ]";