<?php
$currencies = (object) [
    'EURO' => 'EURO',
    'USD' => 'AMERICAN DOLLARS',
    'JPY' => 'JAPANESE YEN',
    'AOA' => 'ANGOLAN KWANZA',
    'BIF' => 'BURUNDIAN FRANCS'
];

$currenciesRate = (object) [
    'EURO' => 1,
    'USD' => 1.09,
    'JPY' => 155.97,
    'AOA' => 910.03,
    'BIF' => 3120.31
];

$amount = 1;  
$currency = 'EURO';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
    $currency = isset($_POST['currency']) ? $_POST['currency'] : 'EURO';
}

function currencyChange($amount, $currency, $currenciesRate) {
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
    <title>Currency Conversion app</title>
</head>
<style>

body {
    background: gray;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-family: sans-serif;
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
    border: 2px solid blue;
    background: none;
}

select {
    border-radius: 15px;
    width: 80px;
    flex-direction: row;
    justify-content: center;
    align-items: center;
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
    color: white;
    cursor: pointer;
}

h1 {
    color: white;
    font-weight: 500;
}
</style>
<body>
    <main>
        <h1>Currency Conversion</h1>
        
        <form action="index.php" method="post">
            <input type="number" name="amount" value="<?php echo $amount; ?>">
            <select name="currency">
                <?php foreach ($currencies as $currencyCode => $currencyName): ?>
                    <option value="<?php echo $currencyCode; ?>" <?php echo ($currencyCode == $currency) ? 'selected' : ''; ?>><?php echo $currencyName; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <button type="submit">Convert</button>
        </form>
        <h2>Converted Amount: <?php echo currencyChange($amount, $currency, $currenciesRate); ?></h2>
    </main>
</body>
</html>
