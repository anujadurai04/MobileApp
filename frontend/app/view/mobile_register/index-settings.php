<?php

include '../../layout/header-shop.php';
include 'skeleton-register.php';

?>

<!-- Main Start -->
<main class="main-wrap setting-page mb-xxl">
  <div class="user-panel">

  </div>

  <!-- Form Section Start -->
  <div class="custom-form">

    <div class="input-box">
      <i class="iconly-Call icli"></i>
      <input type="number" id="phone_number" placeholder="9876543210" class="form-control" />
    </div>

    <div class="input-box" id="otp_box">
      <i class="iconly-Lock icli"></i>
      <input class="form-control digits" id="otpCode" type="text" autocomplete="off" placeholder="Enter Otp Code" />
    </div>
    <small>Note: The mobile number should not include the prefix "+91."</small>
    <button id="send_otp" class="btn-solid">Send Otp</button>
    <button id="submit_otp" class="btn-solid">Submit</button>
    <input type="hidden" id="googleCaptcha" style="display: block;margin: 0 auto;text-align: center;" />
  </div>
  <!-- Form Section End -->
</main>
<!-- Main End -->
<div class="modal fade bd-example-modal-sm" id="Sendotp" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content text-center" style="padding: 20px;">
      <h3 class="title-color">Please Wait...</h3>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-sm" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content text-center" style="padding: 20px;">
      <div class="d-flex justify-content-center pb-2">
        <h3 class="title-color" id="alertmessage"></h3>
      </div>
      <div class="d-flex justify-content-center pt-2">
        <button type="button" class="btn btn-primary" id="dismissAltermodal" style="background-color: #FF6347;color: white;border: none;" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-firestore.js"></script>

<?php include '../../layout/no_footer.php' ?>

