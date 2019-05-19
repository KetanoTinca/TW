<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Web Application that eases the management of licence or master's degree thesis.">
        <meta name="keywords" content="web application, faculty, thesis, licence, education">
        <meta name="author" content="Birleanu Andrei-Cristian, Mihai Elena Sorina, Tinca Ketano-Leonard, Velicescu Laura">
        <title>AcaTisM | Profile </title>
        <link rel="stylesheet" href="../CSS/settings.css">
    </head>
    <body>
        
            <?php include 'navbar.php';?>

       

            <?php include 'user.description.php';?>
        <section id="settings">
            <div class="container">
                <div class="box">
                    <h1>My Account Settings</h1>
                </div>
                <div class="box">
                    <h1 style="border-bottom: 2px solid rgb(171, 213, 240);">Password Change</h1>

                    <form class="password">
                        <div class="grid-container">
                            <div class="grid-item">
                                <label for="Oldpass">Old password</label>
                                <br>
                                <input id="Oldpass" type="password" value="123456789041241">
                            </div>
                            <div class="grid-item">
                                <label for="newpass1">New password*</label>
                                <br>
                                <input id="newpass1" type="password" placeholder="New password...">
                            </div>
                            <div class="grid-item">
                                <label for="newpass2">Confirm password*</label>
                                <br>
                                <input id="newpass2" type="password" placeholder="Confirm password...">
                            </div>  
                                     
                        </div>
                       
                        
                        
                        <input type="submit" value="Change Password">
                    </form>

                </div>
                <div class="box">
                    <h1 style="border-bottom: 2px solid rgb(171, 213, 240);">  Basic Profile</h1>
                    <div class="twoflex">
                        <div class="photoside">
                                <button class="photo-shape" onclick="location.href='#'">
                                        <img  class="profile_pic" src="../img/profile.png" alt="Profile" >
                                        <p class="change_profile">Change</p>
                                    </button>
                            <button type="button" class="browse" >Browse...</button>
                        </div>
                    
                           <form class="otherinfo">
                                <label for="Adress">Adress</label>
                               <input id="Adress" type="text" placeholder="Your address...">
                               <label for="Street">Street</label>
                               <input id="Street" type="text" placeholder="Your street...">
                               <label for="City">City</label>
                               <input id= "City" type="text" placeholder="Your city...">
                               <label for="country">Country</label>
                                <select id="country" name="country">
                                <option value="australia">Australia</option>
                                <option value="canada">Canada</option>
                                <option value="usa">USA</option>
                                <option value="australia">Romania</option>
                                <option value="canada">Germany</option>
                                <option value="usa">France</option>
                                <option value="australia">Hungary</option>
                                <option value="canada">Spain</option>
                                <option value="usa">Italy</option>
                                </select>
                                <label for="zip">Zip Code</label>
                               <input id="zip" type="tel" placeholder="Your zip...">
                               <label for="phone">Phone</label>
                               <input id="phone" type="tel" placeholder="Your mobilephone...">
                               <label for="fname">First Name</label>
                               <input id="fname" type="text" placeholder="First Name...">
                               <label for="sname">Second Name</label>
                               <input id="sname" type="text" placeholder="Second Name...">
                               <label for="email">Email</label>
                               <input id= "email" type="text" placeholder="Your Email...">
                               <input type="submit" value="Save">
                           </form> 
                    </div>
                </div>
            </div>

            
        </section>
          
       

        <footer>
            <p>AcaTisM App, Copyright &copy; 2019</p>
        </footer>
    </body>
</html>