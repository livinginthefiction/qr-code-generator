<?php 
    include 'dbConn.php';
    $query = "SELECT * FROM `profile` WHERE token = '".$_GET['token']."'";
    $sql = mysqli_query($db, $query);
    $data =array();
    $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $profile = json_decode($data['profile']);
    // echo "<pre>"; print_r($data['profile']); echo "</pre>";
   // echo "<pre>"; print_r($profile); echo "</pre>";
?>
<?php $sidebarorder = 'left' == qrcdr()->getConfig('sidebar') ? ' order-last order-lg-first' : ' order-last'; ?>
<input type="hidden" id="qrcdr-relative" value="<?php echo $relative; ?>">
<div class="container">
    <div class="row mt-3">
        
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="card w-100 rounded-lg" style="width: 18rem;box-shadow: 0px 10px 14.1px 0.9px rgb(0 0 0 / 24%), 0px 4px 19.6px 0.4px rgb(0 0 0 / 16%);">
                <?php if (!empty($profile->companylogoVal)) { ?>
        <div class="col-md-3"><img width="150" src="<?= $profile->companylogoVal ?>"></div>
        <?php } ?>
                <?php if (!empty($profile->profilepicVal)) { ?>
                <center><img style="width: 18%;height: 18%; box-shadow: 0px 10px 14.1px 0.9px rgb(0 0 0 / 24%), 0px 4px 19.6px 0.4px rgb(0 0 0 / 16%);" class="card-img-top rounded-circle " src="<?= $profile->profilepicVal ?>" alt="Card image cap"></center>
                <?php } ?>
              <div class="card-body pt-3">
                <h2 class="card-title text-center text-capitalize"><?= (!empty($profile->vnametitle)) ? $profile->vnametitle : '' ; ?> <?= (!empty($profile->vname)) ? $profile->vname : '' ; ?> <?= (!empty($profile->vlast)) ? $profile->vlast : '' ; ?></h2>
                <h5 class="card-title text-center text-capitalize my-0"><?= (!empty($profile->vtitle)) ? $profile->vtitle : '' ; ?> - <?= (!empty($profile->vcompany)) ? $profile->vcompany : '' ; ?> </h5>
                <div class="row mx-5">
                    <div class="col-md-6">
                        <a href="<?= (!empty($profile->countrycodevphone)) ? "tel:+".$profile->countrycodevphone."-":""  ?><?= (!empty($profile->vphone)) ? $profile->vphone:"" ?>"><button class="bubbly-button float-right bg-primary"><i class="fa-solid fa-phone"></i></button></a>
                    </div>
                    <div class="col-md-6">
                        <!-- <center></center> -->
                        <a href="<?= (!empty($profile->vemail)) ? "mailto:".$profile->vemail:"-" ; ?>"></a>
                        <button class="bubbly-button float-left bg-primary"><i class="fa-solid fa-envelope-open-text"></i></button>
                    </div>
                    <div class="col-md-6 offset-md-3 row shadowqr">
                        <div class="col-4 text-center pt-2"><i style="font-size: 2em;" class="fa-solid fa-phone pt-1"></i></div>
                        <div class="col-8 pl-3 pt-1 font-weight-bold text-center"><?= (!empty($profile->countrycodevphone)) ? "+".$profile->countrycodevphone."-":""  ?><?= (!empty($profile->vphone)) ? $profile->vphone:"" ?>    <?= (!empty($profile->countrycodevmobile)) ? "+".$profile->countrycodevmobile."-":""  ?><?= (!empty($profile->vmobile)) ? $profile->vmobile:"" ?> <br>  <span class="font-weight-bold">Mobile</span></div>
                    </div>
                    <div class="col-md-6 offset-md-3 row shadowqr mt-4">
                        <div class="col-4 text-center pt-2"><i style="font-size: 2em;" class="fa-solid fa-envelope-open-text pt-1"></i></div>
                        <div class="col-8 pl-5 pt-1 font-weight-bold text-center"> <?= (!empty($profile->vemail)) ? $profile->vemail :"-" ; ?> <br>  <span class="font-weight-bold">Email</span></div>
                    </div>

                    <div class="col-md-6 offset-md-3 row shadowqr mt-4">
                        <div class="col-4 text-center pt-2"><i style="font-size: 2em;" class="fa-brands fa-chrome pt-1"></i></div>
                        <div class="col-8 pl-5 pt-1 font-weight-bold text-center"><?= (!empty($profile->vurl)) ? $profile->vurl:"-"  ?> <br>  <span class="font-weight-bold">Website</span></div>
                    </div>

                    <div class="col-md-6 offset-md-3 row shadowqr mt-4">
                        <div class="col-4 text-center pt-2"><i style="font-size: 2em;" class="fa-solid fa-fax pt-1"></i></div>
                        <div class="col-8 pl-5 pt-1 font-weight-bold text-center"> <?= (!empty($profile->countrycodevfax)) ? "+".$profile->countrycodevfax."-":""  ?><?= (!empty($profile->vfax)) ? $profile->vfax:"-" ?> <br>  <span class="font-weight-bold">Fax</span></div>
                    </div>
                    <div class="col-md-6 offset-md-3 row shadowqr mt-4">
                        <div class="col-4 text-center pt-2"><i style="font-size: 2em;" class="fa-solid fa-map-pin pt-3"></i></div>
                        <div class="col-8 pl-5 pt-1 font-weight-bold text-center"><?= (!empty($profile->vaddress)) ? $profile->vaddress : '' ; ?>  <br><?= (!empty($profile->vcity)) ? $profile->vcity : '' ; ?> <?= (!empty($profile->vstate)) ? $profile->vstate : '' ; ?> <br><?= (!empty($profile->vcountry)) ? $profile->vcountry : '' ; ?> <?= (!empty($profile->vcap)) ? $profile->vcap : '' ; ?> </div>
                    </div>
                </div>
                <center><a href="vcard.php?token=<?= $_GET['token'] ?>"><button class="bubbly-button font-weight-bold bg-primary">Download VCARD <i class="fa-solid fa-address-card"></i></button></a></center>
              </div>
            </div>
        </div>

    </div><!-- row -->
