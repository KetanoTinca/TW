<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Web Application that eases the management of licence or master's degree thesis.">
    <meta name="keywords" content="web application, faculty, thesis, licence, education">
    <meta name="author" content="Birleanu Andrei-Cristian, Mihai Elena Sorina, Tinca Ketano-Leonard, Velicescu Laura">
    <title>AcaTisM | Apply </title>
    <link rel="stylesheet" href="../CSS/form_style.css">
</head>

<body>
    <div id="surface">
    <?php include 'navbar.php';?>
        <section id="form_section">
            <div id="form_description">
                <h2>Application Form</h2>
                <p>Complete this form in order to request guidance from a teacher!</p>
            </div>
            <div id="form">
                <form method="POST">
                    <fieldset>
                        <legend id="personal_info">Personal Information</legend>
                        First Name: <br>
                        <input type="text" name="firstname" placeholder="Your First Name"><br>
                        Last Name: <br>
                        <input type="text" name="lastname" placeholder="Your Last Name"><br>
                        Age: <br>
                        <input type="number" name="age"><br>
                    </fieldset>

                    <fieldset>
                        <legend id="academic_info">Academic Information</legend>
                        Year of Study: <br>
                        <input type="radio" name="yearOfStudy" value="BSc 2nd"> BSc 2nd Year <br>
                        <input type="radio" name="yearOfStudy" value="BSc 3rd"> BSc 3rd Year <br>
                        <input type="radio" name="yearOfStudy" value="MSc 1st"> MSc 1st Year <br>
                        <input type="radio" name="yearOfStudy" value="MSc 2nd"> MSc 2nd Year <br>
                        Average grade for the last completed year of study <br>
                        <input type="number" name="grade" min="1" max="10"> <br>
                        Average grade for the Data Structures course <br>
                        <input type="number" name="grade" min="1" max="10"> <br>
                        Average grade for the Oriented-Object Programming course <br>
                        <input type="number" name="grade" min="1" max="10"> <br>
                        Average grade for the Computer Networks course <br>
                        <input type="number" name="grade" min="1" max="10"> <br>
                        Average grade for the Web Technologies course <br>
                        <input type="number" name="grade" min="1" max="10"> <br>

                    </fieldset>

                    <div id=submit>
                        <input type="submit">
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>

</html>