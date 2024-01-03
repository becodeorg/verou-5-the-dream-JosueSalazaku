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

// Default values
$amount = 1;  // Default amount
$currency = 'EURO';  // Default currency

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
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
    color: white;
    cursor: pointer;
}
</style>
<body>
    <main>
        <h2>Currency Conversion</h2>
        <?php foreach ($currenciesRate as $currencyKey => $rate): ?>
            <?php echo "$currencyKey: $rate"; ?>
        <?php endforeach; ?>
        
        <form action="index.php" method="post">
            <input type="number" name="amount" value="<?php echo $amount; ?>">
            <select name="currency">
                <?php foreach ($currencies as $currencyKey => $currencyName): ?>
                    <option value="<?php echo $currencyKey; ?>" <?php echo ($currencyKey == $currency) ? 'selected' : ''; ?>><?php echo $currencyName; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <button type="submit">Convert</button>
        </form>

        <p>Converted Amount: <?php echo currencyChange($amount, $currency, $currenciesRate); ?></p>
    </main>
</body>
</html>
