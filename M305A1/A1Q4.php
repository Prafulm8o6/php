<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registration Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        body {
            margin: auto;
            padding-top: 50px;
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
            padding: 20px;
            border-radius: 20px;
        }

        table {
            /* box-shadow: 8px 4px 10px lightcyan; */
            /* border: 3.4px solid cyan; */
            width: 800px;
        }

        input[type='number'],
        input[type='text'],
        input[type='password'],
        input[type='file'],
        select,
        textarea {
            width: 90%;
            margin: 8px;
            padding: 8px;
            border: none;
            outline: 2px solid coral;

        }

        input[type='submit'],
        input[type='reset'] {
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

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table align="center">
            <tr>
                <td>
                    Registration ID :
                </td>
                <td>
                    <input type="number" name="res_id" placeholder="Enter the registration id" max="" required>
                </td>
            </tr>
            <tr>
                <td>
                    Name :
                </td>
                <td>
                    <input type="text" name="name" placeholder="Enter the name" required>
                </td>
            </tr>
            <tr>
                <td>
                    Password :
                </td>
                <td>
                    <input type="password" name="passwd" placeholder="Enter the password" required>
                </td>
            </tr>
            <tr>
                <td>
                    Retype Password :
                </td>
                <td>
                    <input type="password" name="retype_passwd" placeholder="Enter the same password" required>
                </td>
            </tr>
            <tr>
                <td>
                    Gender :
                </td>
                <td>
                    <input type="radio" name="gender" value="male" id="male" placeholder="Enter the same password" required>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" value="female" id="female" placeholder="Enter the same password" required>
                    <label for="female">Female</label>
                    <input type="radio" name="gender" value="other" id="other" placeholder="Enter the same password" required>
                    <label for="other">Other</label>
                </td>
            </tr>
            <tr>
                <td>
                    Address :
                </td>
                <td>
                    <textarea rows="5" placeholder="Enter the address" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Area Of Specialization :
                </td>
                <td>
                    <select name="area_of_spec" required>
                        <option value="">--- select option ---</option>
                        <option value="web">Web Group</option>
                        <option value="network">Network</option>
                        <option value="database">Database Group</option>
                        <option value="general">General Group</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Photo :
                </td>
                <td>
                    <input type="file" name="myDocs[]" required>
                </td>
            </tr>
            <tr>
                <td>
                    Resume :
                </td>
                <td>
                    <input type="file" name="myDocs[]" required>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <div class="myClass">
                        <input type="submit" name="register" value="Register">
                        <input type="reset" name="clear" value="Clear">
                    </div>
                </td>
            </tr>

        </table>
    </form>

</body>

</html>