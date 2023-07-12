<?php

include '../../layout/header.php';
include 'skeleton-cart.php';

?>

<!-- Main Start -->
<main class="main-wrap cart-page mb-xxl">
  <!-- Cart Item Section Start  -->
  <div class="cart-item-wrap pt-0" id="cart-items">

    <!-- <div class="swipe-to-show">
      <div class="product-list media">
        <a href="product.html"><img src="assets/images/product/8.png" alt="offer" /></a>
        <div class="media-body">
          <a href="product.html" class="font-sm"> </a>
          <span class="content-color font-xs">500g</span>
          <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
          <div class="plus-minus">
            <i class="sub" data-feather="minus"></i>
            <input type="number" value="0" min="0" max="10" />
            <i class="add" data-feather="plus"></i>
          </div>
        </div>
      </div>
      <div class="delete-button" data-bs-toggle="offcanvas" data-bs-target="#confirmation" aria-controls="confirmation">
        <i data-feather="trash"></i>
      </div>
    </div> -->

    <!-- <div class="swipe-to-show active">
      <div class="product-list media">
        <a href="product.html"><img src="assets/images/product/6.png" alt="offer" /></a>
        <div class="media-body">
          <a href="product.html" class="font-sm"> Assorted Capsicum Combo </a>
          <span class="content-color font-xs">500g</span>
          <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
          <div class="plus-minus">
            <i class="sub" data-feather="minus"></i>
            <input type="number" value="1" min="0" max="10" />
            <i class="add" data-feather="plus"></i>
          </div>
        </div>
      </div>
      <div class="delete-button" data-bs-toggle="offcanvas" data-bs-target="#confirmation" aria-controls="confirmation">
        <i data-feather="trash"></i>
      </div>
    </div> -->

    <!-- <div class="swipe-to-show">
      <div class="product-list media">
        <a href="product.html"><img src="assets/images/product/7.png" alt="offer" /></a>
        <div class="media-body">
          <a href="product.html" class="font-sm"> Assorted Capsicum Combo </a>
          <span class="content-color font-xs">500g</span>
          <span class="title-color font-sm">$25.00 </span>
          <div class="plus-minus">
            <i class="sub" data-feather="minus"></i>
            <input type="number" value="1" min="0" max="10" />
            <i class="add" data-feather="plus"></i>
          </div>
        </div>
      </div>
      <div class="delete-button" data-bs-toggle="offcanvas" data-bs-target="#confirmation" aria-controls="confirmation">
        <i data-feather="trash"></i>
      </div>
    </div> -->

    <!-- <div class="swipe-to-show">
      <div class="product-list media">
        <a href="product.html"><img src="assets/images/product/11.png" alt="offer" /></a>
        <div class="media-body">
          <a href="product.html" class="font-sm"> Assorted Capsicum Combo </a>
          <span class="content-color font-xs">500g</span>
          <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
          <div class="plus-minus">
            <i class="sub" data-feather="minus"></i>
            <input type="number" value="1" min="0" max="10" />
            <i class="add" data-feather="plus"></i>
          </div>
        </div>
      </div>
      <div class="delete-button" data-bs-toggle="offcanvas" data-bs-target="#confirmation" aria-controls="confirmation">
        <i data-feather="trash"></i>
      </div>
    </div> -->
  </div>
  <!-- Cart Item Section End  -->

  <!-- Coupons Section Start -->
  <section class="pt-0 coupon-ticket-wrap">
    <div class="coupon-ticket" data-bs-toggle="offcanvas" data-bs-target="#offer-1" aria-controls="offer-1">
      <div class="media">
        <div class="off">
          <span>50</span>
          <span><span>%</span><span>OFF</span> </span>
        </div>
        <div class="media-body">
          <h2 class="title-color">on your first order</h2>
          <span class="content-color">on order above $250.00</span>
        </div>
        <div class="big-circle">
          <span></span>
        </div>
        <div class="code">
          <span class="content-color">Use Code: </span>
          <a href="javascript:void(0)">SCD450</a>
        </div>
      </div>
      <div class="circle-5 left">
        <span class="circle-shape"></span>
        <span class="circle-shape"></span>
      </div>
      <div class="circle-5 right">
        <span class="circle-shape"></span>
        <span class="circle-shape"></span>
      </div>
    </div>
  </section>
  <!-- Coupons Section End  -->

  <!-- Order Detail Start -->
  <section class="order-detail pt-0">
    <h3 class="title-2">Order Details</h3>

    <!-- Detail list Start -->
    <ul>
      <li>
        <span>Bag total</span>
        <span>$220.00</span>
      </li>

      <li>
        <span>Bag savings</span>
        <span class="font-theme">-$20.00</span>
      </li>

      <li>
        <span>Coupon Discount</span>
        <a href="offer.html" class="font-danger">Apply Coupon</a>
      </li>

      <li>
        <span>Delivery</span>
        <span>$50.00</span>
      </li>
      <li>
        <span>Total Amount</span>
        <span>$270.00</span>
      </li>
    </ul>
    <!-- Detail list End -->
  </section>
  <!-- Order Detail End -->
