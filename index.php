<?php
// var_dump($_POST);



$currencies = (object) [
    'EURO' => 'EURO',
    'USD' => 'AMERICAN DOLLARS',
    'JPY' => 'JAPANESE YEN',
    'AOA' => 'ANGOLAN KWANZA',
    'BIF' => 'Burundian Francs'
];

$currenciesRate = (object) [
    'EURO' => 1,
    'USD' => 1.09,
    'JPY' => 155.97,
    'AOA' => 910.03,
    'BIF' => 3120.31
];

foreach ($currenciesRate as $currency => &$rate) {
    $rate = number_format($rate, 2);
}

var_dump($rate);


function currencyChange($currency, $amount) {

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency exchange app</title>
</head>
<style>

body {
    background: gray;
}

main {
    margin-top: 30px;
}

form {
    display: flex;
    flex-direction: row;
    gap: 7px; 
}
</style>
<body>
    <main>
        <form action="index.php" method="post">
            <input type="number" name="amount">
            <br>
            <button>post</button>
        </form>
    </main>
</body>
</html>