<?php

include '../../layout/header-others.php';

?>

<!-- Main Start -->
<main class="main-wrap order-success-page mb-xxl">
  <!-- Banner Section Start -->
  <section class="banner-section">
    <div class="banner-wrap">
      <img src="../../../assets/svg/order-success.svg" alt="order-success" />
    </div>

    <div class="content-wrap">
      <h1 class="font-lg title-color">Thank you for your order!</h1>
      <p class="font-sm content-color">your order has been placed successfully. your order ID is <span id="orderIddisplay1"></span></p>
    </div>
  </section>
  <!-- Banner Section End -->

  <!-- Order Id Section Start -->
  <section class="order-id-section">
    <div class="media">
      <span><i class="iconly-Calendar icli"></i></span>
      <div class="media-body">
        <h2 class="font-sm color-title">Order Date</h2>
        <span class="content-color ordertime"></span>
      </div>
    </div>

    <div class="media">
      <span><i class="iconly-Document icli"></i></span>
      <div class="media-body">
        <h2 class="font-sm color-title">Order ID</h2>
        <span class="content-color orderIddisplay"></span>
      </div>
    </div>
  </section>
  <!-- Order Id Section End -->

  <!-- Order Detail Start -->
  <section class="order-detail">
    <h3 class="title-2">Order Details</h3>
    <!-- Product Detail  Start -->
    <ul>
      <li>
        <span>Total</span>
        <span id="totalAmt"></span>
      </li>

      <!-- <li>
        <span>Bag savings</span>
        <span class="font-theme">-$20.00</span>
      </li> -->

      <!-- <li>
        <span>Delivery</span>
        <span>$50.00</span>
      </li> -->

      <li>
        <span>Total Amount</span>
        <span id="finalAmt"></span>
      </li>
    </ul>
    <!-- Product Detail  End -->
  </section>
  <!-- Order Detail End -->
</main>
<!-- Main End -->

<!-- Footer Start -->
<footer class="footer-wrap footer-button">
  <!-- <a href="order-tracking.html" class="font-md">Track Package on Map</a> -->
  <a href="../home/" class="font-md">Back to Home</a>
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

<!-- jquery 3.6.0 -->
<script src="../../../assets/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Js -->
<script src="../../../assets/js/bootstrap.bundle.min.js"></script>

<!-- Feather Icon -->
<script src="../../../assets/js/feather.min.js"></script>

<!-- Theme Setting js -->
<script src="../../../assets/js/theme-setting.js"></script>

<!-- Script js -->
<script src="../../../assets/js/script.js"></script>

<script>
  function displayCart() {
    var cart = localStorage.getItem('cart');
    cart = JSON.parse(cart);
    if (cart === null) {
      // If the cart does not exist, create a new one
      cartvalue = [];
    } else {
      // If the cart exists, parse the JSON string into an object
      cartvalue = JSON.parse(cart);
    }

    localStorage.setItem('cart', JSON.stringify(cartvalue));
    // Retrieve order ID from query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const order_id = urlParams.get('order_id');

    // Fetch order details using AJAX request
    $.ajax({
      url: "../../api/order/get/",
      type: "POST",
      data: {
        order_id: order_id
      },
      dataType: "json",
      success: function(data) {
        console.log(data);
        // Display order details on page
        $(".orderIddisplay").text("#" + data.jdm_on_id);
        $("#orderIddisplay1").text("#" + data.jdm_on_id);
        $(".ordertime").text(data.jdm_on_timestamp);
        $("#finalAmt").text("₹ " + data.order_amount);
        $("#totalAmt").text("₹ " + data.order_amount);
        // etc.
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log("Error fetching order details: " + textStatus);
      }
    });

  }
  displayCart()
  //localStorage.removeItem('cart');
</script>
</body>
<!-- Body End -->


</html>
<!-- Html End -->