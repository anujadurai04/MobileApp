    <!-- Footer Start -->
    <footer class="footer-wrap shop">
    	<ul class="footer">

    		<li class="footer-item"><span class="font-xs" id="count_cart"></span> <span class="font-sm" id="tot_price"></span></li>
    		<li class="footer-item">
    			<a href="#" class="font-md" id="checkout_cart">View Cart <i data-feather="chevron-right"></i></a>
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

    		$('#searchInput').keyup(function() {
    			var cart = localStorage.getItem('cart');
    			cart = JSON.parse(cart);

    			if (cart === null) {
    				// If the cart does not exist, create a new one
    				cart = [];
    			}

    			var searchText = $(this).val();

    			if (searchText !== '') {

    				// Send AJAX request to the server
    				$.ajax({
    					url: '../../api/search/get/', // Replace with the actual server-side script URL
    					type: 'POST',
    					data: {
    						searchText: searchText
    					},
    					dataType: 'json',
    					success: function(response) {
    						// Clear previous search results
    						$('#searchResults').empty();
    						// Check if there are any results
    						if (response.length > 0) {
    							var dropdownContainer = $('<div class="dropdown-container"></div>');

    							// Iterate through the search results
    							for (var i = 0; i < response.length; i++) {

    								var item = {
    									id: parseInt(response[i].id),
    									name: response[i].name,
    									price: response[i].price,
    									productimage: response[i].productimage,
    									offer: response[i].offer,
    									minqty: parseInt(response[i].minqty),
    									quantity: parseInt(response[i].quantity)
    								};

    								var dropdownItem = $('<div class="dropdown-item"></div>');
    								var productName = $('<span class="product-name"></span>').text(response[i].name);
    								var addButton = $('<button class="add-button">Add</button>').text('Add');

    								if (isProductInCart(item.id)) {
    									addButton.prop('disabled', true);
    								}

    								productName.on('click', function(e) {
    									e.stopPropagation();
    									// Handle the click on the product name
    								});

    								addButton.on('click', function(e) {
    									e.stopPropagation();
    									var addButton = $(this);
    									addButton.prop('disabled', true);
    									addToCart($(this).data('itemData'));
    								});

    								addButton.data('itemData', item);

    								dropdownItem.append(productName);
    								dropdownItem.append(addButton);
    								dropdownContainer.append(dropdownItem);

    							}

    							$('#searchResults').append(dropdownContainer);
    						} else {
    							// Display a message when no results are found
    							var noResults = $('<a class="dropdown-item disabled"></a>').text('No results found');
    							$('#searchResults').append(noResults);
    						}
    						// Show the dropdown
    						$('#searchResults').show();
    					},
    					error: function(xhr, status, error) {
    						console.error('AJAX Error: ' + status + ' - ' + error);
    					}
    				});
    			} else {
    				$('#searchResults').hide();
    			}
    		});

    		function isProductInCart(productId) {
    			var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    			return cartItems.some(function(item) {
    				return item.id === productId;
    			});
    		}
    		// Hide the dropdown when clicking outside
    		$(document).click(function(event) {
    			if (!$(event.target).closest('.search-box').length) {
    				$('#searchResults').hide();
    			}
    		});

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

    				if (item.quantity === 0) {
    					cart[itemIndex].quantity = 0;
    				} else {
    					// If the item already exists, update the quantity
    					cart[itemIndex].quantity += 1;
    				}

    				//console.log(cart[itemIndex].quantity);
    			} else {

    				// If the item does not exist, add it to the cart
    				cart.push(item);
    			}

    			// Stringify the cart object and save it to localStorage
    			localStorage.setItem('cart', JSON.stringify(cart));
    			removeEmptyItems();
    			countamount();
    			updatedCart();
    			console.log(JSON.stringify(cart));
    		}

    		function updatedCart() {

    			// Get the cart from localStorage
    			var cart = localStorage.getItem('cart');
    			cart = JSON.parse(cart);
    			var totByProductId = {};

    			// Clear the existing cart items
    			$('#cart-items').empty();

    			console.log(cart);
    			// Check if the cart exists
    			if (cart.length > 0) {
    				// If the cart exists, parse the JSON string into an object

    				// Loop through the items in the cart
    				for (var i = 0; i < cart.length; i++) {
    					// Access the properties of each item
    					var itemId = cart[i].id;
    					var itemName = cart[i].name;
    					var itemQuantity = cart[i].quantity;
    					var itemprice = cart[i].price;
    					var itemimg = cart[i].productimage;
    					var itemoffer = cart[i].offer;
    					var minQty = cart[i].minqty;

    					if (itemoffer == 0) {
    						// Create a new product list item element
    						var itemElement = document.createElement('div');
    						itemElement.className = 'swipe-to-show';
    						itemElement.innerHTML = '<div class="product-list media" data-product-id="' + itemId + '">' +
    							'<input type="hidden" id="product_name-' + itemId + '" value="' + itemName + '" />' +
    							'<a href="../product/?pid=' + itemId + '"><img width="100%" id="productimg-' + itemId + '" src="' + itemimg + '" alt="' + itemName + '" /></a>' +
    							'<div class="media-body">' +
    							'<a href="../product/?pid=' + itemId + '" class="font-sm">' + itemName + '</a>' + ' <span class="content-color font-xs">500g</span>' +
    							'<span class="title-color font-sm">₹ ' + itemprice + '</span><input type="hidden" id="product_price-' + itemId + '" value="' + itemprice + '" />' +
    							'<input type="hidden" id="productOffer-' + itemId + '" value="' + itemoffer + '" /><span class="font-xs">Min qty: ' + minQty + '</span>' +
    							'<div class="plus-minus" style="right: calc(60px + (25 - 15) * ((100vw - 320px) / (1920 - 320)));bottom: calc(30px + (25 - 15) * ((100vw - 320px) / (1920 - 320)));"><i class="sub" data-feather="minus"></i>' +
    							'<input type="number" id="qty-' + itemId + '" value="' + itemQuantity + '" name="qty" value="0" min="' + minQty + '" readonly />' +
    							'<i class="add" data-feather="plus"></i></div>' +
    							'</div>' +
    							'<div class="trash-icon delete-button" style="right: 1px;"><a href="#" class="delete-product" data-product="' + itemId + '"><i class="trash" data-feather = "trash-2" style="color: #FF6347;" ></i></a>' +
    							'</div></div>';

    					} else {

    						// Create a new product list item element
    						var itemElement = document.createElement('div');
    						itemElement.className = 'swipe-to-show';
    						itemElement.innerHTML = '<div class="product-list media" data-product-id="' + itemId + '">' +
    							'<input type="hidden" id="product_name-' + itemId + '" value="' + itemName + '" />' +
    							'<a href="../product/?pid=' + itemId + '"><img width="100%" id="productimg-' + itemId + '" s src="' + itemimg + '" alt="' + itemName + '" /></a>' +
    							'<div class="media-body">' +
    							'<a href="../product/?pid=' + itemId + '"class="font-sm">' + itemName + '</a>' + ' <span class="content-color font-xs">500g</span>' +
    							'<span class="title-color font-sm">₹ ' + itemprice + '</span><input type="hidden" id="product_price-' + itemId + '" value="' + itemprice + '" />' +
    							'<input type="hidden" id="productOffer-' + itemId + '" value="' + itemoffer + '" /> <span class="badges-round bg-theme-theme font-xs" style="color: white;">offer ' + itemoffer + ' off</span></span><span class="font-xs">Min qty: ' + minQty + '</span>' +
    							'<div class="plus-minus" style="right: calc(60px + (25 - 15) * ((100vw - 320px) / (1920 - 320)));bottom: calc(30px + (25 - 15) * ((100vw - 320px) / (1920 - 320)));"><i class="sub" data-feather="minus"></i>' +
    							'<input type="number" id="qty-' + itemId + '" value="' + itemQuantity + '" name="qty" value="0" min="' + minQty + '" readonly />' +
    							'<i class="add" data-feather="plus"></i></div>' +
    							'</div>' +
    							'<div class="trash-icon delete-button" style="right: 1px;"><a href="#" class="delete-product" data-product="' + itemId + '"><i class="trash" data-feather = "trash-2" style="color: #FF6347;" ></i></a>' +
    							'</div></div>';
    					}

    					// Add the new element to the cart items container
    					$('#cart-items').append(itemElement);

    					// Replace the feather icons
    					feather.replace();

    				}
    			} else {
    				// Create a new product list item element
    				var itemElement = document.createElement('div');
    				itemElement.className = 'swipe-to-show';
    				itemElement.innerHTML = '<div class="product-list media">' +
    					'<h3 class="title-color">Your cart is Empty</h3>' +
    					'</div>';
    				// Add the new element to the cart items container
    				$('#cart-items').append(itemElement);

    			}
    		}

    		function displaycart() {
    			// Get the cart from localStorage
    			var cart = localStorage.getItem('cart');
    			cart = JSON.parse(cart);
    			var totByProductId = {};

    			// Clear the existing cart items
    			$('#cart-items').empty();

    			console.log(cart);
    			if (cart !== null) {

    				// Check if the cart exists
    				if (cart.length > 0) {
    					// If the cart exists, parse the JSON string into an object

    					//console.log(cart.length);

    					// Loop through the items in the cart
    					for (var i = 0; i < cart.length; i++) {
    						// Access the properties of each item
    						var itemId = cart[i].id;
    						var itemName = cart[i].name;
    						var itemQuantity = cart[i].quantity;
    						var itemprice = cart[i].price;
    						var itemimg = cart[i].productimage;
    						var itemoffer = cart[i].offer;
    						var minQty = cart[i].minqty;

    						if (itemoffer == 0) {
    							// Create a new product list item element
    							var itemElement = document.createElement('div');
    							itemElement.className = 'swipe-to-show';
    							itemElement.innerHTML = '<div class="product-list media" data-product-id="' + itemId + '">' +
    								'<input type="hidden" id="product_name-' + itemId + '" value="' + itemName + '" />' +
    								'<a href="../product/?pid=' + itemId + '"><img width="100%" id="productimg-' + itemId + '" src="' + itemimg + '" alt="' + itemName + '" /></a>' +
    								'<div class="media-body">' +
    								'<a href="../product/?pid=' + itemId + '" class="font-sm">' + itemName + '</a>' + ' <span class="content-color font-xs">500g</span>' +
    								'<span class="title-color font-sm">₹ ' + itemprice + '</span><input type="hidden" id="product_price-' + itemId + '" value="' + itemprice + '" />' +
    								'<input type="hidden" id="productOffer-' + itemId + '" value="' + itemoffer + '" /><span class="font-xs">Min qty: ' + minQty + '</span>' +
    								'<div class="plus-minus" style="right: calc(60px + (25 - 15) * ((100vw - 320px) / (1920 - 320)));bottom: calc(30px + (25 - 15) * ((100vw - 320px) / (1920 - 320)));"><i class="sub" data-feather="minus"></i>' +
    								'<input type="number" id="qty-' + itemId + '" value="' + itemQuantity + '" name="qty" value="0" min="' + minQty + '" readonly />' +
    								'<i class="add" data-feather="plus"></i></div>' +
    								'</div>' +
    								'<div class="trash-icon delete-button" style="right: 1px;"><a href="#" class="delete-product" data-product="' + itemId + '"><i class="trash" data-feather = "trash-2" style="color: #FF6347;" ></i></a>' +
    								'</div></div>';

    						} else {

    							// Create a new product list item element
    							var itemElement = document.createElement('div');
    							itemElement.className = 'swipe-to-show';
    							itemElement.innerHTML = '<div class="product-list media" data-product-id="' + itemId + '">' +
    								'<input type="hidden" id="product_name-' + itemId + '" value="' + itemName + '" />' +
    								'<a href="../product/?pid=' + itemId + '"><img width="100%" id="productimg-' + itemId + '" s src="' + itemimg + '" alt="' + itemName + '" /></a>' +
    								'<div class="media-body">' +
    								'<a href="../product/?pid=' + itemId + '" class="font-sm">' + itemName + '</a>' + ' <span class="content-color font-xs">500g</span>' +
    								'<span class="title-color font-sm">₹ ' + itemprice + '</span><input type="hidden" id="product_price-' + itemId + '" value="' + itemprice + '" />' +
    								'<input type="hidden" id="productOffer-' + itemId + '" value="' + itemoffer + '" /> <span class="badges-round bg-theme-theme font-xs" style="color: white;">offer' + itemoffer + ' off</span></span><span class="font-xs">Min qty: ' + minQty + '</span>' +
    								'<div class="plus-minus" style="right: calc(60px + (25 - 15) * ((100vw - 320px) / (1920 - 320)));bottom: calc(30px + (25 - 15) * ((100vw - 320px) / (1920 - 320)));"><i class="sub" data-feather="minus"></i>' +
    								'<input type="number" id="qty-' + itemId + '" value="' + itemQuantity + '" name="qty" value="0" min="' + minQty + '" readonly />' +
    								'<i class="add" data-feather="plus"></i></div>' +
    								'</div>' +
    								'<div class="trash-icon delete-button" style="right: 1px;"><a href="#" class="delete-product" data-product="' + itemId + '"><i class="trash" data-feather = "trash-2" style="color: #FF6347;" ></i></a>' +
    								'</div></div>';
    						}

    						// Add the new element to the cart items container
    						$('#cart-items').append(itemElement);

    						// Replace the feather icons
    						feather.replace();

    					}

    				} else {
    					cart = [];
    					// Create a new product list item element
    					var itemElement = document.createElement('div');
    					itemElement.className = 'swipe-to-show';
    					itemElement.innerHTML = '<div class="product-list media">' +
    						'<h3 class="title-color">Your cart is Empty</h3>' +
    						'</div>';

    					// Add the new element to the cart items container
    					$('#cart-items').append(itemElement);
    				}
    			} else {
    				cart = [];
    				// Create a new product list item element
    				var itemElement = document.createElement('div');
    				itemElement.className = 'swipe-to-show';
    				itemElement.innerHTML = '<div class="product-list media">' +
    					'<h3 class="title-color">Your cart is Empty</h3>' +
    					'</div>';

    				// Add the new element to the cart items container
    				$('#cart-items').append(itemElement);

    			}
    		}
    		displaycart()

    		function countamount() {
    			var cart = localStorage.getItem('cart');
    			cart = JSON.parse(cart);
    			var totByProductId = {};
    			var qtyByProductId = {};
    			var sum = 0;
    			var sumPrice = 0;

    			if (cart !== null) {

    				// Count the total quantity of each product in the cart
    				for (var i = 0; i < cart.length; i++) {
    					var productId = cart[i].id;
    					var quantity = cart[i].quantity;
    					var totPrice = cart[i].price * quantity;

    					sum += quantity;
    					sumPrice += totPrice;

    					if (qtyByProductId[productId] === undefined) {
    						qtyByProductId[productId] = quantity;
    					} else {
    						qtyByProductId[productId] += quantity;
    					}

    					if (totByProductId[productId] === undefined) {
    						totByProductId[productId] = totPrice;
    					} else {
    						totByProductId[productId] += totPrice;
    					}
    				}
    			}

    			if (sum > 0) {
    				$('#count_cart').html(sum + ' items');
    			} else {
    				$('#count_cart').html('0 items');
    			}

    			if (sumPrice > 0) {
    				$('#tot_price').html('₹ ' + sumPrice.toFixed(2));
    			} else {
    				$('#tot_price').html('₹0.00');
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
    		countamount();

    		function generateOrderId() {
    			var staticWord = "ord";
    			const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    			let orderId = '';
    			for (let i = 0; i < 10; i++) {
    				orderId += chars.charAt(Math.floor(Math.random() * chars.length));
    			}
    			var oId = staticWord + orderId;
    			return (oId);
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

    				if (item.quantity === 0) {
    					cart[itemIndex].quantity = 0;

    					$("#qty-" +
    						item.id).val(cart[itemIndex].quantity);
    				} else {
    					// If the item already exists, update the quantity
    					cart[itemIndex].quantity -= 1;
    					$("#qty-" +
    						item.id).val(cart[itemIndex].quantity);
    				}

    			} else {
    				// If the item does not exist, add it to the cart
    				cart.push(item);
    			}

    			// Stringify the cart object and save it to localStorage
    			localStorage.setItem('cart', JSON.stringify(cart));
    			removeEmptyItems();
    			console.log(JSON.stringify(cart));
    		}

    		function removeEmptyItems() {
    			var cartlist = localStorage.getItem('cart');
    			var cart = JSON.parse(cartlist);

    			for (var i = 0; i < cart.length; i++) {
    				if (cart[i].quantity === 0) {
    					cart.splice(i, 1);
    					i--;
    				}
    			}
    			// Save the modified cart back to localStorage
    			localStorage.setItem('cart', JSON.stringify(cart));

    			var cartlist = localStorage.getItem('cart');
    			var cart = JSON.parse(cartlist);

    			if (cart && cart.length > 0) {

    				// Save the modified cart back to localStorage
    				localStorage.setItem('cart', JSON.stringify(cart));
    			}

    		}

    		$(document).on('click', '.delete-product', function() {

    			// Set the ID of the product to be deleted
    			var proID = $(this).data('product');

    			// Add a click event listener to the "Yes" button
    			$('#confirmDelete').on('click', function() {
    				DeleteItem(proID);
    			});

    			$('#deletemodalHide').on('click', function() {
    				$('#deleteModal_confirm').modal("hide");
    			});

    			$('#deletemodalHide1').on('click', function() {
    				$('#deleteModal_confirm').modal("hide");
    			});

    			// Show the confirmation modal
    			$('#deleteModal_confirm').modal("show");

    		});

    		function DeleteItem(proID) {

    			var cartlist = localStorage.getItem('cart');
    			var cart = JSON.parse(cartlist);

    			// Find the index of the product with the matching ID
    			var index = cart.findIndex(function(item) {
    				return item.id === proID;
    			});

    			// Remove the product from the cart if it exists
    			if (index !== -1) {
    				cart.splice(index, 1);
    			}

    			// Save the modified cart back to localStorage
    			localStorage.setItem('cart', JSON.stringify(cart));

    			// Reload the page to refresh the cart list
    			redirect("../search/");
    		};

    		function redirect(location) {
    			window.location.href = location;
    		}

    		$(document).on('click', '.add', function() {
    			var proID = $(this).closest('.product-list').data('product-id');
    			var qtyInput = $('#qty-' + proID);
    			var qty = parseInt(qtyInput.val());
    			var minQty = parseInt(qtyInput.attr('min'));
    			var name = $("#product_name-" + proID).val();
    			var price = $("#product_price-" + proID).val();
    			var offer = $("#productOffer-" + proID).val();
    			var productimage = $("#productimg-" + proID).attr('src');

    			qty = minQty;

    			if (qty >= minQty) {
    				var item = {
    					id: proID,
    					name: name,
    					price: price,
    					productimage: productimage,
    					offer: offer,
    					minqty: minQty,
    					quantity: qty,
    				};
    				addToCart(item);
    			}
    			countamount();
    			qty += minQty;

    		});

    		$(document).on('click', '.sub', function() {
    			var proID = $(this).closest('.product-list').data('product-id');
    			var name = $("#product_name-" + proID).val();
    			var qtyInput = $('#qty-' + proID);
    			var qty = parseInt(qtyInput.val());
    			var price = $("#product_price-" + proID).val();
    			var offer = $("#productOffer-" + proID).val();
    			var productimage = $("#productimg-" + proID).attr('src');
    			var minQty = parseInt(qtyInput.attr('min'));

    			if (qty > minQty) {
    				var item = {
    					id: proID,
    					name: name,
    					price: price,
    					productimage: productimage,
    					offer: offer,
    					minqty: minQty,
    					quantity: qty
    				};
    				removetocart(item);
    			}
    			countamount();
    		});

    		$('#checkout_cart').on('click', function() {
    			var cartlist = localStorage.getItem('cart');
    			var cart = JSON.parse(cartlist);

    			for (var i = 0; i < cart.length; i++) {
    				if (cart[i].quantity === 0) {
    					cart.splice(i, 1);
    					i--;
    				}
    			}
    			// Save the modified cart back to localStorage
    			localStorage.setItem('cart', JSON.stringify(cart));

    			var cartlist = localStorage.getItem('cart');
    			cart = JSON.parse(cartlist);

    			if (cart && cart.length > 0) {

    				// Save the modified cart back to localStorage
    				localStorage.setItem('cart', JSON.stringify(cart));
    				location.replace("../cart/");
    			} else {
    				$("#alertmodal").modal("show")
    			}
    		})
    	})
    </script>
    </body>
    <!-- Body End -->

    </html>