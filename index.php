<!-- Form validation & reCaptcha V2 -->
<?php 
    if(isset($_POST['ContactButton'])) { // id submit button
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $privateKey = "6LctQpQcAAAAAO5Qh26e3yc3_7qBo9Ud2q-7x_fC"; // replace recaptcha privatekey
        $response = file_get_contents($url."?secret=".$privateKey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
        $data = json_decode($response);
        if (isset($data->success) AND $data->success==true) {
            $error = "";
            $successMsg = "";
            if ($_POST) {
                if (!$_POST['name']) {
                    $error .= "A name is required!<br>";
                }
                if ($_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
                    $error .= "The email is invalid!<br>";
                }
                if (!$_POST['email']) {
                    $error .= "An email address is required!<br>";
                }
                if (!$_POST['message']) {
                    $error .= "A message is required!<br>";
                }
                if ($error != "") {
                    $error = '<div class="alert alert-danger" role="alert"><strong>There is an error with your form!</strong><br>' . $error . '</div>';
                } else {
                    $emailTo = 'alertasistemas@exo.com.ar'; // replace e-mail
                    $subject = "New message from Company Corp. website form"; // replace website name
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $message = $_POST['message'];
                    $content = "Name: " . $name . "\nEmail: " . $email . "\nMessage: " . $message;
                    $headers = "From: $email \r\n";
                    $headers .= "Reply-To: $email \r\n";
                    if (mail($emailTo, $subject, $content, $headers)) {
                        $successMsg = '<div class="alert alert-success" role="alert">The message has successfully been sent. We will contact you ASAP!</div>';
                    } else {
                        $error = '<div class="alert alert-danger" role="alert">There was a problem sending your message, please try again later!</div>';
                    }
                }
            }
        } else {
            $captchaFail = '<div class="alert alert-danger" role="alert"><strong>There is an error with your form!</strong><br>reCaptcha Verification Failed, Please Try Again.</div>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Mercotrade Corp., your solution for international shipping. Purchasing agents and freight forwarders in the US. " />
        <meta name="author" content="Mercotrade Corp." />
        <title>Mercotrade Corp.</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version) -->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap) -->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- recaptcha -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body id="page-top">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Mercotrade Corp.</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead -->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">What is an <strong>export service</strong>?</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">If people think of anything when they hear the term “service export”, they might think of construction services on large foreign infrastructure projects... A service export is, very simply, any service provided by a resident in one country to people or companies from another.</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About -->
        <section class="page-section bg-primary" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Reliable and strategic partner</h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4">We are a company with extensive experience in international trade and knowledge regarding practices, regulations and opportunities. Our experience allows our clients to market products through effective and clear commercial transactions, having the possibility of using our structure and financial, administrative and commercial operations.</p>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services -->
        <section class="page-section" id="services" style="background-color: #e8ecef;">
            <div class="container">
                <h2 class="text-center mt-0">Creating perdurable business opportunities</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-thumbs-up text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Success</h3>
                            <p class="text-muted mb-0">Identify and promote competitive and efficient companies that fulfill their commitments, offer quality products and are interested in developing long term profitable objectives.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-chart-pie text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Analysis</h3>
                            <p class="text-muted mb-0">We provide market analysis by sector and type of product and trade related consultancy services.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-handshake text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Partners</h3>
                            <p class="text-muted mb-0">We are focused on providing operative, logistic, commercial and financial support, acting as a local strategic partner in each market.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-chess-queen text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Strategy</h3>
                            <p class="text-muted mb-0">Access to potential markets for purchasing, selling and distribution of products as well as investment opportunities and strategic alliances.
                            </p>
                        </div>
                    </div>
	            </div>
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-12 align-self-baseline">
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#contact">Contact Now!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact -->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Contact us</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Send us a message and we will get back as soon as possible.</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- CONTACT FORM --> <!-- index.php#id_section refresh page in same place after submit -->
                    <form method="POST" action="index.php#contact">
                    <div id="error"><?php echo $successMsg ?><?php echo $error ?><?php echo $captchaFail ?></div>
                    <div class="small text-center text-muted" style="padding-bottom:20px;">All fields are required.</div>
                        <div style="padding-bottom:20px;">
                            <label for="name">Your name:</label><!-- value php to keep values after submit / echo htmlentities. Vulnerability subjet. To prevent code write inside form's fields -->
                            <input type="text" name="name" id="name" class="form-control" value="<?php if(isset ($_POST['name'])) { echo htmlentities($_POST['name']); }?>" title="Complete with your name" required>
                        </div>
                        <div style="padding-bottom:20px;">
                            <label for="email">A contact email:</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php if(isset ($_POST['email'])) { echo htmlentities($_POST['email']); }?>" title="Complete with your email" required>
                        </div>
                        <div style="padding-bottom:20px;">
                            <label for="message">Send us your message:</label>
                            <textarea name="message" id="message" class="form-control" required></textarea>
                        </div>
                        <!-- replace recaptcha sitekey -->
                        <div class="g-recaptcha" data-sitekey="6LctQpQcAAAAAHLg7-69dpUv0TgMAerl_WpDf_eR"></div>
                        <input type="submit" class="btn btn-primary js-scroll-trigger" value="Send"  name="ContactButton" id="ContactButton" style="margin-top:10px;font-size:1.5em;">
                    </form>
                    <!-- CONTACT FORM -->
                </div>
            </div>
        </section>
        <!-- Footer -->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2021 - Mercotrade Corp.</div></div>
        </footer>
        <!-- Bootstrap core JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS -->
        <script src="js/scripts.js"></script>
    </body>
</html>
