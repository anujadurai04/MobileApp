<?php 

include '../../layout/header.php'; 
include 'skeleton-cart.php';

?>
 
 <!-- Main Start -->
    <main class="main-wrap cart-page mb-xxl">
      <!-- Cart Item Section Start  -->
      <div class="cart-item-wrap pt-0">
        <div class="swipe-to-show">
          <div class="product-list media">
            <a href="product.html"><img src="assets/images/product/8.png" alt="offer" /></a>
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
        </div>

        <div class="swipe-to-show active">
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
        </div>

        <div class="swipe-to-show">
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
        </div>

        <div class="swipe-to-show">
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
        </div>
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