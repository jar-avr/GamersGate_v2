<?php
session_start();
class Globals {
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Globals();
        }
        return self::$instance;
    }

    public static function getPost($name) {
        return $_POST[$name] ?? false;
    }

    public static function getSession($name) {
        return $_SESSION[$name] ?? false;
    }

    public static function getCookie($name) {
        return $_COOKIE[$name] ?? false;
    }
}
$globals = Globals::getInstance();
$style = $rstyle = '';

if ($globals->getSession('uName')) {
    $style = "style='display:none;'";
} else {
    $rstyle = "style='display:none;'";
}

if ($globals->getPost('isLoggedIn') && $_POST['isLoggedIn'] == 'true') {//!empty($_POST['isLoggedIn'])
    session_destroy();
    session_write_close();
    header('Refresh:0');
    $_POST['isLoggedIn'] = false;
}
?>
<div id="innerMobMenu" class="dropdown-content">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <form method="post" class="ov-content">
        <div id='login' style="font-size: 30px;">
            <?php if ($globals->getSession('uName')) {//isset($_SESSION['uName'])
                echo 'Hi, ' . $_SESSION['uName'];}
            ?>
        </div>
        <button name="isLoggedIn" class="menuButton" value='true' <?php echo $rstyle;?> id="login">Выйти</button>
    </form>
    <form method="get" class="ov-content">
        <button name="page" class="menuButton" id="login" value="Login" <?php echo $style;?>>Войти</button>
        <button name="page" class="menuButton" value="Landing">Главное</button>
        <button name="page" class="menuButton" value="Container">Поиск игр</button>
        <button name="page" class="menuButton">Скидки</button>
    </form>
</div>
<div class="menu">
    <div class="innerMenu">
        <div class="logo">
            <form method="get">
                <button name="page" value="Landing" class="menuButton">
                    <img src="media/logo.png" alt="Logo">
                </button>
            </form>
        </div>
        <div>
            <form method="get" id="references">
                <button name="page" value="Landing" class="menuButton">Главное</button>
                <button name="page" value="Container" class="menuButton">Поиск игр</button>
                <button name="page" class="menuButton">Скидки</button>
            </form>
        </div>
        <div id="menuIcon" class="menuIcon" onclick="openNav()">
            <img src="media/menu.svg" alt="Menu_svg">
        </div>
        <div class="email" id="upperEmail">
            <div class="envelope">
                <img src="media/envelope.svg" alt="Envelope_svg">
            </div>
            <div class="emailText">
                <div>Свяжитесь с нами:</div>
                <div>GamersGate@gmail.com</div>
            </div>
        </div>
        <form class="search">
            <button type="submit" id="searchButton">Поиск</button>
            <input type="text">
        </form>
    </div>
    <div id='loggedIn'>
        <?php if ($globals->getSession('uName')) {
            echo 'Hi, ' . $_SESSION['uName'];}
            ?>
    </div>
    <form method="post">
        <button name="isLoggedIn" class="menuButton" value="true" <?php echo $rstyle;?> id="logOut">Выйти</button>
    </form>
    <form method="get" <?php echo $style;?>>
        <button name="page" value="Login" class="login">
            <img src="media/login.png" alt="login_button">
        </button>
    </form>
</div>
