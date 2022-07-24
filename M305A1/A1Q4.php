<?php
$registrationID = $name = $passwd = $retypePasswd = $gender = $areaOfSpecialization = $address = $profileImgFile = $resumeFile =
    $errorRegistrationID = $errorName = $errorPasswd = $errorRetypePasswd = $errorGender = $errorAreaOfSpecialization = $errorAddress = $errorProfileImgFile = $errorResumeFile = "";

$registeredData = array();


if (isset($_POST['register']) &&  $_SERVER["REQUEST_METHOD"] == 'POST') {
    $registrationID = $_POST['reg_id'];
    $name = $_POST['name'];
    $passwd = $_POST['passwd'];
    $retypePasswd = $_POST['retype_passwd'];
    $areaOfSpecialization = $_POST['area_of_spec'];
    $address = nl2br($_POST['address']);
    $gender = (isset($_POST['gender'])) ? $_POST['gender'] : "";

    if (!$registrationID) {
        $errorRegistrationID = "* Enter the registration id.";
    } else {
        $registrationID = strtolower($registrationID);
        if (strlen($registrationID) == 4 && strcmp(substr($registrationID, 0, 1), 'e') == 0 && is_numeric(substr($registrationID, 1, 4))) {
            $errorRegistrationID = "";
            $registrationID = strtolower($registrationID);
        } else {
            $errorRegistrationID = "* Invalid registration id";
        }
    }

    if (!$name) {
        $errorName = "* Enter the name";
    } else {
    }

    if (!$passwd) {
        $errorPasswd = "* Enter the password";
    } else {
        if (strlen($passwd) >= 8) {
            $errorPasswd = "* Password length should be up to 8 characters only.";
        } else {
        }
    }

    if (!$retypePasswd) {
        $errorRetypePasswd = "* Enter the same password";
    } else {
        if (strcmp($retypePasswd, $passwd) != 0) {
            $errorRetypePasswd = "* Retype password should be same as password.";
        } else {
        }
    }

    if (!$gender) {
        $errorGender = "* Select the gender";
    } else {
        $gender = $_POST['gender'];
    }

    if (!$areaOfSpecialization) {
        $errorAreaOfSpecialization = "* Select the option";
    } else {
    }

    if (!$address) {
        $errorAddress = "* Enter the address";
    } else {
    }

    $sizeLimit = 5000000;

    if (isset($_POST['profile_img_file'])) {
        $errorProfileImgFile = "* Please select the profile image.";
    } else {
        $base_name_profile_img = $_FILES['profile_img_file']["name"];
        $temp_name_profile_img = $_FILES['profile_img_file']["tmp_name"];
        $allowed_array_profile_img = array(".jpeg", ".jpg", ".png");
        $size = $_FILES['profile_img_file']["size"];

        $filename = substr($base_name_profile_img, 0, stripos($base_name_profile_img, '.'));
        $ext = strtolower(substr($base_name_profile_img, stripos($base_name_profile_img, '.')));

        if (in_array($ext, $allowed_array_profile_img) && $size < $sizeLimit) {
            $profileImgFile = md5($filename) . rand(100, 999) . $ext;
        } elseif (strlen($filename) == 0) {
            $errorProfileImgFile = "* Please select the profile image.";
        } elseif ($size > $sizeLimit) {
            $errorProfileImgFile = "* Please select the profile image.";
        } else {
            $errorProfileImgFile = "* File types are " . implode(',', $allowed_array_profile_img);
        }
        if (file_exists("uploads/" . $profileImgFile) && $profileImgFile != "") {
            $errorProfileImgFile = "* File exists already.";
        } else {
            move_uploaded_file($temp_name_profile_img, "uploads/" . $profileImgFile);
        }
    }

    if (isset($_POST['resume_file'])) {
        $errorResumeFile = "* Please select the profile image.";
    } else {
        $base_name_resume_file = $_FILES['resume_file']["name"];
        $temp_name_resume_file = $_FILES['resume_file']["tmp_name"];
        $allowed_array_resume_file = array(".pdf", ".docs");
        $size = $_FILES['resume_file']["size"];

        $filename = substr($base_name_resume_file, 0, stripos($base_name_resume_file, '.'));
        $ext = strtolower(substr($base_name_resume_file, stripos($base_name_resume_file, '.')));

        if (in_array($ext, $allowed_array_resume_file) && $size < $sizeLimit) {
            $resumeFile = md5($filename) . rand(100, 999) . $ext;
        } elseif (strlen($filename) == 0) {
            $errorResumeFile = "* Please select the profile image.";
        } elseif ($size > $sizeLimit) {
            $errorResumeFile = "* Please select the profile image.";
        } else {
            $errorResumeFile = "* File types are " . implode(',', $allowed_array_resume_file);
        }
        if (file_exists("uploads/" . $resumeFile) && $resumeFile != "") {
            $errorResumeFile = "* File exists already.";
        } else {
            move_uploaded_file($temp_name_resume_file, "uploads/" . $resumeFile);
        }
    }

    $registeredData = array(
        array(
            "reg_id" => $registrationID,
            "name" => $name,
            "gender" => $gender,
            "address" => $address,
            "area_of_spec" => $areaOfSpecialization,
            "profile_img" => $profileImgFile,
            "resume_file" => $resumeFile
        )
    );
}

