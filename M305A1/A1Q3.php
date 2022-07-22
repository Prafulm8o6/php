<?php
$employees = array(
    array("emp_id" => 1, "name" => "Praful", "basic_salary" => 30000),
    array("emp_id" => 2, "name" => "Suresh", "basic_salary" => 90000),
    array("emp_id" => 3, "name" => "Yash", "basic_salary" => 100000)
);

// print_r($employees);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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
            width: auto;
        }
    </style>
</head>

<body>

    <table align="center">
        <thead>
            <tr>
                <th>ID</td>
                <th>Name</td>
                <th>Basic Salary</td>
                <th>DA</td>
                <th>HRA</td>
                <th>MA</td>
                <th>PF</td>
                <th>Net Salary</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($employees as $key => $value) {
                $id = $employees[$key]["emp_id"];
                $name = $employees[$key]["name"];
                $basicSalary = $employees[$key]["basic_salary"];
                $DA = ($employees[$key]["basic_salary"] % 154);
                $HRA = ($employees[$key]["basic_salary"] % 10);
                $MA = 300;
                $PF = ($employees[$key]["basic_salary"] % 15);
                $netSalary = $basicSalary + $DA + $HRA - $PF;

                echo "<tr>
                    <td>" . $id . "</td>
                    <td>" . $name . "</td>
                    <td>" . $basicSalary . "</td>
                    <td>" . $DA . "</td>
                    <td>" . $HRA . "</td>
                    <td>" . $MA . "</td>
                    <td>" . $PF . "</td>
                    <td>" . $netSalary . "</td>
                </tr>";
            }
            ?>

        </tbody>

    </table>

</body>

</html>