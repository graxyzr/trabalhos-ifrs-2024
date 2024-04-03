<?php
$select = $_POST['operation'];
$number1 = $_POST['number1'];
$number2 = $_POST['number2'];

if ($select == 'sum') {
    $result = $number1 + $number2;
    echo "Resultado: $result";
}

else if ($select == 'subtraction') {
    $result = $number1 - $number2;
    echo "Resultado: $result";
}

else if ($select == 'multiplication') {
    $result = $number1 * $number2;
    echo $result;
}

else if ($select == 'division') {
    $result = $number1 / $number2;
    echo $result;
}
?>