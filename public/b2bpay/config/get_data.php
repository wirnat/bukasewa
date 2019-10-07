<?php 
$negara = $_POST['id_negara'];

require('config.php');
$sql=$link->query("SELECT * FROM negara WHERE nama = '$negara'");
if ($sql->num_rows > 0) {  
  while($row = $sql->fetch_assoc()) {
    $link1=$row["account"];
    $link2=$row["reqcom"];
    $link3=$row["comfrom"];   
    $link4=$row["contain"];  
  }
}else{

}

// if($link1=""){
//   $link1 = "#";
// }
// if($link2=""){
//   $link2 = "#";
// }
// if($link3=""){
//   $link3 = "#";
// }
// if($link4=""){
//   $link4 = "#";
// }

?>
<style>
 .icon-background{
   height:70px;
   width: 70px;
   border-radius:30px;
   background:#69B6FD;
   box-shadow: 0px 2px 15px rgba(51, 51, 51, 0.15);
 }
</style>
<div id="get_data">
  <div class="section-title text-left">
    <h2 style="color: rgba(51, 51, 51, 0.72);">
     Learn more about <?php echo $negara;?>
    </h2>
  </div>
<div class="background" style="background-color:#0082fa; width:100%; border-radius:30px; height:100%">

<div class="row" >
<!-- <div class="col-md-offset-2"> -->
    <!-- <div class="col-md-12" style="margin_left:0px;"> -->
    <!-- <div class="col-md-4 col-md-offset-3" style="margin_left:-4px; margin-top:-30px; margin-bottom:20px;">
        <div class="single-popular-course" >
          <div class="thumb">
            <img class="f-img img-fluid mx-auto" src="img/popular-course/p1.jpg" alt="" />
          </div>
          <div class="details">
            <div class="d-flex justify-content-between mb-20">
              <p class="name"></p>
            </div>
        
            <a href="<?php echo $link1;?>">
              <h4>
                How to Open a Business bank account in <?php echo $negara;?>
              </h4>
            </a>
          </div>
        </div>
    </div>
    <div class="col-md-4" style="margin_left:-4px; margin-top:-30px; ">-->
        <!-- <div class="col-md-6"> 
        <div class="single-popular-course" >
          <div class="thumb">
            <img class="f-img img-fluid mx-auto" src="img/popular-course/p2.jpg" alt="" />
          </div>
          <div class="details" >
            <div class="d-flex justify-content-between mb-20" >
              <p class="name"></p>
            </div>
            <a href="<?php echo $link2;?>">
              <h4>
                How to register a company in <?php echo $negara;?>
                </h4>
            </a>
           
          </div>
        </div>
        </div>       -->
    
      <div class="col-md-4 col-md-offset-3" style="margin_left:-4px; ">
        <div class="other-feature-item "style="margin-top:-30px; border-radius:20px;">
            <div class="icon-background">
            <img src="img/vec1.png" style="margin-top:10px; margin-left:14px">
            </div>
            <a href="<?php echo $link1;?>">
            <h4>How to Open a Business bank account in <?php echo $negara;?></h4>
          </div>
      </div>
      <div class="col-md-4 " style="margin_left:-4px; ">
        <div class="other-feature-item" style="margin-top:-30px; border-radius:20px;">
        <div class="icon-background">
            <img src="img/vec2.png" style="margin-top:10px; margin-left:14px">
            </div>
            <a href="<?php echo $link2;?>">
            <h4>How to register a company in <?php echo $negara;?></h4>
          </div>
      </div>
      <div class="col-md-4 col-md-offset-3" style="margin_left:-4px; ">
        <div class="other-feature-item" style="border-radius:20px;">
        <div class="icon-background">
            <img src="img/vec3.png" style="margin-top:10px; margin-left:14px">
            </div>
            <a href="<?php echo $link3;?>">
            <h4>Where can I register a bank account if my company is in <?php echo $negara;?></h4>
          </div>
      </div>
      <div class="col-md-4 " style="margin_left:-4px; ">
        <div class="other-feature-item"style="border-radius:20px;">
        <div class="icon-background">
            <img src="img/vec4.png" style="margin-top:10px; margin-left:14px">
            </div>
            <a href="<?php echo $link4;?>">
            <h4> Country Business guide to <?php echo $negara;?> (contains all articles we have for certain countries</h4>
          </div>
      </div>
        <!-- <div class="col-md-3"> -->
    <!-- <div class="col-md-4" style="margin_left:-4px; margin_top:20px; margin-bottom: 30px;">

        <div class="single-popular-course" >
          <div class="thumb">
            <img class="f-img img-fluid mx-auto" src="img/popular-course/p4.jpg" alt="" />
          </div>
          <div class="details">
            <div class="d-flex justify-content-between mb-20">
              <p class="name"></p>
            </div>
            <a href="<?php echo $link4;?>">
              <h4>
                Country Business guide to <?php echo $negara;?> (contains all articles we have for certain countries
                </h4>
            <a>
          </div>
        </div>
      </div>
    </div> -->
</div>
</div>
      