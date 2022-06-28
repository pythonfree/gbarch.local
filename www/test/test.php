<?php

// 1. foreach
//$ids = [1,2,3];
//foreach ($ids as $key => $id) {
//    var_dump($ids);
//    unset($ids[$key]);
//}
//var_dump($ids); // empty

// 2. while
//$ids = [1,2,3];
//while ($ids) {
//    var_dump($ids);
//    unset($ids[key($ids)]);
//}
//var_dump($ids); // empty

// 3. while
$ids = [1,2,3];
while ($id = array_shift($ids)) {
    var_dump($id);
}
var_dump($ids); // empty