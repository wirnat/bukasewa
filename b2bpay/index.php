<?php 

require_once('config/config.php');

?>
<!DOCTYPE html>
<html>
<head>
  <title>Yodi Comprof</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.8/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="floatingtabel.css">
  <link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="footer.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://www.b2bpay.co/sites/default/files/advagg_css/css__JF72-JQh0pT8PCfsPpNgW_j4pRBJR0OFAbQzXsu4srU__TOX5acnopNgQO8TZbqpnmxscatI8_LGgSENujs-mIF0__5U6er-8E0nGIFKehAv486K3YInAl1OUQBiPNKi1eJUw.css" media="all" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/fontawesome.min.css"></link>
<script
type="text/javascript"
src="https://use.fontawesome.com/releases/v5.10.2/js/conflict-detection.js">
</script>
<style>
section, footer {
    padding-top: 50px;
    padding-bottom: 13rem;
}

.swal2-popup {
  font-size: 1.6rem !important;
}
.social-list li{
  margin: 10px;
}
table td {
   font-size: 14px;
    font-weight: 200;
}
#negara{
  height: auto;
}
.btn{
  border-radius:0px;
}
.btn1 {

  border: 2px solid black;
  background-color: white;
  color: black;
  font-size: 14px;
  width: 17%;
  height : 20%;

}

/* The sticky class is added to the header with JS when it reaches its scroll position */
.sticky {
  position: sticky;
  top: 0;
}

/* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */
.sticky + .content {
  padding-top: 102px;
}
.clicked{
    background: #ff9800;
    color: white;
    border-color: LightGray;
}

.btn2 {

  border: 2px solid black;
  background-color: white;
  color: black;
  font-size: 10px;
  width: 20px;
  height : 20%;

}


/* Orange */
.warning {
  border-color: LightGray;
  color: #0078C1;
}

.warning:hover {
  background: #ff9800;
  color: white;
}


.btn2 {

  border: 2px solid black;
  background-color: white;
  color: black;
  font-size: 10px;
  width: 17%;
  height : 17%

}


/* Orange */
.warning {
  border-color: LightGray;
  color: #0078C1;
}

.warning:hover {
  background: #ff9800;
  color: white;
}

parison {
  max-width:940px;
  margin:0 auto;
  font:13px/1.4 "Helvetica Neue",Helvetica,Arial,sans-serif;
  text-align:center;
  padding:10px;
}

.comparison table {
  border-collapse: collapse;
  border-spacing: 0;
  table-layout: fixed;
  border-bottom:1px solid #CCC;
}

.comparison td, .comparison th {
  border-right:1px solid #fff;
  empty-cells: show;
  padding:10px;
}

.compare-heading {
  font-size:18px;
  font-weight:bold !important;
  border-bottom:0 !important;
  padding-top:10px !important;
}

.comparison tbody tr:nth-child(odd) {
  display:none;
}

.comparison .compare-row {
  background:#black;
}

.comparison .tickblue {
  color:green;
}

.comparison .tickgreen {
  color:#009E2C;
}

.comparison .tickred {
  color:#FF0080;
}

.comparison th {
  font-weight:normal;
  padding:0;
  border-bottom:1px solid #CCC;
}

.comparison tr td:first-child {
  text-align:left;
}
  
.comparison .qbse, .comparison .qbo, .comparison .tl {
  color:#FFF;
  padding:10px;
  font-size:14px;
  border-right:1px solid #CCC;
  border-bottom:0;
}

.comparison .tl2 {
  border-right:0;
}

.comparison .qbse {
  background:#0078C1;
  border-top-left-radius: 3px;
  border-left:0px;
}



.comparison .qbo {
  background:#FFA500;
  border-top-right-radius: 3px;
}

.comparison .price-info {
  padding:5px 15px 15px 15px;
}

.comparison .price-was {
  color:#999;
  text-decoration: line-through;
}

.comparison .price-now, .comparison .price-now span {
  color:#ff5406;
}

.comparison .price-now span {
  font-size:32px;
}

.comparison .price-small {
    font-size: 18px !important;
    position: relative;
    top: -11px;
    left: 2px;
}

.comparison .price-buy {
  background:#ff5406;
  padding:10px 20px;
  font-size:12px;
  display:inline-block;
  color:#FFF;
  text-decoration:none;
  border-radius:3px;
  text-transform:uppercase;
  margin:5px 0 10px 0;
}