</div><!-- containerOOO -->

<script type="text/javascript">
    var animateButton = function(e) {

  e.preventDefault;
  //reset animation
  e.target.classList.remove('animate');
  
  e.target.classList.add('animate');
  setTimeout(function(){
    e.target.classList.remove('animate');
  },700);
};

var bubblyButtons = document.getElementsByClassName("bubbly-button");

for (var i = 0; i < bubblyButtons.length; i++) {
  bubblyButtons[i].addEventListener('click', animateButton, false);
}    
</script>

<style type="text/css">
    .newbg{background-color: #292929 !important;}
    .shadowqr{box-shadow: 0px 10px 14.1px 0.9px rgb(0 0 0 / 24%), 0px 4px 19.6px 0.4px rgb(0 0 0 / 16%);}
    /*body {
  font-size: 16px;
  font-family: "Helvetica", "Arial", sans-serif;
  text-align: center;
  background-color: #f8faff;
}
*/
.bubbly-button {
    width: 50%;
  font-family: "Helvetica", "Arial", sans-serif;
  display: inline-block;
  font-size: 1em;
  padding: 0.75em 1.5em;
  margin: 15px 0;
  /*margin-bottom: 30px;*/
  -webkit-appearance: none;
  appearance: none;
  background-color: #ff0081;
  color: #fff;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  position: relative;
  transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
  box-shadow: 0px 10px 14.1px 0.9px rgb(0 0 0 / 24%), 0px 4px 19.6px 0.4px rgb(0 0 0 / 16%);
  /*box-shadow: 0 2px 25px rgba(255, 0, 130, 0.5);*/
}
.bubbly-button:focus {
  outline: 0;
}
.bubbly-button:before, .bubbly-button:after {
  position: absolute;
  content: "";
  display: block;
  width: 140%;
  height: 100%;
  left: -20%;
  z-index: -1000;
  transition: all ease-in-out 1.5s;
  background-repeat: no-repeat;
}
.bubbly-button:before {
  display: none;
  top: -75%;
  background-image: radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 20%, #ff0081 20%, transparent 30%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 10%, #ff0081 15%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%);
  background-size: 10% 10%, 20% 20%, 15% 15%, 20% 20%, 18% 18%, 10% 10%, 15% 15%, 10% 10%, 18% 18%;
}
.bubbly-button:after {
  display: none;
  bottom: -75%;
  background-image: radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 10%, #ff0081 15%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%);
  background-size: 15% 15%, 20% 20%, 18% 18%, 20% 20%, 15% 15%, 10% 10%, 20% 20%;
}
.bubbly-button:active {
  transform: scale(0.9);
  background-color: #e60074;
  box-shadow: 0 2px 25px rgba(255, 0, 130, 0.2);
}
.bubbly-button.animate:before {
  display: block;
  animation: topBubbles ease-in-out 1.5s forwards;
}
.bubbly-button.animate:after {
  display: block;
  animation: bottomBubbles ease-in-out 1.5s forwards;
}

@keyframes topBubbles {
  0% {
    background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
  }
  50% {
    background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 90% 30%;
  }
  100% {
    background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%, 50% 40%, 65% 10%, 90% 20%;
    background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
  }
}
@keyframes bottomBubbles {
  0% {
    background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%, 70% -10%, 70% 0%;
  }
  50% {
    background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%, 105% 0%;
  }
  100% {
    background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%, 110% 10%;
    background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
  }
}

@media only screen and (max-width: 425px) {
  .bubbly-button{width: 100%;}
}
</style>

<!-- <div class="alert_placeholder toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
    <div class="toast-header">
        <div class="mr-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
            </svg>
        </div>
        <button type="button" class="ml-2 ms-auto mb-1 btn-close close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></span>
        </button>
    </div>
    <div class="toast-body"></div>
</div> -->
