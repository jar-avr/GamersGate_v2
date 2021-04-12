<?php
session_start();
$globals = Globals::getInstance();
?>
<head>
    <title>GamersGate | Вход</title>
    <style>
        .error {color: #FF0000;}
        #footer {
            position: fixed;
            bottom: 0;
        }
        #loginCont {
            color: #DEDEDE;
            margin-left: 30px;
        }
    </style>
</head>
<?php
function test_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $passErr = "";
$name = $pass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!$globals->getPost('name')) {//empty($_POST['name'])
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (!$globals->getPost('pass')) {
        $passErr = "Password is required";
    } else {
        $pass = test_input($_POST["pass"]);
        if (!preg_match("/^(?=.*[a-z])/", $pass)) {
            $passErr = "The string must contain at least 1 lowercase alphabetical character";
        } elseif (!preg_match("/^(?=.*[A-Z])/", $pass)) {
            $passErr = "The string must contain at least 1 uppercase alphabetical character";
        } elseif (!preg_match("/^(?=.*[0-9])/", $pass)) {
            $passErr = "The string must contain at least 1 numeric character";
        } elseif (!preg_match("/^(?=.*[!@#$%^&*])/", $pass)) {
            $passErr = "The string must contain at least one special character";
        } elseif (!preg_match("/^(?=.{8,})/", $pass)) {
            $passErr = "The string must be eight characters or longer";
        }
    }
}

?>

<div id="loginCont">
    <h2>Вход</h2><br><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Имя: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error"> <?php echo $nameErr;?></span>
        <br><br>
        Пароль: <input type="text" name="pass" value="<?php echo $pass;?>">
        <span class="error"> <?php echo $passErr;?></span>
        <br><br>
        <input type="checkbox" name="check" value="remember"> Запомнить меня
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($nameErr)) {
            $_SESSION['uName'] = $name;
        }
        if ($globals->getPost('check')) {//!empty($_POST['check'])
            setcookie("uName", $name, time() +
                (365 * 24 * 60 * 60));
            setcookie("uPass", $pass, time() +
                (365 * 24 * 60 * 60));
        } else {
            if ($globals->getCookie('uName'))
            {
                setcookie("uName", "");
            }
            if ($globals->getCookie('uPass'))
            {
                setcookie("uPass", "");
            }
        }
        if (empty($passErr) & empty($nameErr))
            header("Refresh:0");
    } ?>
</div>
