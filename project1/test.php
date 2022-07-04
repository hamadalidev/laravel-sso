<?php

function getLargestPiece($s, $x, $y)
{
     $sizes = explode(",", $s);


//     if (count($x) == 0) {
//
//     } elseif(count($y) == 0) {
//
//     } else {
//        $size1 = $x[0] - $y[0]; // 3
//         $size2 = $x[0] - $y[1];
//
          $len1 =  $sizes[0] - $x[0];
          $len2 =  $len1 - $x[1];

          $maxLength = max([$len1, $len2, $len1 - $len2]);
          var_dump($maxLength);
          die('d');
          $maxLength = $maxLength - $y[0];
          $maxLength = $maxLength * $sizes[0];

           echo($maxLength);

//     }



}


getLargestPiece("100,70", [80,20], [35]); //9