.comparison .price-try {
  font-size:12px;
}

.comparison .price-try a {
  color:#202020;
}

@media (max-width: 767px) {
    
  .comparison td:first-child, .comparison th:first-child {
    display: none;
  }
  .comparison tbody tr:nth-child(odd) {
    display:table-row;
    background:#F7F7F7;
  }
  .comparison .row {
    background:#FFF;
  }
  .comparison td, .comparison th {
    border:1px solid #CCC;
  }
  .price-info {
  border-top:0 !important;
  
}
  
}

@media (max-width: 639px) {
  
  .comparison .price-buy {
    padding:5px 10px;
  }
  .comparison td, .comparison th {
    padding:10px 5px;
  }
  .comparison .hide-mobile {
    display:none;
  }
  .comparison .price-now span {
  font-size:16px;
}

.comparison .price-small {
    font-size: 16px !important;
    top: 0;
    left: 0;
}
  .comparison .qbse, .comparison .qbo {
    font-size:12px;
    padding:10px 10px;
  }
  .comparison .price-buy {
    margin-top:10px;
  }
  .compare-heading {
  font-size:13px;
}
}

.dropbtn {
  background-color: white;
  color: #EEE;
  padding: 16px;
  font-size: 16px;
  cursor: pointer;
  border-top : 0.5px;
  border-right : 0.5px;
  border-left : 0.5px;
  border-color : blue;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: white;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
      
</head>
<body>
    

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark shadow-none" style=" background-color: white; z-index:100; margin-top : -10px;">
  <!-- Navbar brand -->
  <div class="container-fluid">
  <div style="width:12%;margin-right:10px">
  <img style="margin:10px" src="https://www.b2bpay.co/sites/all/themes/forest/img/b2b-dark-small.png" >
  </div>
  <a class="navbar-brand" href="#" style="color : black; font-size: 12px; ">ABOUT</a>
  <a class="navbar-brand" href="#" style="color : black; font-size: 12px;">INDUSTRIES</a>
  <a class="navbar-brand" href="#" style="color : black; font-size: 12px; ">LEARNING CENTER</a>
  <a class="navbar-brand" href="#" style="color : black; font-size: 12px;">SUPPORT</a>
  <button type="button" class="btn btn-success" style="font-size: 10px; height: 40px;">GET STARTED</button>
    <!-- <label style="margin-top: 6px;">
      <input class="checkmark" type="checkbox" checked="unchecked">
      <span  style="margin-left:5px">English</span>
      <div class="md-form my-0" style="margin-left: 40px; margin-top: 0px;"></div>
    </label> -->

    <form class="navbar-form navbar-left" action="/action_page.php">
      <div style="width:80%" class="input-group">
        <input style="height: 40px" type="text" class="form-control" placeholder="Search...">
        <div class="input-group-btn">
          <button style="height: 40px;margin-bottom: 0px;margin-top: 0px;" class="btn btn-default" type="submit">
            <img style="filter: brightness(10);width:15px;margin-bottom:50%" src="image/mysearch.png">
          </button>
        </div>
      </div>
    </form>
  <!-- Collapsible content -->
  </div>

</nav>




<!--/.Navbar-->
<div class="container" style="margin-top:30px">
<div class="comparison">
        <div >    
            <h3 style="color: #0078C1">Compare our products and pricing </h3> 
 <div style="  margin-top: 20px;">
        <h6 style=" color: #0078C1;"> <b>Select the country where your business is registered</b></h6>
        </div>        </div>
        
        
  <center>
          <div style="margin-top:20px;    width: 500px; " class="input-group">
            <input name="what" id="what" style="margin-right: 20px;border-radius: 50px;" type="text" class="form-control" placeholder="Search your Country"> 
          </div>
       
</center></br></br>
    
    </h6>
        <div id="industry">
        <h6 style="color: #0078C1"><b>Select Your Industry</b>
            <div style="margin-top: 20px;">
                <button onclick="ecommerce('b1')" id='b1' class="btn1 xx warning " style="border-top-left-radius: 5px; border-bottom-left-radius : 5px;">E-commerce</button>
            <button onclick="ecommerce('b2')" id='b2' class="btn1 xx warning" style="margin-left :-4px">IT Service</button>
            <button onclick="ecommerce('b3')" id='b3' class="btn1 xx warning" style="margin-left :-4px">Offshore Companies</button>
                <button onclick="ecommerce('b4')" id='b4' class="btn1 xx warning" style="margin-left :-4px">New Businesses</button></a>
            <button onclick="ecommerce('b5')" id='b5' class="btn1 xx warning" style="margin-left :-4px; border-top-right-radius : 5px; border-bottom-right-radius: 5px;">Consulting Service</button>
            </div>
            
            <div style="margin-top: 5px; ">
            <button  onclick="ecommerce('b6')" id='b6' class="btn1 xx warning" style="border-top-left-radius: 5px; border-bottom-left-radius : 5px; width: 140px">Startups</button>
            <button  onclick="ecommerce('b7')" id='b7' class="btn1 xx warning" style="margin-left :-4px">Travel Agencies</button>
            <button  onclick="ecommerce('b8')" id='b8' class="btn1 xx warning" style="margin-left :-4px;">B2B/Manufacturing</button>
          <button  onclick="ecommerce('b10')" id='b10' class="btn1 xx warning" style="margin-left :-4px; width: 200px">Forex/CFD/Gambling    </button>
            <button  onclick="ecommerce('b11')" id='b11' class="btn1 xx warning" style="margin-left :-4px; border-top-right-radius : 5px; border-bottom-right-radius: 5px;  width: 130px">Blockchain</button>

            </div>
        </div>
                  <button onclick="calculate()"  style="margin-top: 50px;border-radius: 50px;" class="btn btn-success" >Calculate Price</button>

<div id="mycontent"  style="display:none; margin-top:40px;">
  <table id="tbfix" style="margin-bottom: 0px;margin-top:20px">
  <thead  >
      <tr >
        <th class="qbse">Product Pricing Table</th>
        <th class="qbse">Virtual Bank Account</th>
        <th class="qbo">Bordless Euro And US Account</th>
        <th class="qbo">Full Bank accounts multi currency accounts</th>
        <th class="qbse">Currency conversion engine</th>
        <th class="qbse">Crypto payment gateway</th>
      </tr>
    </thead>
  </table>
  <table id="get_data" style ="background-color: #EEE;">
    <tbody>

      <!-- separate -->
      <tr style="color: white">
        <td></td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr class="compare-row">
        <td style="font-weight: bold; background-color: #e0e0e0" colspan="6">Features</td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Onboarding Fee</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Monthly Fee</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td></td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr class="compare-row">
        <td style="font-weight: bold; background-color: #D3D3D3" colspan="6">Bank Account Included</td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Euro SEPA IBAN  </td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>United States ACH/Fedwire Bank account</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Germany IBAN account</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Multi Currency Bank account</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Full Bank account for global wire transfers</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>GBP local British bank account</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr class="compare-row">
        <td style="font-weight: bold; background-color: #FDE8D7" colspan="6">Inbound Payments</td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Receive SEPA payments on own Bank account</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Rreceive SWIFT wire transfer on own bank accunt</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Receive SWIFT wire transfer on Pool accounts</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr class="compare-row">
        <td style="font-weight: bold; background-color: #FDE8D7" colspan="6">Outbound Payments</td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>% of outbound transfers</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>'+SEPA outbound fee per transfer</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>'+SWIFT wire transfer fee</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>'+GBP local UK payment</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Minimum outbound fee</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>MT103 request</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Manual intervention charge</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Receive and send payments to crypto exchanges </td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr class="compare-row">
        <td style="font-weight: bold; background-color: #FDE8D7" colspan="6">Currency conversion</td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Inbound : USD, EUR, GBP, CAD, CZK, HRK, HUF, PLNJPY, CNH, MXN, HKD, CHF, DKK, HRK, CZK, HUF, NOK, PLN, RON, SEK, AED, BHD, KWD, OMR, QAR, SAR, AUD, ILS, MAD, NZD, SGD, THB, TRY, ZAR</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Outbond : USD, EUR, GBP, CAD, CZK, HRK, HUF, PLNJPY, CNH, MXN, HKD, CHF, DKK, HRK, CZK, HUF, NOK, PLN, RON, SEK, AED, BHD, KWD, OMR, QAR, SAR, AUD, ILS, MAD, NZD, SGD, THB, TRY, ZAR</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <!-- separate -->
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"></td>
      </tr>
      <!-- end of separate -->

      <tr>
        <td>Account opening time</td>
        <td><span class="tickblue">✔</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <div id="foots"></div>

    </tbody>
  </table>
</div>
</div>
</div>


<!-- Accordion -->
<div class="container-fluid bg-gray" id="accordion-style-1" >
  <div class="container">
    <section>
      <div class="row">
        <div class="col-12">      
          <h3 class="text-green mb-4 text-center" style="margin-top: 60px">Frequently Asked Questions</h3>
        </div>
        <div class="col-10 mx-auto">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-size: 12px;">
                 Is it avaible in my country?
              </button>
              </h5>
              </div>
              <div id="collapseOne" class="collapse show fade" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body" >
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<a href="https://www.b2bpay.co" class="ml-3" target="_blank"><strong>View More   </strong></a>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
              <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size: 12px; ">
                  Whitch account it is going for me?
              </button>
              </h5>
              </div>
              <div id="collapseTwo" class="collapse fade" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<a href="https://www.b2bpay.co" class="ml-3" target="_blank"><strong>View More   </strong></a>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
              <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-size: 12px;">
                What document doesn't your businese to start?
              </button>
              </h5>
              </div>
              <div id="collapseThree" class="collapse fade" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<a href="https://www.b2bpay.co" class="ml-3" target="_blank"><strong>View More  </strong></a>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>	
      </div>
    </section>
</div>
<img src="waves97.png"   style="width:113%; margin-left: 0px; margin-right:0px; margin-top: 0px; margin-bottom:0px;">
</div>
<!-- .// Accordion -->
<!-- Footer -->
<footer class="bg--dark footer-4 footer-narrow">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-5">
          <div class="region region-footerleft">
<div id="block-block-28" class="block block-block">


<div class="content">
<div><img alt="logo" src="https://www.b2bpay.co/sites/all/themes/forest/img/b2b-light-small.png" width="200" height="71" /></div>
<p><em>Mannerheimintie 15a <br>00260 Helsinki <br>Finland +358248091180 </em></p>
</div>
</div>
</div>
      </div>
      <div class="col-md-5 col-sm-7">
          <div class="region region-footermiddle">
<div id="block-menu-menu-footer-forest-menu" class="block block-menu footer__navigation">


<div class="content">
<ul class="menu"><li class="first leaf"><a href="/jobs">Work with us</a></li>
<li class="leaf"><a href="/legal">Legal</a></li>
<li class="leaf"><a href="/sources">Sources</a></li>
<li class="leaf"><a href="/privacy">Privacy</a></li>
<li class="leaf"><a href="/contact">Contact</a></li>
<li class="leaf"><a href="/impact">Social Innovation</a></li>
<li class="last leaf"><a href="/public-policy">Public Policy</a></li>
</ul>  </div>
</div>
<div id="block-menu-menu-footer-right-menu" class="block block-menu footer__navigation">


<div class="content">
<ul class="menu"><li class="first leaf"><a href="/pricing">Pricing</a></li>
<li class="leaf"><a href="/how">How it works</a></li>
<li class="leaf"><a href="/savings-case-study">Case Studies</a></li>
<li class="leaf"><a href="/sepa-countries">SEPA Payments</a></li>
<li class="leaf"><a href="/virtual-banking-layer">Virtual Banking Layer</a></li>
<li class="leaf"><a href="/virtual-bank-account">Virtual Bank Accounts</a></li>
<li class="last leaf"><a href="/banking-api-integration">Banking API Integration</a></li>
</ul>  </div>
</div>
</div>
      </div>
      <div class="col-md-4 col-sm-12">
          <div class="region region-footerright">
<div id="block-block-29" class="block block-block">


<div class="content">
<h6>B2B Pay: Non resident bank accounts</h6>
<p><a href="/b2bpay-waiting-list" class="btn btn--sm btn--square btn-getstarted"><span class="btn__text">Get Started</span></a></p>
<h6>Connect with Us</h6>
<ul style="columns: 4" class="social-list"><li><a href="https://www.linkedin.com/company/b2b-pay" target="_blank"><img src="flaticon/png/linkedin.png" alt=""></a></li>
<li><a href="https://www.facebook.com/B2Bpay/" target="_blank"><img  src="flaticon/png/facebook.png" alt=""></a></li>
<li><a href="https://twitter.com/b2bpay" target="_blank"><img  src="flaticon/png/twitter.png" alt=""></a></li>
<li><a href="http://b2bpay.tumblr.com/" target="_blank"><img  src="flaticon/png/tumblr.png" alt=""></a></li>
<li><a href="https://www.youtube.com/channel/UCisS9RY2iHFBQxJCFOGADLA" target="_blank"><img  src="flaticon/png/youtube.png" alt=""></a></li>
<li><a href="/contact" target="_blank"><img style="width:40px" src="flaticon/png/envelope.png" alt=""></a></li>
</ul>  </div>
</div>
<div id="block-block-48" class="block block-block mt-20">


<div class="content">
<ul class="inline footer-lang">
<li class="lang-en"><a href="/">EN</a></li>
<li class="lang-de"><a href="https://www.b2bpay.co/de">DE</a></li>
<li class="lang-es"><a href="https://www.b2bpay.co/es">ES</a></li>
<li class="lang-fr"><a href="https://www.b2bpay.co/fr">FR</a></li>
<li class="lang-id"><a href="https://www.b2bpay.co/id">ID</a></li>
<li class="lang-nl"><a href="https://www.b2bpay.co/nl">NL</a></li>
<li class="lang-pt"><a href="/pt">PT</a></li>
<li class="lang-fi"><a href="https://www.b2bpay.co/fi">FI</a></li>
</ul>
</div>
</div>
</div>
      </div>
    </div>
  </div>
  <div class="footer__lower">
    <div class="container">
      <div class="row">
          <div class="region region-afterfooter">
<div id="block-block-30" class="block block-block">


<div class="content">
<div class="col-sm-12 text-left-xs"> 
<span class="type--fine-print">Copyright © <a href="/legal" title="B2B Terms">B2B Trade Payment Services AB 2017. All Rights Reserved</span>
</div>
</div>
</div>
</div>
        <div class="col-xs-12 footer-tags">
        <div class="field field-name-field-tags field-type-taxonomy-term-reference field-label-hidden"><div class="field-items"><div class="field-item even"><a href="/tags/b2b-money-transfer" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B money transfer</a></div><div class="field-item odd"><a href="/tags/b2b" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B</a></div><div class="field-item even"><a href="/tags/b2b-international-payment" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B international payment</a></div><div class="field-item odd"><a href="/tags/india" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">India</a></div><div class="field-item even"><a href="/tags/b2b-payment" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B payment</a></div><div class="field-item odd"><a href="/tags/banking-costs" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">banking costs</a></div><div class="field-item even"><a href="/tags/sepa-bank-transfer" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">SEPA bank transfer</a></div><div class="field-item odd"><a href="/tags/money-transfer" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">money transfer</a></div><div class="field-item even"><a href="/tags/payments" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">payments</a></div><div class="field-item odd"><a href="/tags/payment-solutions" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">payment solutions</a></div><div class="field-item even"><a href="/tags/global-b2b-payments" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">global B2B payments</a></div><div class="field-item odd"><a href="/tags/free-iban-account" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">free IBAN account</a></div><div class="field-item even"><a href="/tags/b2b-currency-exchange" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B currency exchange</a></div><div class="field-item odd"><a href="/tags/b2b-payment-solutions" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B payment solutions</a></div><div class="field-item even"><a href="/tags/b2b-europe" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B Europe</a></div><div class="field-item odd"><a href="/tags/b2b-international-payments" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B international payments</a></div><div class="field-item even"><a href="/tags/b2-pay" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2 Pay</a></div><div class="field-item odd"><a href="/tags/b2b-payment-services" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B payment services</a></div><div class="field-item even"><a href="/tags/b2pay" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">b2pay</a></div><div class="field-item odd"><a href="/tags/b2b-payment-system" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B payment system</a></div><div class="field-item even"><a href="/tags/b2b-payment-providers" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B payment providers</a></div><div class="field-item odd"><a href="/tags/europe-b2b-website" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">Europe B2B website</a></div><div class="field-item even"><a href="/tags/b2b-transfer" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B transfer</a></div><div class="field-item odd"><a href="/tags/b2b-transaction" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">B2B transaction</a></div><div class="field-item even"><a href="/tags/iban-payment" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">IBAN payment</a></div><div class="field-item odd"><a href="/tags/iban-payments" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">IBAN payments</a></div><div class="field-item even"><a href="/tags/b2b-payments" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">b2b payments</a></div><div class="field-item odd"><a href="/tags/europe-b2b" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">europe b2b</a></div><div class="field-item even"><a href="/tags/non-resident-bank-account-0" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">non resident bank account</a></div><div class="field-item odd"><a href="/tags/non-resident-bank-account-europe" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">non resident bank account Europe</a></div><div class="field-item even"><a href="/tags/non-resident-bank-accounts" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">non-resident bank accounts</a></div><div class="field-item odd"><a href="/tags/european-bank-account-non-residents" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">european bank account for non residents</a></div><div class="field-item even"><a href="/tags/open-bank-account-online-non-resident" typeof="skos:Concept" property="rdfs:label skos:prefLabel" datatype="">open bank account online non resident</a></div></div></div>						</div>
      </div>
    </div>
  </div>
</footer>

</body>


<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.8/js/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/floatthead/2.1.4/jquery.floatThead.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="floatingtabel.js"></script>
<script>
    function ecommerce(id){
        var api="";
        console.log(id);
        $(".xx").removeClass("clicked").addClass("warning");
        $('#'+id).removeClass("warning").addClass("clicked");
        
        var id_negara = $('#what').val();

        if (id_negara=="") {
          toast("Please select the country","error");
          $("#mycontent").slideUp();
        } else {
          $("#mycontent").slideDown();
          toast("Industry has been select","success");
        }

        switch (id) {
            case "b5":
                api="c3/config/get_data.php"
                break;
            case "b10":
                api="c2/config/get_data.php"
                break;
            default:
                api="config/get_data.php"
                break;
        }

        setTimeout(function(){
          $.ajax({
            type: 'POST',
            url: api,
            data:
            {
              id_negara : id_negara,
            },
            success:function(resource)
            {
              $('#get_data').html(resource);
            },
            complete: function(){
                    $('span#label_loading').hide();
            }
          })

        }, 500)
    }
    $(document).ready(function(){
        console.log("open");
    });
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

    // Get the header
    var header = document.getElementById("tbfix");
    var footer= document.getElementById("foots");
    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } 
    else if(window.pageYOffset > footer){
        header.classList.remove("sticky");
    }
    else {
        header.classList.remove("sticky");
    }
    }
    //autocomplete
    $( "#what" ).autocomplete({
              source: function (request,response) {
                  $.ajax({
                      url: "config/searchdata.php",
                      data: {
                          word:request.term
                      },
                      dataType: "json",
                       method : "POST", 
                      success: function (data) {
                         console.log("jos");
                          var respon=$.map(data,function(obj){
                              console.log(obj);
                              return obj;
                          });
                          response(respon);
                      }
                  });
              }
    } );

  function toast(a,b) {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    })

    Toast.fire({
      type: b,
      title: a
    })
  }
