<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74b9ff, #a29bfe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .calc-container {
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            width: 320px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="number"] {
            width: 120px;
            padding: 10px;
            margin: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        select {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            background: #0984e3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background: #74b9ff;
        }

        .result {
            margin-top: 20px;
            font-size: 20px;
            color: #2d3436;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="calc-container">
    <h2>Simple PHP Calculator</h2>

    <form method="post">
        <input type="number" name="num1" placeholder="First number" required>
        <br>
        <select name="operator">
            <option value="+">➕ Add</option>
            <option value="-">➖ Subtract</option>
            <option value="*">✖ Multiply</option>
            <option value="/">➗ Divide</option>
        </select>
        <br>
        <input type="number" name="num2" placeholder="Second number" required>
        <br>
        <button type="submit" name="calculate">Calculate</button>
    </form>

    <?php
    if (isset($_POST['calculate'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];
        $result = 0;

        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                $result = ($num2 != 0) ? $num1 / $num2 : 'Error: Divide by zero';
                break;
        }

        echo "<div class='result'>Result: $result</div>";
    }
    ?>
</div>

</body>
</html>
