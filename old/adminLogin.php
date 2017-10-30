
<!DOCTYPE HTML>
<html>
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-loading">

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Main -->
                    <section id="login-main" style="min-width: 47em">
                    <div class="header-w3l">
            <h1>Knowtify</h1>
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-content-agile">
            <div class="sub-main-w3">   
                <h2>Sign In</h2>
                <form action="php/login.php" method="post">

                    <div class="navbar-right social-icons"> 
                        <a href="#" class="one-w3ls" ><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                        <a href="#" class="two-w3ls" ><i class="fa fa-google-plus" aria-hidden="true"></i>Google+</a>
                        <div class="clear"></div>
                    </div>

                    <div class="icon1">
                        <input placeholder="Email" name="username" type="text" required="" style="color: black;">
                    </div>
                    
                    <div class="icon2">
                        <input  placeholder="Password" name="password" type="password" required="" style="color: black;">
                    </div>
                    <label class="anim">

                    </label> 
                        <div class="clear"></div>
                    <input type="submit" value="Sign in">
                    <input type="button" value="Sign up" onclick="window.location='register.php';">
                </form>
            </div>
        </div>
        <!--//main-->
        <!--footer-->
        <div class="footer">
            <p>&copy; 2017 Knowtify</p>
        </div>
        <!--//footer-->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery.vide.min.js"></script>
<!-- //js -->
                        <footer>
                            <ul class="icons">
                        <!--        <li><a href="#" class="fa-twitter">Twitter</a></li>
                                <li><a href="#" class="fa-instagram">Instagram</a></li>
                                <li><a href="#" class="fa-facebook">Facebook</a></li> -->
                            </ul>
                        </footer>
                    </section>
                <!-- Footer -->
                    <footer id="footer">
                        <ul class="copyright">
                            
                        </ul>
                    </footer>

            </div>
            <script>
                if ('addEventListener' in window) {
                    window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
                    document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
                }
            </script>
    </body>
</html>