<?php 

include '../../layout/header.php';
include 'skeleton-index.php';

$catSQL = mysqli_query($link,"SELECT * FROM jdm_category");


 ?>


    <!-- Main Start -->
    <main class="main-wrap index-page mb-xxl">
      <!-- Search Box Start -->
      <div class="search-box">
        <i class="iconly-Search icli search"></i>
        <input class="form-control" type="search" placeholder="Search here..." />
        <i class="iconly-Voice icli mic"></i>
      </div>
      <!-- Search Box End -->

      <!-- Banner Section Start -->
      <section class="banner-section ratio2_1">
        <div class="h-banner-slider">
          <div>
            <div class="banner-box">
              <img src="../../../assets/images/banner/no-image.png" alt="banner" class="bg-img" />
              <div class="content-box">
                <h1 class="title-color font-md heading">Mobile parts</h1>
                <p class="content-color font-sm">Get instant delivery</p>
                <a href="shop.html" class="btn-solid font-sm">Shop Now</a>
              </div>
            </div>
          </div>

          <div>
            <div class="banner-box">
              <img src="../../../assets/images/banner/no-image.png" alt="banner" class="bg-img" />
              <div class="content-box">
                <h2 class="title-color font-md heading">Mobile parts</h2>
                <p class="content-color font-sm">Get instant delivery</p>
                <a href="shop.html" class="btn-solid font-sm">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Banner Section End -->

      <!-- Buy from Recently Bought Start -->
      <section class="recently pt-0">
        <div class="recently-wrap">
          <h3 class="font-md">Buy from Recently Bought</h3>
          <img class="corner" src="../../../assets/svg/corner.svg" alt="corner" />

          <div class="recently-list-slider recently-list">
            <div>
              <div class="item">
                <a href="product.html"><img src="../../../assets/images/product/2.png" alt="product" /></a>
              </div>
            </div>

            <div>
              <div class="item">
                <a href="product.html"><img src="../../../assets/images/product/3.png" alt="product" /></a>
              </div>
            </div>
            <div>
              <div class="item">
                <a href="product.html"><img src="../../../assets/images/product/1.png" alt="product" /></a>
              </div>
            </div>
            <div>
              <div class="item">
                <a href="product.html"><img src="../../../assets/images/product/no-image.png" alt="product" /></a>
              </div>
            </div>
            <div>
              <div class="item">
                <a href="product.html"><img src="../../../assets/images/product/7.png" alt="product" /></a>
              </div>
            </div>
            <div>
              <div class="item">
                <a href="product.html"><img src="../../../assets/images/product/no-image.png" alt="product" /></a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Buy from Recently Bought End -->

      <!-- Shop By Category Start -->
      <section class="category pt-0">
        <h3 class="font-md"><span>Shop By Category </span><span class="line"></span></h3>
		
        <div class="row gy-sm-4 gy-2">
		<?php 
			if (mysqli_num_rows($catSQL) > 0) {
		   // output data of each row
		   while($row = mysqli_fetch_assoc($catSQL)) {
			   $catID = $row['jdm_cate_id'];
			   $catName = $row["jdm_cate_name"];
			   $catActive = $row["jdm_cate_active"];
			   $catImage = $row['jdm_cat_image'];
		  ?>
          <div class="col-3">
            <div class="category-wrap">
              <div class="bg-shape bg-theme-blue border-blue"></div>
              <a href="../../../app/view/shop/index.php?catID=<?php echo $catID ?>"> 
			  
			  <?php if ($catImage == "no-image.png"){ ?>
			   <img class="category img-fluid" src="../../../assets/images/catagoeris/no-image.png" alt="category" /> 
			  <?php }else{ ?>
			  <img class="category img-fluid" src="../../../assets/images/catagoeris/antenna_wire.png" alt="category" /> 
			  <?php } ?>
			  </a>
              <span class="title-color"><?php echo $catName ?></span>
            </div>
          </div>
		  <?php
			  }
		   }
		  ?>
        </div>
      </section>
      <!-- Shop By Category End -->

      <!-- Say hello to Offers! Start 
      <section class="offer-section pt-0">
        <div class="offer">
          <div class="top-content">
            <div>
              <h4 class="title-color">Say hello to Offers!</h4>
              <p class="content-color">Best price ever of all the time</p>
            </div>
            <a href="offer.html" class="font-theme">See all</a>
          </div>

          <div class="offer-wrap">
            <div class="product-list media">
              <a href="product.html"><img src="../../../assets/images/product/8.png" class="img-fluid" alt="offer" /></a>
              <div class="media-body">
                <a href="product.html" class="font-sm"> Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
                <div class="plus-minus d-xs-none">
                  <i class="sub" data-feather="minus"></i>
                  <input type="number" value="1" min="0" max="10" />
                  <i class="add" data-feather="plus"></i>
                </div>
              </div>
            </div>

            <div class="product-list media">
              <a href="product.html"><img src="../../../assets/images/product/6.png" class="img-fluid" alt="offer" /></a>
              <div class="media-body">
                <a href="product.html" class="font-sm"> Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
                <div class="plus-minus d-xs-none">
                  <i class="sub" data-feather="minus"></i>
                  <input type="number" value="1" min="0" max="10" />
                  <i class="add" data-feather="plus"></i>
                </div>
              </div>
            </div>

            <div class="product-list media">
              <a href="product.html"><img src="../../../assets/images/product/7.png" class="img-fluid" alt="offer" /></a>
              <div class="media-body">
                <a href="product.html" class="font-sm"> Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
                <div class="plus-minus d-xs-none">
                  <i class="sub" data-feather="minus"></i>
                  <input type="number" value="1" min="0" max="10" />
                  <i class="add" data-feather="plus"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Say hello to Offers! End -->

      <!-- Lowest Price Start 
      <section class="low-price-section pt-0">
        <div class="top-content">
          <div>
            <h4 class="title-color">Lowest Price</h4>
            <p class="content-color">Pay less, Get More</p>
          </div>
          <a href="shop.html" class="font-theme">See all</a>
        </div>

        <div class="product-slider">
          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="../../../assets/images/product/10.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$08.99
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="../../../assets/images/product/11.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$40.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="../../../assets/images/product/11.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$20.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="../../../assets/images/product/12.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$21.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="../../../assets/images/product/13.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$17.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="../../../assets/images/product/9.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$30.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Lowest Price End -->

    </main>
    <!-- Main End -->


	
<?php include '../../layout/footer.php' ?>