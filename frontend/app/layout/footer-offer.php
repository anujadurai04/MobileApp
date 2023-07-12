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
    <!-- Pwa Install App Popup End -->

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
    	$('.errorpro').hide();

    	//localStorage.clear();
    	function displayCart() {
    		var cart = localStorage.getItem('cart');
    		cart = JSON.parse(cart);

    		console.log(cart);
    		var qtyByProductId = {};
    		var totByProductId = {};
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
    		} else {
    			cart = [];
    		}
    		if (sum > 0) {
    			$('#count_cart').html(sum + ' items');
    		} else {
    			$('#count_cart').html('0 items');
    		}

    		if (sumPrice > 0) {
    			$('#tot_price').html('₹ ' + sumPrice.toFixed(2));
    		} else {
    			$('#tot_price').html('₹ 0.00');
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

    		//console.log(cart);
    		if (cart === null) {
    			// If the cart does not exist, create a new one
    			cart = [];
    		} else {
    			// If the cart exists, parse the JSON string into an object
    			cart = JSON.parse(cart);
    		}
    		var itemIndex = -1;
    		if (cart !== null) {
    			itemIndex = cart.findIndex(function(cartItem) {
    				return cartItem.id === item.id;
    			});
    		}

    		if (itemIndex > -1) {
    			// If the item already exists, update the quantity
    			cart[itemIndex].quantity += 1;
    		} else {
    			// If the item does not exist, add it to the cart
    			cart.push(item);
    		}

    		// Stringify the cart object and save it to localStorage
    		localStorage.setItem('cart', JSON.stringify(cart));
    		removeemptyitems();
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
    		var itemIndex = -1;
    		if (cart !== null) {
    			itemIndex = cart.findIndex(function(cartItem) {
    				return cartItem.id === item.id;
    			});
    		}

    		if (itemIndex > -1) {
    			if (item.quantity == 0) {
    				cart[itemIndex].quantity = 0;
    			} else {
    				// If the item already exists, update the quantity
    				cart[itemIndex].quantity -= 1;
    			}

    		} else {
    			// If the item does not exist, add it to the cart
    			cart.push(item);
    		}

    		// Stringify the cart object and save it to localStorage
    		localStorage.setItem('cart', JSON.stringify(cart));
    		removeemptyitems();
    		console.log(JSON.stringify(cart));

    	}

    	function removeemptyitems() {
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
    	$('.add').on('click', function() {

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
    		displayCart()
    		qty += minQty; // Increment the quantity by the minimum quantity
    	});

    	$('.sub').on('click', function() {

    		var proID = $(this).closest('.product-list').data('product-id');
    		var name = $("#product_name-" + proID).val();
    		var qtyInput = $('#qty-' + proID);
    		var qty = parseInt(qtyInput.val());
    		var price = $("#product_price-" + proID).val();
    		var offer = $("#productOffer-" + proID).val();
    		var productimage = $("#productimg-" + proID).attr('src');
    		var minQty = parseInt(qtyInput.attr('min'));

    		if (qty >= minQty) {
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
    		} else {
    			var item = {
    				id: proID,
    				name: name,
    				price: price,
    				productimage: productimage,
    				offer: offer,
    				minqty: minQty,
    				quantity: 0
    			};
    			removetocart(item);
    		}
    		displayCart()
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
    			$("#emptymodal").modal("show")
    		}
    	})
    </script>
    </body>
    <!-- Body End -->

    </html>