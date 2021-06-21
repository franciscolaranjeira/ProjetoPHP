<?php include "../server/configC.php"; ?>

<?php

$result = "";
$line = "";

$select = "SELECT projects.* FROM projects INNER JOIN courses ON projects.IDmodule = courses.ID WHERE courses.ID = ?";

if ($stmt = mysqli_prepare($connect, $select)) {

    mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
    }
} else {
    echo "Something is wrong, try later!";
}



mysqli_stmt_close($stmt);
mysqli_close($connect);

?>

<!DOCTYPE html>

<html lang="eng">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/projects.css">
    <title> Projects </title>
</head>

<body>
    <div id="projects">
        <div id="box">
            <div id="title">
                <h1>Projects<h1>
            </div>
            <div id="addp">
                <?php

                echo "<a href='addProject1.php?id=" . $_GET["id"] . "'>add Project</a>";

                ?>
            </div>
            <div>
                <?php

                if ($result) {
                    if (mysqli_num_rows($result) >= 0) {

                        echo "<table id='table'>";
                        echo "<tr id='tr'>";
                        echo "<th>Module</th>";
                        echo "<th>Projects</th>";
                        echo "<th>Edit</th>";
                        echo "<th>Delete</th>";
                        echo "</tr>";


                        while ($line = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $line['module'] . "</td>";
                            echo "<td class='project-row'>" . $line['project'] . "</td>";
                            echo "<td><a href='editProjects.php?id=" . $line["IDp"] . "'>Edit</td>";
                            echo "<td><a href='deleteProjects.php?id=" . $line["IDp"] . "'>Delete</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Nothing to Show!";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <aside id="nav-bot">
        <div id="nav-bot-solo">
            <div id="nav-foto"><img src="../foto/foto.png"; height=100px; width=100px; /></div>
            <ul id="nav-list">
                <li id="nav-list-solo"><a id="nav-link-list" href="../index.php">HOME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="../aboutme.php">ABOUT ME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="../modules.php">MODULES</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="../contact.php">CONTACT ME</a></li>
                <li id="nav-list-solo"><a id="nav-link-list" href="../admin.php">ADMIN</a></li>
            </ul>
        </div>
        <div id="nav-social">
            <div id="facebook">
                <a href="https://pt-pt.facebook.com" target="_blank"><img src="../vectors/facebooklogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="instagram">
                <a href="https://www.instagram.com" target="_blank"><img src="../vectors/instagramlogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="twitter">
                <a href="https://twitter.com/?lang=pt" target="_blank"><img src="../vectors/twitterlogo.png" ; height=30px; width=30px; /></a>
            </div>
            <div id="linkedin">
                <a href="https://pt.linkedin.com" target="_blank"><img src="../vectors/linkedinlogo.png" ; height=30px; width=30px; /></a>
            </div>
            
        </div>
        <div id="nav-contact"><h6 id="nav-contact-solo">francisco.laranjeira@hotmail.com <br> 966333555 </h6></div>
    </aside>
</body>

</html>