<script>
  $("#otp_box").hide();
  $("#submit_otp").hide();

  $(document).on('click', '#dismissAltermodal', function() {
    $('#Sendotp').modal("hide");
    $('#alertmodal').modal('hide');
  })

  var firebaseConfig = {
    apiKey: "AIzaSyC-eCkG-uSSNKpncM8cGls-pOxJk8QJdHc",
    authDomain: "jdmlogin-c725d.firebaseapp.com",
    projectId: "jdmlogin-c725d",
    storageBucket: "jdmlogin-c725d.appspot.com",
    messagingSenderId: "5176366030",
    appId: "1:5176366030:web:a6fc44ae2a786d618bd19f",
    measurementId: "G-CBNZH4L2D3"
  };
  firebase.initializeApp(firebaseConfig);
  var appVerifier = new firebase.auth.RecaptchaVerifier('googleCaptcha', {
    'size': 'invisible'
  });
  var cart = localStorage.getItem('register');
  cart = JSON.parse(cart);

  console.log(cart);

  $("#send_otp").on('click', function() {

    var number = "+91" + $("#phone_number").val();
    //console.log(number);
    var phoneRegex = /^\+91[1-9][0-9]{9}$/;

    if (!phoneRegex.test(number)) {
      $('#Sendotp').modal("hide");
      $('#alertmodal').modal({
        backdrop: 'static',
        keyboard: false
      })
      $('#alertmodal').modal("show");
      $('#alertmessage').html("Invalid Mobile Number. Kindly enter valid Mobile number (eg: 9876543210)");
      return;
    } else {

      $('#Sendotp').modal({
        backdrop: 'static',
        keyboard: false
      })
      $('#Sendotp').modal("show");

      firebase.auth().signInWithPhoneNumber(number, appVerifier)
        .then(function(confirmationResult) {
          $('#Sendotp').modal("hide");
          localStorage.removeItem('register');
          var register = localStorage.getItem('register');
          $("#phone_number").prop('disabled', true);
          $("#otp_box").show();
          $("#send_otp").hide();
          $("#submit_otp").show();
          if (register === null) {
            register = [];
          } else {
            register = JSON.parse(register);
          }

          $("#submit_otp").on('click', function() {

            var number = $("#phone_number").val();
            var otp = $("#otpCode").val();

            if (otp === null || otp === '') {
              $('#alertmodal').modal({
                backdrop: 'static',
                keyboard: false
              })
              $('#alertmodal').modal("show");
              $('#alertmessage').html("Kindly enter the Otp code!");
            } else {
              $('#Sendotp').modal("show");

              var otpData = localStorage.getItem('register');
              otpData = JSON.parse(otpData);

              // Find the OTP data for the phone number entered by the user
              //var userData = otpData.find(function(data) {
              //return data.phoneno === number;
              //});

              confirmationResult.confirm(otp)
                .then(function(result) {
                  $.ajax({
                    url: '../../api/register/insert/index.php', // URL of the PHP script that will handle the insert
                    method: 'POST',
                    data: {
                      number: number,
                      verified: 1
                    },
                    success: function(response) {
                      // Handle the response from the PHP script
                      var data = JSON.parse(response);

                      if (data.status == 201) {
                        var register = [];
                        register.push({
                          phoneNumber: number,
                          verified: 1
                        });
                        $('#Sendotp').modal("hide");
                        $('#alertmodal').modal({
                          backdrop: 'static',
                          keyboard: false
                        })
                        $('#alertmodal').modal("show");
                        $('#alertmessage').html("Otp Verified Successfully!");
                        localStorage.setItem("register", JSON.stringify(register));
                        var register = localStorage.getItem('register');

                        location.replace("../settings/");
                      } else if (data.status == 422) {
                        $('#Sendotp').modal("hide");
                        $('#alertmodal').modal({
                          backdrop: 'static',
                          keyboard: false
                        })
                        $('#alertmodal').modal("show");
                        $('#alertmessage').html(data.message);
                      } else {
                        $('#Sendotp').modal("hide");
                        $('#alertmodal').modal({
                          backdrop: 'static',
                          keyboard: false
                        })
                        $('#alertmodal').modal("show");
                        $('#alertmessage').html("Something Went Wrong!");
                      }
                    },
                    error: function(xhr, status, error) {
                      $('#Sendotp').modal("hide");
                      $('#alertmodal').modal({
                        backdrop: 'static',
                        keyboard: false
                      })
                      $('#alertmodal').modal("show");
                      $('#alertmessage').html(error.message);
                    }
                  });
                }).catch(function(error) {
                  $('#Sendotp').modal("hide");
                  $('#alertmodal').modal({
                    backdrop: 'static',
                    keyboard: false
                  })
                  $('#alertmodal').modal("show");
                  $('#alertmessage').html("Invalid Otp try again!");
                });

              // Check if the entered OTP matches the OTP for the phone number
              // if (userData && userData.otp === otp) {

              //} else {
              ///  alert("OTP verification failed!");
              //}
            }
          })
        }).catch(function(error) {
          $('#Sendotp').modal("hide");
          $('#alertmodal').modal({
            backdrop: 'static',
            keyboard: false
          })
          $('#alertmodal').modal("show");
          $('#alertmessage').html(error.message);
        });

      // Make the Ajax POST request
      //$.ajax({
      //url: "send_otp.php",
      //type: "POST",
      //data: data,
      //success: function(response) {
      // Parse the response as JSON
      //var responseData = JSON.parse(response);
      //if (responseData.status == 201) {
      // alert(responseData.message);
      //localStorage.removeItem('register');
      //var item = {
      // phoneno: number,
      //otp: responseData.otp,
      //verified: 0
      //};
      // var register = localStorage.getItem('register');
      //if (register === null) {
      // If the cart does not exist, create a new one
      //register = [];
      // } else {
      // If the cart exists, parse the JSON string into an object
      //register = JSON.parse(register);
      //}
      //register.push(item);
      // Stringify the cart object and save it to localStorage
      //localStorage.setItem('register', JSON.stringify(register));
      //console.log(JSON.stringify(register));
      //$("#otp_box").show();
      // $("#send_otp").hide();
      // $("#submit_otp").show();
      //} else {
      //alert(responseData.message);
      // }
      //},
      // error: function(xhr, status, error) {
      // Handle errors that occur during the request
      //console.error(error);
      // }
      //});

    }
  })
</script>