<?php 
$conn = mysqli_connect('localhost', 'xianglan', '123456', 'ninja_pizza');
//check connection
if (!$conn) {
    echo 'connection error:' . mysqli_connect_error();
}
