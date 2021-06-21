<?php include "server\configC.php"; ?>
<?php include "form/formF.php"; ?>
<?php

//valor do form

if (isset($_POST['user'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];


    //query

    $sql = "SELECT * FROM loginusers WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connect, $sql);
    $line = mysqli_fetch_array($result);

    if ($line["username"] == $username && $line["password"] == $password) {
        header('Location: http://localhost/phpmyadmin/');
    } else {
        //coloca pop up de erro de credenciais
        echo "<script> alert('Check your Credentials')</script>";
        //faz voltar a pagina
        echo "<script> location.replace('admin.php')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="eng">

<head>

    <title>FranciscoLaranjeira</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/admin.css">

</head>

<body>
    <!-- PAGINA INICIAL-->
    <div class="admin">
        <div id="box-admin">
            <div id="box-admin-box">
                <div id="box-admi-form">
                    <form action="" method="POST">

                        <label>Username:</label>
                        <input type="text" id="user" name="user">

                        <p>

                            <label>Password:</label>
                            <input type="password" id="pass" name="pass">

                        <p>

                            <input type="submit" id="submit" name="submit" value="Login">
                    </form>

                    <div id="create-account">
                        <a href="login/createAccount.php">Create New Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MENU LADO DIREITO-->
    <aside id="nav-bot">
        <div id="nav-bot-solo">
            <div id="nav-foto"><img src="foto\foto.png"; height=100px; width=100px; /></div>
            <ul id="nav-list">
                <li id="nav-list-solo"><a id="nav-link-list" href="index.php">HOME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="aboutme.php">ABOUT ME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="modules.php">MODULES</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="contact.php">CONTACT ME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="admin.php">ADMIN</a></li>
            </ul>
        </div>
        <div id="nav-social">
            <div id="facebook">
                <a href="https://pt-pt.facebook.com" target="_blank"><img src="vectors/facebooklogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="instagram">
                <a href="https://www.instagram.com" target="_blank"><img src="vectors/instagramlogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="twitter">
                <a href="https://twitter.com/?lang=pt" target="_blank"><img src="vectors/twitterlogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="linkedin">
                <a href="https://pt.linkedin.com" target="_blank"><img src="vectors/linkedinlogo.png" ; height=30px; width=30px; /></a>
            </div>
            
        </div>
        <div id="nav-contact"><h6 id="nav-contact-solo">francisco.laranjeira@hotmail.com <br> 966333555 </h6></div>
    </aside>

</body>

</html>