<?php
function color($text){
     if($text=='y'){
        echo '<b><p style="color:green;">YES</p></b>';
     }else{
        echo '<b><p style="color:red;">NO</p></b>';
     }
}
function price($number){
   $rupiah = "Rp " . number_format($number,2,',','.');
	return $rupiah;
}
function storage($number){
   if ($number<1000){
      echo "$number"." MB";
   }
   if ($number>=1000){
      $number = $number/1024;
      $number = number_format($number,2);
      echo "$number"." GB";
   }
}
function tahun($number){
   echo "$number"." Tahun";
}
?>
