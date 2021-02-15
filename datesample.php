<?php 

$now = date('Y-m-d');
echo "Today is ";
echo date('M-d-Y', strtotime($now)) .  "<br>";
echo "after 2 weeks is ";
echo date('M-d-Y', strtotime($now.'+14 days')) .  "<br>";
echo "after 4 weeks is ";
echo date('M-d-Y', strtotime($now.'+28 days'));

?>