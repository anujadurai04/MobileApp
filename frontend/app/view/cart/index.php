<?php

include '../../layout/header-cart.php';
include 'skeleton-cart.php';

?>

<!-- Main Start -->
<main class="main-wrap cart-page mb-xxl">
  <!-- Cart Item Section Start  -->
  <div class="cart-item-wrap pt-0" id="cart-items">


  </div>
  <!-- Cart Item Section End  -->

  <!-- Coupons Section Start -->
  <!-- <section class="pt-0 coupon-ticket-wrap">
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
  </section> -->
  <!-- Coupons Section End  -->

  <!-- Order Detail Start -->
  <section class="order-detail pt-5">
    <h3 class="title-2">Order Details</h3>

    <!-- Detail list Start -->
    <ul>
      <li>
        <span>Total</span>
        <span id="priceT"></span>
      </li>

      <!-- <li>
        <span>Bag savings</span>
        <span class="font-theme">-$20.00</span>
      </li> -->

      <!-- <li>
        <span>Coupon Discount</span>
        <a href="offer.html" class="font-danger">Apply Coupon</a>
      </li>

      <li>
        <span>Delivery</span>
        <span>$50.00</span>
      </li> -->
      <li>
        <span>Total Amount</span>
        <span id="priceT1"></span>
      </li>
    </ul>
    <!-- Detail list End -->
  </section>
  <!-- Order Detail End -->
</main>
<!-- Main End -->


<div class="modal fade bd-example-modal-sm" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content text-center" style="padding: 20px;">
      <h3 class="title-color">Your cart is Empty</h3>
    </div>
  </div>
</div>
<div class="modal fade" id="deleteModal_confirm" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title" id="deletemodal">Confirm Deletion</h5>
        <button type="button" class="close" id="deletemodalHide" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="deletemodalHide1" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Yes</button>
      </div>
    </div>
  </div>
</div>


<?php include '../../layout/footer-cart.php' ?>

<script>
  function displaycart() {

    // Get the cart from localStorage
    var cart = localStorage.getItem('cart');
    cart = JSON.parse(cart);
    var totByProductId = {};

    // Check if the cart exists
    if (cart !== null) {
      // If the cart exists, parse the JSON string into an object
      //console.log(cart.length);
      if (cart.length > 0) {
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
              '<a href="../product/?pid=' + itemId + '" class="font-sm">' + itemName + '</a>' +
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
              '<a href="../product/?pid=' + itemId + '" class="font-sm">' + itemName + '</a>' +
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
          document.getElementById('cart-items').appendChild(itemElement);

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
        document.getElementById('cart-items').appendChild(itemElement);

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
      document.getElementById('cart-items').appendChild(itemElement);

    }

  }
  displaycart()

  function countamount() {
    var cart = localStorage.getItem('cart');
    var totByProductId = {};
    var qtyByProductId = {};

    var sumPrice = 0;

    if (cart !== null) {
      cart = JSON.parse(cart);

      // Count the total quantity of each product in the cart
      for (var i = 0; i < cart.length; i++) {
        var productId = cart[i].id;
        var quantity = cart[i].quantity;
        var totPrice = cart[i].price * quantity;

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

    if (sumPrice > 0) {
      $('#priceT').html('₹ ' + sumPrice.toFixed(2));
      $('#priceT1').html('₹ ' + sumPrice.toFixed(2));
    } else {
      $('#priceT').html('₹0.00');
      $('#priceT1').html('₹0.00');
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
  countamount()

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

  $("#checkoutOrder").on('click', function() {

    // Get the cart from localStorage
    var cart = localStorage.getItem('cart');
    cart = JSON.parse(cart);

    if (cart !== null) {
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
            var OrdId = generateOrderId();

            var login = localStorage.getItem('register');
            var phoneNumber = JSON.parse(login)[0].phoneNumber;

            var sumPrice = 0;
            var items = [];
            for (var i = 0; i < cart.length; i++) {
              // Access the properties of each item
              var item = {};
              item.itemId = cart[i].id;
              item.itemName = cart[i].name;
              item.itemQuantity = cart[i].quantity;
              item.itemprice = cart[i].price;
              item.itemoffer = cart[i].offer;
              item.totPrice = cart[i].price * cart[i].quantity;

              sumPrice += item.totPrice;

              items.push(item);
            }

            // execute the AJAX call
            $.ajax({
              url: '../../api/order/insert/index.php', // URL of the PHP script that will handle the insert
              method: 'POST',
              data: {
                items: JSON.stringify(items),
                sumPrice: sumPrice,
                OrderId: OrdId,
                phoneNumber: phoneNumber
              },
              success: function(response) {
                // Handle the response from the PHP script
                var data = JSON.parse(response);

                console.log(data);
                if (data.status == 201) {
                  var OrdById = data.data;

                  location.replace("../order_success/?order_id=" + OrdById);
                  localStorage.removeItem('cart');

                } else {
                  alert('Something went wrong!');
                }
              },
              error: function(xhr, status, error) {
                alert('Error: ' + error);
              }
            });
          }
        } else {
          location.replace("../mobile_register/");
        }
      } else {
        $("#alertmodal").modal("show");
      }
    } else {
      cart = [];
      $('#alertmodal').modal("show");

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

  $('.delete-product').on('click', function() {
    // Set the ID of the product to be deleted
    var proID = $(this).data('product');

    // Show the confirmation modal
    $('#deleteModal_confirm').modal("show");

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

    redirect("../cart/");
    // Reload the page to refresh the cart list
    //location.reload();
  };

  function redirect(location) {
    window.location.href = location;
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
    countamount()
    qty += minQty;

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
</script>