if (isset($_POST['clear'])) {
    echo "<script>window.top.location = window.top.location;</script>";
}



?>
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
            /* background-color: #000; */
        }

        table,
        tr,
        td {
            padding: 8px;
        }

        table {
            background-color: #fff;
            width: inherit;
            padding: 50px 0px 50px 0px;
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

        .container {
            width: 90%;
            margin: auto;
            display: flex;
            background: #fff;
            justify-content: space-evenly;
            box-shadow: 5px 2px 10px gray;
            padding: 20px;
        }

        /* body {
            margin: 20px;
        } */
    </style>
</head>

<body>

    <div class="container">
        <div style="width: 100%;">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <table align="center">
                    <tr>
                        <td align="right" style="width: 25%;">
                            Registration ID :
                        </td>
                        <td>
                            <input type="text" name="reg_id" placeholder="Enter the registration id" max="">
                            <span style="color: red;"><?php echo "<br>" . $errorRegistrationID; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Name :
                        </td>
                        <td>
                            <input type="text" name="name" placeholder="Enter the name">
                            <span style="color: red;"><?php echo "<br>" . $errorName; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Password :
                        </td>
                        <td>
                            <input type="password" name="passwd" placeholder="Enter the password">
                            <span style="color: red;"><?php echo "<br>" . $errorPasswd; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Retype Password :
                        </td>
                        <td>
                            <input type="password" name="retype_passwd" placeholder="Enter the same password">
                            <span style="color: red;"><?php echo "<br>" . $errorRetypePasswd; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Gender :
                        </td>
                        <td>
                            <input type="radio" name="gender" id="male" value="male" <?php echo (isset($gender) && $gender == "male") ? "checked" : ""; ?>>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" id="female" value="female" <?php echo (isset($gender) && $gender == "female") ? "checked" : ""; ?>>
                            <label for="female">Female</label>
                            <input type="radio" name="gender" id="other" value="other" <?php echo (isset($gender) && $gender == "other") ? "checked" : ""; ?>>
                            <label for="other">Other</label>
                            <span style="color: red;"><?php echo "<br>" . $errorGender; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Address :
                        </td>
                        <td>
                            <textarea rows="5" name="address" placeholder="Enter the address"></textarea>
                            <span style="color: red;"><?php echo "<br>" . $errorAddress; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Area Of Specialization :
                        </td>
                        <td>
                            <select name="area_of_spec">
                                <option value="">--- select option ---</option>
                                <option value="web">Web Group</option>
                                <option value="network">Network</option>
                                <option value="database">Database Group</option>
                                <option value="general">General Group</option>
                            </select>
                            <span style="color: red;"><?php echo "<br>" . $errorAreaOfSpecialization; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Photo :
                        </td>
                        <td>
                            <input type="file" name="profile_img_file">
                            <span style="color: red;"><?php echo "<br>" . $errorProfileImgFile; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Resume :
                        </td>
                        <td>
                            <input type="file" name="resume_file">
                            <span style="color: red;"><?php echo "<br>" . $errorResumeFile; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <div class="myClass">
                                <input type="submit" name="register" value="Register">
                                <input type="submit" name="clear" value="Clear">
                            </div>
                        </td>
                    </tr>

                </table>
            </form>
        </div>
        <div style="width: 100%;">
            <table style="padding: 20px; margin-top:68px; text-align:center" border="2">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Specialization</th>
                    <th>Photo</th>
                    <th>Resume</th>
                </tr>
                <!-- <tr>
                    <td><?php echo (isset($_REQUEST['reg_id'])) ? $_REQUEST['reg_id'] : ""; ?></td>
                    <td><?php echo (isset($_REQUEST['name'])) ? $_REQUEST['name'] : ""; ?></td>
                    <td><?php echo (isset($_REQUEST['gender'])) ? $_REQUEST['gender'] : ""; ?></td>
                    <td><?php echo (isset($_REQUEST['address'])) ? $_REQUEST['address'] : ""; ?></td>
                    <td><?php echo (isset($_REQUEST['area_of_spec'])) ? $_REQUEST['area_of_spec'] : ""; ?></td>
                    <td><?php echo (isset($_FILES['profile_img_file'])) ? $_FILES['profile_img_file']['name'] : ""; ?></td>
                    <td><?php echo (isset($_FILES['resume_file'])) ? $_FILES['resume_file']['name'] : ""; ?></td>
                </tr> -->
                <?php
                foreach ($registeredData as $key => $value) {
                    echo "
                    <td>" . $registeredData[$key]['reg_id'] . "</td>
                    <td>" . $registeredData[$key]['name'] . "</td>
                    <td>" . $registeredData[$key]['gender'] . "</td>
                    <td>" . $registeredData[$key]['address'] . "</td>
                    <td>" . $registeredData[$key]['area_of_spec'] . "</td>
                    <td>" . $registeredData[$key]['profile_img'] . "</td>
                    <td>" . $registeredData[$key]['resume_file'] . "</td>
                    ";
                }
                ?>
            </table>
        </div>
    </div>

</body>

</html>