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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>

.btn1 {
 
  border: 2px solid black;
  background-color: white;
  color: black;
  font-size: 10px;
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
  font-size:13px;
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
<nav class="navbar navbar-expand-lg navbar-dark" style=" background-color: white; z-index:100; margin-top : -30px;">
  <!-- Navbar brand -->
  <div style="margin-left: 200px;margin-right:200px">
  <img src="image/b2bpay.png"  height="100" width="100">
  </div>
  <a class="navbar-brand" href="#" style="color : black; font-size: 12px; ">ABOUT</a>
   <a class="navbar-brand" href="#" style="color : black; font-size: 12px;">INDUSTRIES</a>
    <a class="navbar-brand" href="#" style="color : black; font-size: 12px; ">LEARNING CENTER</a>
     <a class="navbar-brand" href="#" style="color : black; font-size: 12px;">SUPPORT</a>
    <button type="button" class="btn btn-success" style="width: 100px; font-size: 10px; height: 40px;">GET STARTED</button>
  </div>
  <!-- Collapsible content -->

</nav>




<!--/.Navbar-->
<div class="container">
<div class="comparison">
        <div >    
            <h4 style="color: #0078C1">Compare Our Products And Pricing </h4> 
            <h7 style="margin-top : -20px; color: #0078C1">First Select Your Industry</h7>
        </div>
        <div style=" margin-top: 20px">
            <div>
                <button onclick="ecommerce('b1')" id='b1' class="btn1 xx warning " style="border-top-left-radius: 5px; border-bottom-left-radius : 5px;" >E-commerce</button>
            <button onclick="ecommerce('b2')" id='b2' class="btn1 xx warning" style="margin-left :-4px">IT Service</button>
            <button onclick="ecommerce('b3')" id='b3' class="btn1 xx warning" style="margin-left :-4px">Offshore Companies</button>
                <button onclick="ecommerce('b4')" id='b4' class="btn1 xx warning" style="margin-left :-4px">New Businesses</button></a>
            <a href="http://hostingguru.co.id/b2bpay/yodi/v3/pricing/c3"><button onclick="ecommerce('b5')" id='b5' class="btn1 xx warning" style="margin-left :-4px; border-top-right-radius : 5px; border-bottom-right-radius: 5px;">Consulting Service</button></a>
            </div>
            
            <div style="margin-top: 5px; ">
            <button  onclick="ecommerce('b6')" id='b6' class="btn1 xx warning" style="border-top-left-radius: 5px; border-bottom-left-radius : 5px; width: 140px">Startups</button>
            <button  onclick="ecommerce('b7')" id='b7' class="btn1 xx warning" style="margin-left :-4px">Travel Agencies</button>
            <button  onclick="ecommerce('b8')" id='b8' class="btn1 xx warning" style="margin-left :-4px;">B2B/Manufacturing</button>
            <button  onclick="ecommerce('b9')" id='b9' class="btn1 xx warning" style="margin-left :-4px; width: 120px">Gaming</button>
           <button  onclick="ecommerce('b10')" id='b10' class="btn1 xx warning" style="margin-left :-4px; width: 120px">Forex/CFD</button>
            <button  onclick="ecommerce('b11')" id='b11' class="btn1 xx warning" style="margin-left :-4px; border-top-right-radius : 5px; border-bottom-right-radius: 5px;  width: 130px">Blockchain</button>

            </div>
        </div>
  <center>
        <div style="  margin-top: 20px;">
        <h7 style=" color: #0078C1;">Secondly select the country where your business is registered</h7>
        </div>
        <input type="hidden" id="startNegara" value="1"  >
        <select onchange="show_data()" class="form-control" id="negara" style="width: 20%; margin-bottom:  20px; margin-top : 20px">
                    <?php 

                    $sql = $link->query("SELECT * FROM negara ORDER BY nama ASC ");
                    while ($data = $sql->fetch_array(MYSQLI_ASSOC)) {
                        ?>
                <option value="<?php echo $data['id_negara']; ?>"><?php echo $data['nama']; ?></option>
                <?php 
            }

            ?>
        </select>
</center>
    <span id="label_loading" style="display: none " ><img style="width: 30px; height: 30px; margin-top 60px; margin-left: -800%" class="img-responsive" src="image/loading.gif"></span>
  <table id="tbfix">
  <thead  >
      <tr >
        <th class="qbse">Pricing Table</th>
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



<!-- Accordion -->
<div class="container-fluid bg-gray" id="accordion-style-1" >
	<div class="container">
		<section>
			<div class="row">
				<div class="col-12">
				    
					<h3 class="text-green mb-4 text-center" style="margin-top: 60px; z-index:-10000;">Frequently Asked Questions</h3>
				</div>
				<div class="col-10 mx-auto" style="z-index:-10000">
					<div class="accordion" id="accordionExample">
						<div class="card">
							<div class="card-header" id="headingOne">
								<h5 class="mb-0">
							<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-size: 12px;">
							    
							  <i class=""></i><i class="fa fa-angle-double-right mr-3" ></i > Is it avaible in my country?
							</button>
						  </h5>
							</div>

							<div id="collapseOne" class="collapse show fade" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body" >
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<a href="https://www.fiverr.com/sunlimetech/fix-your-bootstrap-html-and-css3-issues" class="ml-3" target="_blank"><strong>View More designs <i class="fa fa-angle-double-right"></i></strong></a>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingTwo">
								<h5 class="mb-0">
							<button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size: 12px; >
							
							 <i class="fa fa-plus main"></i><i class="fa fa-angle-double-right mr-3"></i> Whitch account it is going for me?
							</button>
						  </h5>
							</div>
							<div id="collapseTwo" class="collapse fade" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<a href="https://www.fiverr.com/sunlimetech/design-and-fix-your-bootstrap-4-issues" class="ml-3" target="_blank"><strong>View More designs <i class="fa fa-angle-double-right"></i></strong></a>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingThree">
								<h5 class="mb-0">
							<button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-size: 12px;>
							
							  <i class="fa fa-plus main"></i><i class="fa fa-angle-double-right mr-3"></i> What document doesn't your businesse to start?
							</button>
						  </h5>
							</div>
							<div id="collapseThree" class="collapse fade" aria-labelledby="headingThree" data-parent="#accordionExample">
								<div class="card-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<a href="https://www.fiverr.com/sunlimetech/convert-bootstrap-or-html-to-wordpress-for-global-devices" class="ml-3" target="_blank"><strong>View More designs <i class="fa fa-angle-double-right"></i></strong></a>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>	
			</div>
		</section>
	</div>
 <img src="image/waves-baru.png"   width="113%%" style="margin-left: -160px; margin-top: -490px">
</div>
<!-- .// Accordion -->


<footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
        <div class="container">
          <div class="row row-30">
            <div class="col-md-4 col-xl-5">
              <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37" srcset="images/agency/logo-retina-inverse-280x74.png 2x"  style="margin-top : 50px"></a>
                <p> <img src="image/b2bpay.png"  height="100" width="100">
 </p>
                <!-- Rights-->
                <p class="rights"><span>©  </span><span class="copyright-year">2019</span><span> </span><span>B2BPay</span><span>. </span><span>All Rights Reserved.</span></p>
              </div>
            </div>
            <div class="col-md-4" style="margin-top : 50px">
              <h5>Contacts</h5>
              <dl class="contact-list">
                <dt>Address:</dt>
                <dd>Mannerheimintie 15a
00260 Helsinki
Finland +358248091180.</dd>
              </dl>
              <dl class="contact-list">
              
              </dl>
              <dl class="contact-list">
                <dt>phones:</dt>
                <dd><a href="tel:#">+91 7568543012</a> <span>or</span> <a href="tel:#">+91 9571195353</a>
                </dd>
              </dl>
            </div>
            <div class="col-md-4 col-xl-3"  style="margin-top : 50px">
              <h5>Links</h5>
              <ul class="nav-list">
                <li><a href="#">WORK WITH US
</a></li>
                <li><a href="#">LEGAL</a></li>
                <li><a href="#">SOURCES</a></li>
                <li><a href="#">PRIVACY</a></li>
                <li><a href="#">CONTACT</a></li>
                 <li><a href="#">SOCIAL INNOVATION
</a></li>
                <li><a href="#">PUBLIC POLICY
</a></li>
                <li><a href="#">PRIVACY</a></li>
                <li><a href="#">CONTACT</a></li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="row no-gutters social-container">
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
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

<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="floatingtabel.js"></script>
<script>
    function ecommerce(id){
        console.log(id);
        $(".xx").removeClass("clicked").addClass("warning");
        $('#'+id).removeClass("warning").addClass("clicked");
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
</script>
</html>