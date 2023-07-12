<div class="modal fade bd-example-modal-sm" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content text-center" style="padding: 20px;">
			<h3 class="title-color">Your cart is Empty</h3>
		</div>
	</div>
</div>
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

<script>
	$imageLink = "https://huminn.api.jstacktech.com/gdmAdmin/uploads/products/";
	// Get the current page URL
	var currentPageUrl = window.location.href;

	// Get all the footer links
	var footerLinks = document.querySelectorAll('.footer-link');

	// Loop through the footer links
	for (var i = 0; i < footerLinks.length; i++) {
		var link = footerLinks[i];

		// Check if the link's href matches the current page URL
		if (link.href === currentPageUrl) {
			// Add the 'active' class to the parent li element
			link.parentNode.classList.add('active');
		}
	}

	$('#searchInput').click(function() {
		location.replace('../search/');
	})


	function recentbought(mobileNumber) {
		var customerid = mobileNumber;
		$.ajax({
			url: '../../api/profile/recentBought/', // URL of the PHP script that will handle the insert
			method: 'POST',
			data: {
				phoneNumber: customerid
			},
			success: function(response) {
				// Handle the response from the PHP script
				var data = JSON.parse(response);

				if (data.status == 201) {
					// Process the items received in the response
					var items = data.data; // Assuming the items are stored in the 'items' property of the response data

					// Get the recently-list-slider element
					var recentlyListSlider = $('.recently-list-slider');

					// Loop through the items and create the HTML for each item
					for (var i = 0; i < items.length; i++) {
						var item = items[i];
						var imageUrl = item.gdm_prod_image;
						var customerId = item.gdm_prod_id;

						if (!imageUrl) {
							// Replace the empty URL with the default image URL
							imageUrl = '../../../assets/images/product/no-image.png';
						} else {
							// Add the base URL to the image URL
							imageUrl = $imageLink + imageUrl;
						}

						// Create the HTML for the item and append it to the recently-list-slider element
						var html = '<div><div class="item"><a href="../product/?pid=' + customerId + '"><img src="' + imageUrl + '" alt="product" /></a></div></div>';
						recentlyListSlider.append(html);
					}
				} else {
					var recentlyListSlider = $('.recently-list-slider');
					recentlyListSlider.html('<div class="no-items-message" style="width:100%;">No items to display</div>');
				}

			},
			error: function(xhr, status, error) {
				alert('Error: ' + error);
			}
		});
	}

	function displayCart() {

		var cart = localStorage.getItem('cart');
		cart = JSON.parse(cart);

		var register = localStorage.getItem('register');
		register = JSON.parse(register);

		var qtyByProductId = {};
		var sum = 0;

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
					recentbought(mobileNumber);
					if (data.status == 201) {
						if (data.data.name == null || data.data.name == '') {
							$('#menuname').text('Unknown');
						} else {
							$('#menuname').text(data.data.name);
						}

						if (data.data.profile_pic == null || data.data.profile_pic == '') {
							$('#loginavatar').attr('src', '../../../assets/images/avatar/user-skl.png');
							$('#menuProfilepic').attr('src', '../../../assets/images/avatar/user-skl.png');

						} else {
							$('#menuProfilepic').attr('src', '../../../assets/images/avatar/' + data.data.profile_pic);
							$('#loginavatar').attr('src', '../../../assets/images/avatar/' + data.data.profile_pic);
						}

						$('#menuphone').text('+91 ' + mobileNumber);
					}
				},
				error: function(xhr, status, error) {
					alert('Error: ' + error);
				}
			});
		} else {
			var recentlyListSlider = $('.recently-list-slider');
			recentlyListSlider.html('<div class="no-items-message">No items to display</div>');
			$('#menuname').text('Hey, I am not logged in!');
			$('#menuProfilepic').attr('src', '../../../assets/images/avatar/user-skl.png');
			$('#loginavatar').attr('src', '../../../assets/images/avatar/user-skl.png');
		}

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
		} else {
			// Create an empty array
			var cartempty = [];

			// Convert the array to a string
			var cartString = JSON.stringify(cartempty);

			// Store the array in local storage
			localStorage.setItem("cart", cartString);
		}

		if (sum > 0) {
			$('#count_cart').html(sum);
		} else {
			$('#count_cart').html('');
		}

		// Display the total quantity of each product in the cart
		$('.product-list').each(function() {
			var productId = $(this).data('product-id');
			var qtyInput = $(this).find('input[name="qty"]');

			if (qtyByProductId[productId] !== undefined) {
				qtyInput.val(qtyByProductId[productId]);
			} else {
				qtyInput.val(0);
			}
		});
	}
	displayCart()

	function addToCart(item) {
		// Check if the cart already exists in localStorage
		var cart = localStorage.getItem('cart');
		if (cart === null) {
			// If the cart does not exist, create a new one
			cart = [];
		} else {
			// If the cart exists, parse the JSON string into an object
			cart = JSON.parse(cart);
		}
		// Check if the item already exists in the cart
		var itemIndex = cart.findIndex(function(cartItem) {
			return cartItem.id === item.id;
		});

		if (itemIndex > -1) {
			// If the item already exists, update the quantity
			cart[itemIndex].quantity += item.quantity;
		} else {
			// If the item does not exist, add it to the cart
			cart.push(item);
		}

		// Stringify the cart object and save it to localStorage
		localStorage.setItem('cart', JSON.stringify(cart));

		console.log(JSON.stringify(cart));
	}

	function removetocart(item) {
		// Check if the cart already exists in localStorage
		var cart = localStorage.getItem('cart');
		if (cart === null) {
			// If the cart does not exist, create a new one
			cart = [];
		} else {
			// If the cart exists, parse the JSON string into an object
			cart = JSON.parse(cart);
		}
		// Check if the item already exists in the cart
		var itemIndex = cart.findIndex(function(cartItem) {
			return cartItem.id === item.id;
		});

		if (itemIndex > -1) {
			if (item.quantity == 0) {
				cart[itemIndex].quantity = 0;
			} else {
				// If the item already exists, update the quantity
				cart[itemIndex].quantity -= item.quantity;
			}

		} else {
			// If the item does not exist, add it to the cart
			cart.push(item);
		}

		// Stringify the cart object and save it to localStorage
		localStorage.setItem('cart', JSON.stringify(cart));

		console.log(JSON.stringify(cart));
	}

	$('.add').on('click', function() {

		var proID = $(this).closest('.product-list').data('product-id');
		var qty = parseInt($('#qty-' + proID).val());
		var name = $("#product_name-" + proID).val();

		if (qty >= 0) {
			var item = {
				id: proID,
				name: name,
				quantity: 1,
			};
			addToCart(item);
		}
		displayCart()
		// Clear the input field after adding the item to the cart
		$('#qty').val(0);

	});

	$('.sub').on('click', function() {
		var proID = $(this).closest('.product-list').data('product-id');
		var name = $("#product_name-" + proID).val();
		var qty = parseInt($('#qty-' + proID).val());

		if (qty > 0) {
			var item = {
				id: proID,
				name: name,
				quantity: 1
			};
			removetocart(item);
		} else {
			var item = {
				id: proID,
				name: name,
				quantity: 0
			};
			removetocart(item);
		}
		displayCart()

		// Clear the input field after adding the item to the cart
		$('#qty').val(0);
	});
</script>

<script>
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
			$("#alertmodal").modal("show")
		}
	})
</script>

</body>
<!-- Body End -->

</html>