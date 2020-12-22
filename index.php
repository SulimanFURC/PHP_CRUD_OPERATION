<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

// echo __DIR__ . '<br>';
// echo __FILE__ . '<br>';

//make directory
// mkdir('Files');

// rename('Files', 'UploadedFiles');

// rmdir('UploadedFiles');

$url = 'https://jsonplaceholder.typicode.com/users';
$resource = curl_init($url);
curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($resource);
$info = curl_getinfo($resource, CURLINFO_HTTP_CODE);
// echo '<pre>';
// print_r($info);
// echo '<pre>';
// echo $result;

?>

<!-- <center><h1>Calculator in PHP</h1></center>
    <form method="GET">
        <input type="text" name="Num1" placeholder="Number 1">
        <input type="text" name="Num2" placeholder="Number 2">

        <select name="operator">
            <option>None</option>
            <option>Add</option>
            <option>Subtract</option>
            <option>Multiply</option>
            <option>Divide</option>
        </select>
        <br>
        <button type="submit" name="submit" value="submit">Calculate</button>
    </form>
    <p>The Answer is: </p>
    <?php

    if(isset($_GET['submit']))
    {
        $result1 = $_GET['Num1']; 
        $result2 = $_GET['Num2'];
        $operator = $_GET['operator'];

        switch($operator)
        {
            case "None":
                echo "You have to Select an Operator First";
            break;

            case "Add":
                echo $result1 + $result2;
            break;

            case "Subtract":
                echo $result1 - $result2;
            break;

            case "Divide":
                echo $result1/$result2;
            break;

            case "Multiply":
                echo $result1 * $result2;
            break;

        }
    }

    $array = array("Suliman","khan","Ahmad","Ali","Muhammad","Babar");

    echo "<br>";
    foreach($array as $iterator)
    {
        echo "My name is: ". $iterator."<br>";
    }

    $x = 100;
    function newCalculate($x)
    {
        $value = $x * 0.75;
       echo "The is 75% of 100 is " . $value;
    }   

    newCalculate($x);
    ?> -->
</body>
</html>