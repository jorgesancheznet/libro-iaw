<?php
function f($n){
if($n<=2) return $n;
else return f($n-2)+f($n-1);
}
echo f(5);
?>