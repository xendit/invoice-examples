<?php

    require $_SERVER['DOCUMENT_ROOT'].'/class/xenditapi.yalg.class.php';

    $objXendit = new XenditAPI();

    $errorMessage = '';

    if (!empty($_POST) && isset($_POST) && $_POST['amount'] >= 11000) {
        $external_id    = 'your_external_id';
        $payer_email    = 'your_email@your_domain.com';
        $description    = 'Your Description';
        $amount         = $_POST['amount'];

        $create_invoice = $objXendit->createInvoice($external_id, $amount, $payer_email, $description);

        if ($create_invoice['error_code'] == 'UNIQUE_ACCOUNT_NUMBER_UNAVAILABLE_ERROR') {
            $errorCode = 503;
            $errorMessage = '<div class="errorSettings">Error '.$errorCode.'<br> Whoops, looks like something went wrong. Please try again later.</div>';
        }
        else {
            $errorMessage = '';
        }

        $invoiceURL = $create_invoice['invoice_url'];
        header('Location: '.$invoiceURL);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>YALG</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
        <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">

        <style>
            .errorSettings {
                color: #a94442;
                text-align: center;
                border: 1px solid #ebccd1;
                border-radius: 5px;
                padding: 18px 0;
                background-color: #f2dede;
                margin: -40px 0 50px;
            }
        </style>
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <nav id="menu" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand page-scroll" href="#page-top">YALG</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#about" class="page-scroll">About</a></li>
                        <li><a href="#header" class="page-scroll">Donate</a></li>
                        <li><a href="#join_us" class="page-scroll">Join Us</a></li>
                        <li><a href="#footer" class="page-scroll">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <header id="header">
            <div class="intro">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="intro-text">
                                <?php echo $errorMessage; ?>
                                <h1>Young Adults Life Group</h1>
                                <p class="sub-intro-text">Community of young adults that are committed to supporting and praying for each other through each season of life and faith</p>

                                <div class="col-md-10 col-md-offset-1 text-center">
                                    <form id="donationForm" method="post" enctype="multipart/form-data" accept-charset="UTF-8" novalidate>
                                        <div class="row amount-textbox">
                                            <div class="form-group">
                                                <input type="number" min="11000" id="amount" name="amount" class="form-control" placeholder="Donation amount" required="required">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-custom btn-lg" onclick="diableButton(this);">Donate Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="about">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6 ">
                        <div class="about-img"><img src="img/about.jpg" class="img-responsive" alt=""></div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="about-text">
                            <h2>About Us</h2>
                            <hr>
                            <p>We are a bunch young adults passionate about God and our calling to be the salt and light where ever we are.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="join_us" class="text-center">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Join Us</h2>
                    <hr>
                    <p><b>Who:</b> Young adults</p>
                    <p><b>Where:</b> Senayan City Residences</p>
                    <p><b>When:</b> Tuesday 7pm till bedtime</p>
                    <p><b>Why:</b> We are committed to God and each other -</p>
                    <p>its just more fun to walk this faith journey together in a community</p>
                </div>
            </div>
        </div>

        <div id="footer">
            <div class="container text-center">
                <div class="section-title text-center">
                    <h2>Contact Us</h2>
                    <hr>
                </div>

                <div class="col-md-4">
                    <h3>Grace Liu Ishak</h3>
                    <div class="contact-item">
                        <p>For all your general needs</p>
                        <p>+62 817 771 226</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <h3>Willie Soedawa</h3>
                    <div class="contact-item">
                        <p>For logistical needs</p>
                        <p>+62 812 8790 0498 </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <h3>Moses Lo</h3>
                    <div class="contact-item">
                        <p>For donation matters</p>
                        <p>+62 812 8881 9734</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid text-center copyrights">
              <div class="col-md-8 col-md-offset-2">
                  <p>&copy; 2017 YALG. All rights reserved.
              </div>
            </div>
        </div>

        <script type="text/javascript">
            function diableButton(thisObj) {
                if ($('#amount').val() !== '' && $('#amount').val() > 11000 ) {
                    thisObj.form.submit();
                    thisObj.disabled = true;
                }
            }
        </script>

        <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        <script type="text/javascript" src="js/nivo-lightbox.js"></script>
        <script type="text/javascript" src="js/jquery.isotope.js"></script>
        <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
        <script type="text/javascript" src="js/donation.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
