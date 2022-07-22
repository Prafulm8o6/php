<?php

if (isset($_POST['addition'])) {

    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];

    $addition = $number1 + $number2;

    echo "<script>alert('Addition : " . $addition . "')</script>";
}

if (isset($_POST['subtraction'])) {

    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];

    $subtraction = $number1 - $number2;

    echo "<script>alert('Subtraction : " . $subtraction . "')</script>";
}

if (isset($_POST['multiplication'])) {

    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];

    $multiplication = $number1 * $number2;

    echo "<script>alert('Multiplication : " . $multiplication . "')</script>";
}

if (isset($_POST['division'])) {

    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];

    if ($number2 == 0) {
        echo "<script>alert('Cannot divide by zero.')</script>";
    } else {
        $division = $number1 / $number2;
        echo "<script>alert('Division : " . $division . "')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CALCULATOR</title>
    <style>
        body {
            margin: auto;
            padding-top: 280px;
            background-color: #000;
        }

        table,
        tr,
        td {
            background-color: #fff;
            border: 1px black solid;
            text-align: center;
            font-size: large;
            border: none;
            padding: 30px;
            border-radius: 20px;
        }

        table {
            /* box-shadow: 8px 4px 10px lightcyan; */
            /* border: 3.4px solid cyan; */
            width: 800px;
        }

        input[type='number'] {
            width: 90%;
            margin: 8px;
            padding: 8px;
            border: none;
            outline: 2px solid coral;

        }

        input[type='submit'] {
            width: 100px;
            margin: 10px;
            padding: 10px;
            font-size: large;
            border: none;
            color: #fff;
            background-color: orange;
            cursor: pointer;

        }

        .myClass {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>

<body>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table align="center" style="padding: 10px;">
            <tr>
                <td colspan="2" style="font-size:xx-large;">
                    CALCULATOR
                </td>
            </tr>
            <tr>
                <td>
                    <b>Number 1 :</b>
                </td>
                <td>
                    <input type="number" name="number1" placeholder="Enter the number" required>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Number 2 :</b>
                </td>
                <td>
                    <input type="number" name="number2" placeholder="Enter the number" required>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <div class="myClass">
                        <input type="submit" name="addition" value="+">
                        <input type="submit" name="subtraction" value="-">
                        <input type="submit" name="multiplication" value="*">
                        <input type="submit" name="division" value="/">
                    </div>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>