</main>
<!-- Main End -->

<?php include '../../layout/footer-cart.php' ?>

<script>
  function displaycart() {

    // Get the cart from localStorage
    var cart = localStorage.getItem('cart');

    console.log(cart);
    // Check if the cart exists
    if (cart) {
      // If the cart exists, parse the JSON string into an object
      cart = JSON.parse(cart);

      //console.log(cart.length);
      if (cart.length > 0) {
        // Loop through the items in the cart
        for (var i = 0; i < cart.length; i++) {
          // Access the properties of each item
          var itemId = cart[i].id;
          var itemName = cart[i].name;
          var itemQuantity = cart[i].quantity;

          // Create a new product list item element
          var itemElement = document.createElement('div');
          itemElement.className = 'swipe-to-show';
          itemElement.innerHTML = '<div class="product-list media" data-product-id="' + itemId + '">' +
            '<input type="hidden" id="product_name-' + itemId + '" value="' + itemName + '" />' +
            '<a href="product.html"><img src="../../../assets/images/product/11.png" alt="' + itemName + '" /></a>' +
            '<div class="media-body">' +
            '<a href="product.html" class="font-sm">' + itemName + '</a>'  +
            '<span class="title-color font-sm">$25.00</span>' +
            '<div class="plus-minus"><i class="sub" data-feather="minus"></i>' +
            '<input type="number" id="qty-' + itemId + '" value="' + itemQuantity + '" name="qty" value="0" min="0" readonly />' +
            '<i class="add" data-feather="plus"></i></div>' +
            '<div class="trash-icon">' +
            '<a href="#" class="delete-product" data-product="' + itemId + '"><i class="trash" data-feather = "trash-2" style="color: #FF6347;" ></i></a>' +
            '</div></div></div></div>';

          // Add the new element to the cart items container
          document.getElementById('cart-items').appendChild(itemElement);

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
        document.getElementById('cart-items').appendChild(itemElement);

      }
    } else {
      // Create a new product list item element
      var itemElement = document.createElement('div');
      itemElement.className = 'swipe-to-show';
      itemElement.innerHTML = '<div class="product-list media">' +
        '<h3 class="title-color">Your cart is Empty</h3>' +
        '</div>';

      // Add the new element to the cart items container
      document.getElementById('cart-items').appendChild(itemElement);

    }
  }
  displaycart()

  $("#checkout").on('click', function() {

    // Get the cart from localStorage
    var cart = localStorage.getItem('cart');
    cart = JSON.parse(cart);

    //console.log(cart.length);
    if (cart.length > 0) {
      // Get the cart from localStorage
      var login = localStorage.getItem('register');

      if (login === null) {

        login = [];

      } else {

        login = JSON.parse(login);
      }

      if (login.length > 0) {
        var phoneno_verified = login[0].verified;

        if (phoneno_verified === 0) {
          location.replace("../mobile_register/");
        } else {
          location.replace("../payment/");
        }
      } else {
        location.replace("../mobile_register/");
      }
    } else {
      alert('cart is empty');
    }

  })

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

      $("#qty-" +
        item.id).val(cart[itemIndex].quantity);

      //console.log(cart[itemIndex].quantity);
    } else {
      // If the item does not exist, add it to the cart
      cart.push(item);
    }

    // Stringify the cart object and save it to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

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

  }

  $('.delete-product').on('click', function() {

    var proID = $(this).data('product');

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
    location.reload();
  });

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

      // If the item already exists, update the quantity
      cart[itemIndex].quantity -= item.quantity;

      $("#qty-" +
        item.id).val(cart[itemIndex].quantity);

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

    // Clear the input field after adding the item to the cart
    $('#qty').val(0);

  });

  $('.sub').on('click', function() {
    var proID = $(this).closest('.product-list').data('product-id');
    var name = $("#product_name-" + proID).val();
    var qty = parseInt($('#qty-' + proID).val());

    if (qty > 1) {
      var item = {
        id: proID,
        name: name,
        quantity: 1
      };
      removetocart(item);
    }

    // Clear the input field after adding the item to the cart
    $('#qty').val(0);
  });
</script>