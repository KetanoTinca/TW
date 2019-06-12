<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web Application that eases the management of licence or master's degree thesis.">
    <meta name="keywords" content="web application, faculty, thesis, licence, education">
    <meta name="author" content="Birleanu Andrei-Cristian, Mihai Elena Sorina, Tinca Ketano-Leonard, Velicescu Laura">
    <title>AcaTisM | Profile </title>
    <link rel="stylesheet" href="../CSS/style_profile.css">

    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("hidden-list");
            var btnText = document.getElementById("show-more");

            if (dots.style.display === "none") {
                dots.style.display = "inline";

                moreText.style.display = "none";
            } else {
                dots.style.display = "none";

                moreText.style.display = "block";
            }
        }
    </script>


</head>
<body>
<?php include 'navbar.php';?>

<?php include 'user.description.php';?>

<section id="activity">


    <form method="post" action="../controller/addThemes.php" >

        <label for="themeTitle">Theme Title</label>
        <input type="text" name="themeTitle" id ="themeTitle">
        <label>Theme Description</label>
        <textarea id="themeDescription" name="themeDescription" required placeholder="Describe your Theme" rows="5" cols="60"></textarea>

        <label>Academic Year</label>
        <?php
        echo "<select id=\"academicYear\" name=\"academicYear\">";
        $currentYear = date("Y");
        $count = 6;
        $string = ($currentYear-1) . "-" . $currentYear;
        while($count){
            echo "<option value=\"$string\">$string</option>";
            $currentYear=$currentYear-1;
            $string = ($currentYear-1) . "-" . $currentYear;
            $count=$count-1;

        }

        ?>
        <input id="addTheme" tabindex="0" type="submit" class="button button-green" value="Add this Theme">
    </form>

</section>

<footer>
    <p class="special-footer">AcaTisM App, Copyright &copy; 2019</p>
</footer>
</body>

</html>
