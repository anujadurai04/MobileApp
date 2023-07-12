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


    <script>
    	$(document).ready(function() {

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
    					url: '../../api/order/getByid/index.php', // URL of the PHP script that will handle the insert
    					method: 'POST',
    					data: {
    						phoneNumber: mobileNumber
    					},
    					success: function(response) {
    						// Handle the response from the PHP script
    						var data = JSON.parse(response);

    						if (data.status == 200) {

    							var orders = data.data;

    							var cartItemsWrap = $('#cart-items');
    							cartItemsWrap.empty(); // Clear existing content
    							if (orders.length > 0) {

    								orders.forEach(function(order) {
    									var orderItemHtml = '<div class="product-list media">' +
    										'<i class="iconly-Bag-2 icli" style="font-size: 24px;"></i>' +
    										'<div class="media-body">' +
    										'<span>Order No #' + order.jdm_on_id + '</span>' +
    										'<span class="title-color font-sm">Order Amount ₹ ' + order.order_amount + '</span>' +
    										'<div style="position: absolute;bottom: calc(50px + (25 - 15) * ((100vw - 320px) / (1920 - 320)));right: calc(15px + (25 - 15) * ((100vw - 320px) / (1920 - 320)));}">' +
    										'<span class="title-color">' + order.status_name + '</span></div>' +
    										'<div class="plus-minus" style="background-color: #FF6347;">' +
    										'<a href="../order_details/?odt=' + order.jdm_on_id + '&mobile=' + mobileNumber + '" style="color:white;">View Order Details</a>' +
    										'</div>' +
    										'</div>' +
    										'</div>';
    									cartItemsWrap.append(orderItemHtml);
    								});
    							} else {
    								// Create a new product list item element
    								var itemElement = document.createElement('div');
    								itemElement.className = 'swipe-to-show';
    								itemElement.innerHTML = '<div class="product-list media">' +
    									'<h3 class="title-color">No Order details Available</h3>' +
    									'</div>';

    								// Add the new element to the cart items container
    								$('#cart-items').append(itemElement);
    							}
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
    				location.replace("../mobile_register/index-order.php");
    			}
    		}
    		displaycart()

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