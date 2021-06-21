<?php include "form/formF.php"; ?>
<?php include("server/configC.php"); ?>

<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mailFrom = $_POST["email"];
    $coment = $_POST["coment"];


    $mailto = "user.user@user.com";
    $headers = "From: " . $mailFrom;
    $txt = "You have received ana email from " . $name . ".\n\n" . $coment;

    mail($mailto, $phone, $txt, $headers);
    header("Location:contact.php");
}   

?>


<!DOCTYPE html>
<html lang="eng">

<head>

    <title>FranciscoLaranjeira</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
    <!-- PAGINA INICIAL-->
    <div id="contact">
        <div id="box-contact">
            <div id="box-contact-tex">
                <h1>Contact me</h1>
            </div>
            <div id="form">
                <form method="post" action="" style="text-align: center;">
                    <div>
                            <div id="form-contact">
                                Full Name:
                                <br>
                                <input type="text" name="name" placeholder="Full name">
                                <br>

                                Phone Number:
                                <br>
                                <input type="text" name="phone" placeholder="Phone">
                                <br>
                                Email:
                                <br>
                                <input type="text" name="email" placeholder="Email">
                                <br>
                            </div>
                            <div id="form-coments">
                                Comments:
                                <br><br>
                                <textarea name="coment" rows="20" cols="60"></textarea>
                                <br>
                            </div>
                    </div>
                    <div>
                        <input id="submit" type="submit" name="submit" value="Submit">  
                    </div>
                </form>
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