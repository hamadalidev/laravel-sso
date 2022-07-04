


<?php

//<!--// you can write to stdout for debugging purposes, e.g.-->
//<!--// print "this is a debug message\n";-->
//<!---->
//<!--function solution($S, $B) {-->
//<!---->
//<!--$temp = $B;-->
//<!--for($i = 0; $i < count($B); $i++) {-->
//<!--$sum = array_sum($temp);-->
//<!--$S = round(($S * $B[$i] / $sum), 2);-->
//<!---->
//<!--var_dump($S);-->
//<!--die('d');-->
//<!---->
//<!--}-->
//<!---->
//<!--}-->
//
//
//<!--// you can write to stdout for debugging purposes, e.g.-->
//<!--// print "this is a debug message\n";-->
//
//<!--function solution($S, $B) {-->
//<!---->
//<!--$count =  count($B);-->
//<!--$resultArray= [];-->
//<!--for($i = 0; $i < $count; $i++) {-->
//<!--$sum = array_sum($B);-->
//<!--$tempS = ($S * $B[$i] / $sum);-->
//<!--$tempS = bcdiv($tempS, 1, 2);-->
//<!--$resultArray[] = $tempS;-->
//<!--$S = $S - $tempS;-->
//<!--unset($B[$i]);-->
//<!--}-->
//<!---->
//<!--return $resultArray;-->
//<!--// var_dump($resultArray);-->
//<!---->
//<!--}-->
//

/**
 * bfs / dfs
 */

//class NodeItem{
//    public $info;
//    public $l;
//    public $r;
//
//    /**
//     * @param $info
//     */
//    public function __construct($info)
//    {
//        $this->info = $info;
//        $this->l = null;
//        $this->r = null;
//    }
//
//}
//
//function dfs($root){
//    if ($root instanceof NodeItem) {
//        echo  $root->info ." ";
//        if ($root->l instanceof NodeItem) {
//            dfs($root->l);
//        }
//
//        if ($root->r instanceof NodeItem) {
//            dfs($root->r);
//        }
//    }
//}
//
//
//function bfs($root){
//    if ($root instanceof NodeItem) {
////        echo  $root->info ." ";
//        if ($root->l instanceof NodeItem) {
//            dfs($root->l);
//        }
//        echo  $root->info ." ";
//
//        if ($root->r instanceof NodeItem) {
//            dfs($root->r);
//        }
//    }
//}
//
//$root = new NodeItem(9);
//$root->l = new NodeItem(8);
//$root->r = new NodeItem(10);
//$root->l->l = new NodeItem(7);
//$root->l->r = new NodeItem(13);
////dfs($root);


////////////////////////////

//
//function longsubString($string) {
//
//    $e = 0;
//    $s = 0;
//    $max = 0;
//    $items = [];
//    while($e < strlen($string)) {
//        if(!isset($items[$string[$e]])) {
//            $items[$string[$e]] = $string[$e];
//            $e++;
//            $max = max([$max, count($items)]);
//        } else {
//            unset($items[$string[$e]]);
//            $s++;
//        }
//    }
//    return $max;
//}
//
//echo longsubString('geeksforgeeks');

/**
 * array reverse
 */
//function arrayReverse($item, $s, $e)
//{
//    while($s < $e) {
//        $temp = $item[$s];
//        $item[$s] = $item[$e];
//        $item[$e] = $temp;
//        $s++;
//        $e--;
//    }
//
//    return $item;
//}
//
//var_dump(json_encode(arrayReverse([1,2,3,4,5], 1,4)));

/**
 * name sort by roman
 */

function sortRoyal($items)
{
    asort($items);

    $visit = [];
    $s = 0;
    while($s < count($items)) {
        if (!isset($visit[$items[$s][0]]) && isset($items[$s+1][0])) {
            $visit[$items[$s][0]] = $items[$s][0];

            if ($visit[$items[$s][0]] == $items[$s+1][0]) {
                $unsortArray = getSameElement($visit[$items[$s][0]], $items);
            }
        }
        $s++;
    }
    return $items;

}
function getSameElement($start, $array)
{
    $list = [];
    foreach ($array as $key => $item) {
        if ($item[0] == $start) {
            $list[$key] = $item;
        }
    }
    return $list;
}

var_dump(json_encode(sortRoyal(['hli II', 'sli IV', 'alia II', 'ali V', 'ali III'])));


////////////
///
///
///
/// class Solution {
//
//    /**
//     * @param Integer[] $nums
//     * @param Integer $target
//     * @return Integer[][]
//     */
//    function fourSum($nums, $target) {
//        $one = 0;
//        $two = 1;
//        $three = 2;
//        $four = 3;
//        var_dump($this->cal($four, count($nums), $one, $two, $three, $four, $nums, 4));
//        var_dump($this->cal($three, count($nums)-1, $one, $two, $three, count($nums)-1, $nums, 3));
//
//
//
//    }
//
//    function cal($s, $c, $one, $two, $three, $four, $num, $cal1)
//    {
//        $item = [];
//        while($s < $c) {
//            $cal = $num[$one] + $num[$two] + $num[$three] + $num[$four];
//            if($cal == 0) {
//               $item[] = [$num[$one], $num[$two], $num[$three], $num[$four]];
//            }
//            $s++;
//
//            if($cal1 == 4) {
//                $four++;
//            }
//
//            if($cal1 == 3) {
//                $three++;
//            }
//
//
//        }
//        return $item;
//    }
//
//}
//
//$obj = new Solution();
//
//$obj->fourSum( [1,0,-1,0,-2,2], 0);

