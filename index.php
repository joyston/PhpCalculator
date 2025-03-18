<html>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="num1">
        <select name="operator">
            <option value="addition">+</option>
            <option value="subtraction">-</option>
            <option value="multiplication">X</option>
            <option value="division">/</option>
        </select>
        <input type="number" name="num2">
        <input type="submit">
    </form>
</body>
<?php
//validate
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = false;

    if (empty($_POST["num1"])) {
        echo "<p>Please enter the first input!</p>";
        $error = true;
    } elseif (!is_numeric($_POST["num1"])) {
        echo "<p>Please enter a valid number!</p>";
        $error = true;
    } else {
        $num1 = $_POST["num1"];
    }

    if (empty($_POST["num2"])) {
        echo "<p>Please enter the second input!</p>";
        $error = true;
    } elseif (!is_numeric($_POST["num2"])) {
        echo "<p>Please enter a valid number!</p>";
        $error = true;
    } else {
        $num2 = $_POST["num2"];
    }

    if (empty($_POST["operator"])) {
        echo "<p>Please Select an Operator!</p>";
        $error = true;
    } else {
        $op = htmlspecialchars($_POST["operator"]); //sanitise
    }

    //process
    if (!$error) {
        $value = 0;
        switch ($op) {
            case 'addition':
                $value = $num1 + $num2;
                break;
            case 'subtraction':
                $value = $num1 - $num2;
                break;
            case 'multiplication':
                $value = $num1 * $num2;
                break;
            case 'division':
                $value = $num1 / $num2;
                break;
            default:
                echo "<p>Something went wrong!!!!</p>";
        }
        echo "<p>Result" . $value . "</p";
    }
}

?>

</html>