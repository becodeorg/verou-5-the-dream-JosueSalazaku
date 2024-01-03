<?php
var_dump($_POST);

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

function currencyChange($currency, $amount) {
    global $currenciesRate; 
    if (isset($currenciesRate->$currency)) {
        $convertedAmount = $amount * $currenciesRate->$currency;
        return $convertedAmount;
    } else {
        return "Invalid currency";
    }
}

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
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-family: 'Poppins', sans-serif;
}

main {
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}


form {
    display: flex;
    flex-direction: row;
    gap: 7px; 
    padding: 20px;
}

input {
    width: 250px;   
    height: 40px;   
    font-size: 20px;
    border-radius: 12px;
    border: none;
    
}

button {
    display: flex;
    flex-direction: column;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 12px;
    border: none;
    background: blue;
}
</style>
<body>
    <main>
    <h2>Currency Conversion</h2>
        <?php foreach ($currenciesRate as $currency => $rate): ?>
            <?php echo "$currency:$rate"; ?>
            <?php echo "$convertedAmount"; ?>
        <?php endforeach; ?>
        <form action="index.php" method="post">
            <input type="number" name="amount">
            <br>
            <button onclick="<?php echo 'var_dump(' . currencyChange('EURO', 1) . ');'; ?>">post</button>
        </form>

    </main>
</body>
</html>
