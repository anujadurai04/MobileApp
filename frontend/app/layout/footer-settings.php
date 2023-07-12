    <!-- Footer Start -->
    <footer class="footer-wrap">
    	<ul class="footer">
    		<li class="footer-item">
    			<a href="../home/" class="footer-link">
    				<i class="iconly-Home icli"></i>
    				<span>Home</span>
    			</a>
    		</li>
    		<li class="footer-item">
    			<a href="../shop/" class="footer-link">
    				<i class="iconly-Category icli"></i>
    				<span>Category</span>
    			</a>
    		</li>
    		<li class="footer-item">
    			<a href="../search/" class="footer-link">
    				<i class="iconly-Search icli"></i>
    				<span>Search</span>
    			</a>
    		</li>
    		<li class="footer-item">
    			<a href="../offers/" class="footer-link">
    				<lord-icon class="icon" src="../../../assets/icons/gift.json" trigger="loop" stroke="70" colors="primary:#ffffff,secondary:#ffffff"></lord-icon>
    				<span class="offer">Offers</span>
    			</a>
    		</li>
    		<li class="footer-item">
    			<a href="#" id="checkout_cart" class="footer-link">
    				<b style="color:white;" id="count_cart"></b>
    				<i class="iconly-Bag-2 icli"></i>
    				<span>Cart</span>
    			</a>
    		</li>
    	</ul>
    </footer>
    <!-- Footer End -->

    <!-- Action Language Start -->
    <div class="action action-language offcanvas offcanvas-bottom" tabindex="-1" id="language" aria-labelledby="language">
    	<div class="offcanvas-body small">
    		<h2 class="m-b-title1 font-md">Select Language</h2>

    		<ul class="list">
    			<li>
    				<a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="../../../assets/icons/flag/us.svg" alt="us" /> English </a>
    			</li>

    			<li>
    				<a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="../../../assets/icons/flag/in.svg" alt="us" />Indian </a>
    			</li>

    			<li>
    				<a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="../../../assets/icons/flag/it.svg" alt="us" />Italian</a>
    			</li>

    			<li>
    				<a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="../../../assets/icons/flag/tf.svg" alt="us" /> French</a>
    			</li>

    			<li>
    				<a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="../../../assets/icons/flag/cn.svg" alt="us" /> Chines</a>
    			</li>
    		</ul>
    	</div>
    </div>
    <!-- Action Language End -->

    <!-- Pwa Install App Popup Start 
    <div class="offcanvas offcanvas-bottom addtohome-popup show" tabindex="-1" id="offcanvas">
      <div class="offcanvas-body small">
        <div class="app-info">
          <img src="../../../assets/images/logo/logo48.png" class="img-fluid" alt="" />
          <div class="content">
            <h3>Fastkart App <i data-feather="x" data-bs-dismiss="offcanvas"></i></h3>
            <a href="http://18.142.28.185/jdmobile/app/view/home/">www.jdapp.com</a>
          </div>
        </div>
        <button class="btn-solid install-app" id="installApp">Add to home screen</button>
      </div>
    </div>
     Pwa Install App Popup End -->

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
    <!-- <script src="../../../assets/js/homescreen-popup.js"></script> -->

    <!-- Theme Setting js -->
    <script src="../../../assets/js/theme-setting.js"></script>

    <!-- Script js -->
    <script src="../../../assets/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


    <script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-firestore.js"></script>
    <script>
    	$(document).ready(function() {

    		var register = localStorage.getItem('register');
    		register = JSON.parse(register);
    		console.log(register);

    		$('#phone-input').on('input', function() {
    			// Check if the input field has any value
    			if ($(this).val().trim() !== '') {
    				// Show the "Send OTP" button
    				$('#send_otp').show();
    				$("#updatesettings").hide();
    			} else {
    				// Hide the "Send OTP" button
    				$('#send_otp').hide();
    				$("#updatesettings").show();
    			}
    		});

    		function displaycart() {
    			var cart = localStorage.getItem('cart');
    			cart = JSON.parse(cart);

    			var register = localStorage.getItem('register');
    			register = JSON.parse(register);

    			var qtyByProductId = {};
    			var sum = 0;

    			if (register !== null) {
    				var mobileNumber = register[0].phoneNumber;

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
    								$('#profilename').text('Unknown');
    							} else {
    								$('#profilename').text(data.data.name);
    								$('#name-input').val(data.data.name);
    							}

    							if (data.data.profile_pic == null || data.data.profile_pic == '') {
    								$('#profilePicture').attr('src', '../../../assets/images/avatar/user-skl.png');
    							} else {
    								$('#profilePicture').attr('src', '../../../assets/images/avatar/' + data.data.profile_pic);
    							}

    							$('#profilephone').text('+91 ' + mobileNumber);
    						}
    					},
    					error: function(xhr, status, error) {
    						alert('Error: ' + error);
    					}
    				});

    				if (cart !== null) {

    					// Count the total quantity of each product in the cart
    					for (var i = 0; i < cart.length; i++) {
    						var productId = cart[i].id;
    						var quantity = cart[i].quantity;

    						sum += quantity;

    						if (qtyByProductId[productId] === undefined) {
    							qtyByProductId[productId] = quantity;
    						} else {
    							qtyByProductId[productId] += quantity;
    						}
    					}
    				}
    				if (sum > 0) {
    					$('#count_cart').html(sum);
    				} else {
    					$('#count_cart').html('');
    				}
    			} else {
    				location.replace("../mobile_register/index-settings.php");
    			}
    		}
    		displaycart()

    		$("#otp_box").hide();
    		$("#send_otp").hide();
    		$("#submit_otp").hide();
    		$("#updatesettings").show();

    		$(document).on('click', '#dismissAltermodal', function() {
    			//location.reload();
    			$('#Sendotp').modal("hide");
    			$('#alertmodal').modal('hide');
    		})

    		var firebaseConfig = {
    			apiKey: "AIzaSyAYFlW7WHi-zqf6Nll9gsbSpi0Z6AY5T34",
    			authDomain: "gdmproject-dcb60.firebaseapp.com",
    			projectId: "gdmproject-dcb60",
    			storageBucket: "gdmproject-dcb60.appspot.com",
    			messagingSenderId: "1053767706223",
    			appId: "1:1053767706223:web:0b6426cc32e2e1f8becf9a",
    			measurementId: "G-J3185QQS47"
    		};
    		firebase.initializeApp(firebaseConfig);
    		var appVerifier = new firebase.auth.RecaptchaVerifier('googleCaptcha', {
    			'size': 'invisible'
    		});

    		$("#send_otp").on('click', function() {

    			var number = "+91" + $("#phone-input").val();

    			var phoneRegex = /^\+91[1-9][0-9]{9}$/;

    			if (!phoneRegex.test(number)) {
    				$('#Sendotp').modal("hide");
    				$('#alertmodal').modal({
    					backdrop: 'static',
    					keyboard: false
    				})
    				$('#alertmodal').modal("show");
    				$('#alertmessage').html("Invalid Mobile Number!");
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

    						var register = localStorage.getItem('register');
    						$("#phone-input").prop('disabled', true);
    						$("#otp_box").show();
    						$("#send_otp").hide();
    						$("#submit_otp").show();
    						if (register === null) {
    							register = [];
    						} else {
    							register = JSON.parse(register);
    						}

    						$("#submit_otp").on('click', function() {

    							var numberinput = $("#phone-input").val();
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
    								var mobileNumber = register[0].phoneNumber;

    								confirmationResult.confirm(otp)
    									.then(function(result) {

    										$('#Sendotp').modal("hide");
    										$('#alertmodal').modal({
    											backdrop: 'static',
    											keyboard: false
    										})
    										$('#alertmodal').modal("show");
    										$('#alertmessage').html("Otp Verified Successfully!");
    										$("#otp_box").hide();
    										$("#submit_otp").hide();
    										$('#updatesettings').show();
    									}).catch(function(error) {
    										$('#Sendotp').modal("hide");
    										$('#alertmodal').modal({
    											backdrop: 'static',
    											keyboard: false
    										})
    										$('#alertmodal').modal("show");
    										$('#alertmessage').html(error.message);
    									});
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
    			}
    		})

    		$('#updatesettings').on('click', function(e) {
    			e.preventDefault(); // Prevent the default form submission behavior
    			var register = localStorage.getItem('register');
    			register = JSON.parse(register);

    			var mobileNumber = register[0].phoneNumber;

    			// Get the input values
    			var name = $('#name-input').val();
    			var phone = $('#phone-input').val();

    			// Create the data object to send
    			var formData = {
    				name: name,
    				phone: phone,
    				customerid: mobileNumber
    			};

    			// Send the AJAX request
    			$.ajax({
    				url: '../../api/profile/update/',
    				type: 'POST',
    				data: formData,
    				success: function(response) {
    					var data = JSON.parse(response);
    					if (data.status == 201) {
    						$('#alertmodal').modal({
    							backdrop: 'static',
    							keyboard: false
    						})
    						$('#alertmodal').modal("show");
    						$('#alertmessage').html(data.message);
    						$('#phone-input').val('');
    						// Handle the success response here
    						displaycart();
    					} else if (data.status == 200) {
    						localStorage.removeItem('register');
    						var register = [];
    						register.push({
    							phoneNumber: data.phonenumber,
    							verified: 1
    						});
    						$('#alertmodal').modal({
    							backdrop: 'static',
    							keyboard: false
    						})
    						$('#alertmodal').modal("show");
    						$('#alertmessage').html(data.message);
    						localStorage.setItem("register", JSON.stringify(register));
    						var register = localStorage.getItem('register');
    						console.log(register);
    						displaycart();
    					} else {
    						$('#alertmodal').modal({
    							backdrop: 'static',
    							keyboard: false
    						})
    						$('#alertmodal').modal("show");
    						$('#alertmessage').html(data.message);
    					}
    				},
    				error: function(xhr, status, error) {
    					$('#alertmodal').modal({
    						backdrop: 'static',
    						keyboard: false
    					})
    					$('#alertmodal').modal("show");
    					$('#alertmessage').html(data.message);
    					// Handle the error response here
    					console.error(error);
    				}
    			});
    		});

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
    		headerdisplay();

    		$('#editIcon').on('click', function() {
    			openGallery();
    		});
    		$('#galleryInput').on('change', function(e) {
    			handleGallerySelection(e);
    		});

    		function openGallery() {
    			$('#galleryInput').click();
    		}

    		function handleGallerySelection(event) {
    			var file = event.target.files[0];

    			if (file) {
    				var register = localStorage.getItem('register');
    				register = JSON.parse(register);

    				var mobileNumber = register[0].phoneNumber;

    				var formData = new FormData();
    				formData.append('profilePicture', file);
    				formData.append('mobileNumber', mobileNumber);
    				$.ajax({
    					url: '../../api/profile/profilePic_update/', // Replace with your actual endpoint URL
    					type: 'POST',
    					data: formData,
    					processData: false,
    					contentType: false,
    					success: function(response) {
    						var data = JSON.parse(response);
    						console.log(data);
    						if (data.status == 201) {
    							$('#alertmodal').modal({
    								backdrop: 'static',
    								keyboard: false
    							})
    							$('#alertmodal').modal("show");
    							$('#alertmessage').html(data.message);
    							displaycart();
    						} else {
    							$('#alertmodal').modal({
    								backdrop: 'static',
    								keyboard: false
    							})
    							$('#alertmodal').modal("show");
    							$('#alertmessage').html(data.message);
    						}
    					},
    					error: function(error) {
    						console.log('Error occurred while updating profile picture:', error);
    						// Handle error scenario, display error message, etc.
    					}
    				});
    			}
    		}

    		$('#checkout_cart').on('click', function() {
    			var cartlist = localStorage.getItem('cart');
    			var cart = JSON.parse(cartlist);

    			if (cart) {

    				for (var i = 0; i < cart.length; i++) {
    					if (cart[i].quantity === 0) {
    						cart.splice(i, 1);
    						i--;
    					}
    				}
    			}
    			// Save the modified cart back to localStorage
    			localStorage.setItem('cart', JSON.stringify(cart));

    			var cartlist = localStorage.getItem('cart');
    			var cart = JSON.parse(cartlist);

    			if (cart && cart.length > 0) {

    				// Save the modified cart back to localStorage
    				localStorage.setItem('cart', JSON.stringify(cart));
    				location.replace("../cart/");
    			} else {
    				$('#alertmodal').modal({
    					backdrop: 'static',
    					keyboard: false
    				})
    				$('#alertmodal').modal("show");
    				$('#alertmessage').html("Your Cart is Empty");

    			}
    		})

    	})
    </script>
    </body>
    <!-- Body End -->

    </html>