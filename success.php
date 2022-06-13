<?php
 include_once "account/config/db.php";
 include 'account/modules/login.php';

    // instantiate database
    $database = new Database();
    $db = $database->connect();

    //instantiate user object
    $user = new User($db);
    if(!isset($_GET['data'])){
        header("location:https://ebankcouriers.com/failed.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="keywords" content=" E-bank Courier Services, Logistics, mailroom , warehousing , best courier service worlwide, global logistics company, ecommerce delivery, ecommerce courier service ,local shipment, international shipment, same day delivery , logistics support, Amazon delivery, delivery services, delivery service for ecommerce, ecommerce delivery in Globally , deal dey delivery, Global logistics company">
            
    <meta name="description" content=" E-bank Courier Services is a leading logistics and distribution services company established in 2009. We offer a wide array of express courier and logistic support solutions to our various customers">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta http-equiv="ImageToolbar" content="No">
    <meta http-equiv="content-language" content="en-US">
    <meta name="title" content=" E-bank Courier Services | Express Delivery, Courier &amp; Shipping Services | Worlwide">

    <meta property="og:type" content="Logistics and Courier Services">
    <meta property="og:title" content=" E-bank Courier Services | Express Delivery, Courier &amp; Shipping Services | Worlwide">
    <meta property="og:description" content=" E-bank Courier Services is a leading logistics and distribution services company established in 2009. We offer a wide array of express courier and logistic support solutions to our various customers">
    <meta name="keywords">
    <meta property="og:site_name" content=" E-bank Courier Services">
    <meta property="og:url" content="https://www.ebankcouriers.com/">
    <meta property="og:image" content="https://ebankcouriers.com/images/uscsbanner.jpg">
    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title> Track Shipment - E-bank Courier Services | Express 
	Delivery, Courier &amp; Shipping Services | Worlwide</title>
    <!-- LOAD CSS FILES -->
    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
    <header style="background:black">
        <div class="container">
            <span id="menu-btn"></span>
            <div class="row">
                <div class="col-md-3">
                    <div id="logo">
                        <div class="inner">
                                <a href="track.html">
                                    <img src="img/logo.png" alt="" class="logo-1">
                                    <img src="img/logo-2.png" alt="" class="logo-2">
                                </a>
                            <div id="google_translate_element"></div>
                            <script type="text/javascript">
                            function googleTranslateElementInit() {
                            new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                            }
                            </script>
                            <script type="text/javascript" src="translate_a/f.txt?cb=googleTranslateElementInit"></script>
                        </div>   
                    </div>
                </div>
                <div class="col-md-9">
                    <nav id="mainmenu-container" >
                        <ul id="mainmenu">
                            <li><a href="track.html">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="javascript:;">Services</a>
                                <ul>
                                    <li><a href="lcl-onsolidations.html"> LCL Consolidations</a></li>
                                    <li><a href="project-cargos.html">Project Cargos</a></li>
                                    <li><a href="coastal-domesticservice.html">Coastal And Domestic</a></li>
                                    <li><a href="custom-clearance.html">Custom Clearance</a></li>
                                    <li><a href="warehousing.html">Warehousing</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="javascript:;">Movers</a>
                                <ul>
                                    <li><a href="move-household-goods.html">Household Goods</a></li>
                                    <li><a href="ship-commercial-goods.html">Commercial Goods</a></li>
                                </ul>
                            </li>
                            <li><a href="track.html">Track</a></li>
                            <li class="has-children"><a href="javascript:;">Freight</a>
                                <ul>
                                    <li><a href="air-freight-carrier.html">Air Freight Carrier</a></li>
                                    <li><a href="ocean-freight-forwarding.html">Ocean Freight Forwarding</a></li>
                                    <li><a href="road-freight-forwarding.html">Road Freight Forwarding</a></li>
                                    <li><a href="soc-movements.html">SOC Movements</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="javascript:;">Customs</a>
                                <ul>
                                    <li><a href="export-import.html">Export - Import</a></li>
                                    <li><a href="importers-logistics-rep.html">Importer's Rep</a></li>
                                </ul>
                            </li>
                            <li><a href="logistics.html">Logistics</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>                          
            </div>
        </div>
    </header>
   <?php $d =  $user->singleClientTrack('tracking',$_GET['data']);?>

    <!-- subheader begin -->
    <section id="subheader" class="page-about no-bottom" data-stellar-background-ratio="0.5">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="font-size:25px;padding-bottom:10px;">Your Tracking Information</h1>      
                        <p style="font-size:15px">Our online tracking  System is the fastest way to find out where your shipment is. No need to call Customer Service when we can offer you real-time details.</p>
                        <div class="small-border wow flipInY" data-wow-delay=".8s" data-wow-duration=".8s"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <?php if($d != "not found"):?>
        <div class="container mt-3">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mytable">
                    <tr style="background:black;color:white;" class="text-light">
                        <td style="color:black;" colspan="2">SHIPPING STATUS</td>
                    </tr>
                    <tr>
                        <td>Sender's Name</td>
                        <td><strong><?php echo $d->sender?></strong></td>
                    </tr>
                    <tr>
                        <td>Sender's Country</td>
                        <td><strong><?php echo $d->sender_country?></strong></td>
                    </tr>
                    <tr>
                        <td>Sender's Address</td>
                        <td><strong><?php echo $d->sender_address?></strong></td>
                    </tr>
                    <tr>
                        <td>Receiver Name</td>
                        <td><strong><?php echo $d->receiver_name?></strong></td>
                    </tr>
                    <tr>
                        <td>Package Content</td>
                        <td><strong><?php echo $d->package_content?></strong></td>
                    </tr>
                    <tr>
                        <td>Dispatch From</td>
                        <td><strong><?php echo $d->dispatch_form?></strong></td>
                    </tr>
                    <tr>
                        <td>Delivery Country</td>
                        <td><strong><?php echo $d->delivery_country?></strong></td>
                    </tr>
                    <tr>
                        <td>Delivery Type</td>
                        <td><strong><?php echo $d->delivery_type?></strong></td>
                    </tr>
                    <tr>
                        <td>Dispatch Date</td>
                        <td><strong><?php echo $d->dispatch_date?></strong></td>
                    </tr>
                
                    <tr>
                        <td>Arrival Date</td>
                        <td><strong><?php echo $d->arrival_date?></strong></td>
                    </tr>
                
                </table>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped mytable">
                    <tr style="background:black;">
                        <td style="color:black;" colspan="3">SHIPPING HISTORY</td>
                    </tr>
                    <?php  $c = $user->getShippingHistory('shipping_history',$_GET['data']);?>
                    <tr>
                        <th>Details</th>
                        <th>Location</th>
                    </tr>
                    <?php foreach($c as $key => $val):?>
                    <tr>
                        <td><strong><?php echo $val->details?></strong></td>
                        <td><strong><?php echo $val->location?></strong></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>  

            <p>Delivery Progress</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $d->progress?>"
                aria-valuemin="0" aria-valuemax="100" style='width:<?php echo $d->progress?>%'>
                    <?php echo $d->progress?>%
                </div>
            </div>
            <p><b style="text-weight:bold">Note :</b>This item may take longer to arrive than usual. Limited flights have caused delays for some international deliveries</p>
        </div>
    <?php endif;?>

<!-- LOAD JS FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/ender.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/jquery.plugin.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.stellar.js"></script>
    <script src="js/typed.js"></script>
    <script src="js/jquery.scrollto.js"></script>
    <script src="js/custom.js"></script>
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Quick Links</h3>
                    <div class="tiny-border"></div>
                    <ul>
                        <li><a href="track.html">Home</a></li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="logistics.html">Logistics</a></li>
                        <li><a href="contact-us.html">Contact</a></li>
                        <li><a href="export-import.html">Export - Import</a></li>
                        <li><a href="importers-logistics-rep.html">Importer's Rep</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Our Services</h3>
                    <div class="tiny-border"></div>
                    <ul>
                        <li><a href="lcl-onsolidations.html"> LCL Consolidations</a></li>
                        <li><a href="project-cargos.html">Project Cargos</a></li>
                        <li><a href="coastal-domesticservice.html">Coastal And Domestic</a></li>
                        <li><a href="custom-clearance.html">Custom Clearance</a></li>
                        <li><a href="warehousing.html">Warehousing</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Freight</h3>
                    <div class="tiny-border"></div>
                    <ul>
                        <li><a href="ocean-freight-forwarding.html">Ocean Freight Forwarding</a></li>
                        <li><a href="road-freight-forwarding.html">Road Freight Forwarding</a></li>
                        <li><a href="soc-movements.html">SOC Movements</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="spacer-single"></div>
                    &copy; Copyright &copy; 2021 E-bank Courier Services
                </div>
            </div>
        </div>
    </footer>      
    <script src="js/jquery.bpopups2.min.js"></script>


</body>

</html>