</script>
<script>
  var id="";
    function calculate(){
        var api="";
        console.log(id);
        var id_negara = $('#what').val();

        if (id_negara=="") {
          toast("Please select the country","error");
          $("#mycontent").slideUp();
        } else {
          $("#mycontent").slideDown();
          toast("Industry has been select","success");
        }

        switch (id) {
            case "b5":
                api="c3/config/get_data.php"
                break;
            case "b10":
                api="c2/config/get_data.php"
                break;
            default:
                api="config/get_data.php"
                break;
        }

        setTimeout(function(){
          $.ajax({
            type: 'POST',
            url: api,
            data:
            {
              id_negara : id_negara,
            },
            success:function(resource)
            {
              $('#get_data').html(resource);
            },
            complete: function(){
                    $('span#label_loading').hide();
            }
          })

        }, 500)
    }

    function ecommerce(kode) {
      
      $(".xx").removeClass("clicked").addClass("warning");
      $('#'+kode).removeClass("warning").addClass("clicked");
      id=kode;
      console.log("kode="+id);
    }
    $(document).ready(function(){
        console.log("open");
    });
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

    // Get the header
    var header = document.getElementById("tbfix");
    var footer= document.getElementById("foots");
    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } 
    else if(window.pageYOffset > footer){
        header.classList.remove("sticky");
    }
    else {
        header.classList.remove("sticky");
    }
    }
    //autocomplete
    $( "#what" ).autocomplete({
              source: function (request,response) {
                  $.ajax({
                      url: "config/searchdata.php",
                      data: {
                          word:request.term
                      },
                      dataType: "json",
                       method : "POST", 
                      success: function (data) {
                         console.log("jos");
                          var respon=$.map(data,function(obj){
                              console.log(obj);
                              return obj;
                          });
                          response(respon);
                      }
                  });
              }
    } );

  function toast(a,b) {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    })

    Toast.fire({
      type: b,
      title: a
    })
  }
</script>

</html>