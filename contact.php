<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="shortcut icon" href="Images/pm2.ico"/>
    <title>Contact</title>
</head>
<body>

    <nav>
        <img src="Images/UY1.png">
        <div class="onglets">
            <a href="accueil.php"><p class="link">Home&nbsp;&nbsp;<i class="fas fa-home"></i></p></a>
            <a href="contact.php"><p class="link">Contact&nbsp;&nbsp;<i class="fas fa-envelope"></i></p></a>
            <a href="insc_con.php"><p class="link">Logout&nbsp;&nbsp;<i class="fas fa-arrow-right-from-bracket"></i></p></a>
        </div>
    </nav>

    <div class="container">
        <span class="big-circle"></span>
        <img src="Images/UY1.png" class="square">
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Let's get in touch</h3>
                <p class="text">&nbsp;&nbsp;&nbsp;&nbsp;Through this contact form, you have the possibility to contact the Head of Department. He will then be able to decide if it is necessary to modify the agreed schedule !</p>
                <div class="info">
                    <div class="information">
                        <img src="Images/log_si/map-location-dot-solid.svg" class="icon">
                        <p>Computer Science Department, top floor.</p>
                    </div>
                    <div class="information">
                        <img src="Images/log_si/envelope-solid.svg" class="icon">
                        <p>prenom.nom@facsciences.com</p>
                    </div>
                    <div class="information">
                        <img src="Images/log_si/phone-volume-solid.svg" class="icon">
                        <p>(+237) 6XX-XXX-XXX</p>
                    </div>
                </div>
                <!--    
                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>-->

            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>


                <form action="contact.html">
                    <h3 class="title">Contact Us</h3>
                    <div class="input-container ">
                        <input type="text" name="name" class="input">
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input">
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" class="input">
                        <label for="">Phone</label>
                        <span>Phone</span>
                    </div>
                    <div class="input-container textarea">
                        <textarea name="message" class="input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <a href="kamelapierrick@gmail.com"><input type="submit" value="Send" class="btn"></a>
                </form>
            </div>
        </div>
    </div>
    <script src="js/contact.js"></script>
</body>
</html>