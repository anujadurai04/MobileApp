    <!-- Footer Start -->
    <footer>

    </footer>
    <!-- Footer End -->

    <!-- Action confirmation Start -->
    <div class="action action-confirmation offcanvas offcanvas-bottom" tabindex="-1" id="confirmation" aria-labelledby="confirmation">
      <div class="offcanvas-body small">
        <div class="confirmation-box">
          <h2>Are You Sure?</h2>
          <p class="font-sm content-color">The permission for the use/group, preview is inherited from the object, Modifiying it for this object will create a new permission for this object</p>
          <div class="btn-box">
            <button class="btn-outline" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
            <button class="btn-solid d-block" data-bs-dismiss="offcanvas" aria-label="Close">Remove</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Action Confirmation End -->
    <!-- jquery 3.6.0 -->
    <script src="../../../assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Js -->
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>

    <!-- Pricing Slider js -->
    <script src="../../../assets/js/pricing-slider.js"></script>

    <!-- Lord Icon -->
    <script src="../../../assets/js/lord-icon-2.1.0.js"></script>

    <!-- Feather Icon -->
    <script src="../../../assets/js/feather.min.js"></script>

    <!-- Slick Slider js -->
    <script src="../../../assets/js/slick.js"></script>
    <script src="../../../assets/js/slick.min.js"></script>
    <script src="../../../assets/js/slick-custom.js"></script>

    <!-- Add To Home  js -->
    <script src="../../../assets/js/homescreen-popup.js"></script>

    <!-- Theme Setting js -->
    <script src="../../../assets/js/theme-setting.js"></script>

    <!-- Script js -->
    <script src="../../../assets/js/script.js"></script>

    <script>
      function headerdisplay() {

        var register = localStorage.getItem('register');
        register = JSON.parse(register);

        if (register !== null) {
          var mobileNumber = register[0].phoneNumber;

          // execute the AJAX call
          $.ajax({
            url: '../../api/profile/get/index.php', // URL of the PHP script that will handle the insert
            method: 'POST',
            data: {
              phoneNumber: mobileNumber
            },
            success: function(response) {
              // Handle the response from the PHP script
              var data = JSON.parse(response);

              if (data.status == 201) {
                if (data.data.name == null || data.data.name == '') {
                  $('#menuname').text('Unknown');
                } else {
                  $('#menuname').text(data.data.name);
                }

                if (data.data.profile_pic == null || data.data.profile_pic == '') {
                  $('#menuProfilepic').attr('src', '../../../assets/images/avatar/user-skl.png');
                } else {
                  $('#menuProfilepic').attr('src', '../../../assets/images/avatar/' + data.data.profile_pic);
                }

                $('#menuphone').text('+91 ' + mobileNumber);
              }
            },
            error: function(xhr, status, error) {
              alert('Error: ' + error);
            }
          });
        } else {
          $('#menuname').text('Hey, I am not logged in!');
          $('#menuProfilepic').attr('src', '../../../assets/images/avatar/user-skl.png');
        }
      }
      headerdisplay()
    </script>
    </body>
    <!-- Body End -->

    </html>