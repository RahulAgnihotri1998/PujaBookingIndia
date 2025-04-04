<!DOCTYPE html>
<html lang="en">

<meta content="text/html;charset=utf-8" http-equiv="content-type" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Pujabookingindia - Book Your Puja Online</title>

  <!--===== FAVICON =======-->
  <link href="img/favicon-bg.png" rel="shortcut icon" type="image/x-icon" />

  <!--===== META TAGS FOR SEO =======-->
  <meta name="description" content="Book puja services online with Pujabookingindia. Find the best pandits, puja samagri, and rituals for all occasions across India." />
  <meta name="keywords" content="puja booking, online puja, pandit booking, puja samagri, Hindu rituals, Pujabookingindia" />
  <meta name="robots" content="index, follow" />
  <meta name="author" content="Pujabookingindia Team" />

  <!--===== OPEN GRAPH (OG) TAGS FOR SOCIAL SHARING =======-->
  <meta property="og:title" content="Pujabookingindia - Book Your Puja Online" />
  <meta property="og:description" content="Simplify your spiritual journey with Pujabookingindia. Book pandits and puja services online for all occasions." />
  <meta property="og:image" content="./img/banner-3.png" /> <!-- Replace with actual image URL -->
  <meta property="og:url" content="https://pujabookingindia.com" /> <!-- Replace with your site URL -->
  <meta property="og:type" content="website" />

  <!--===== TWITTER CARD TAGS =======-->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Pujabookingindia - Book Your Puja Online" />
  <meta name="twitter:description" content="Book puja services online easily with Pujabookingindia. Pandits, samagri, and more!" />
  <meta name="twitter:image" content="./img/banner-3.png" /> <!-- Replace with actual image URL -->

  <!--===== CSS LINK =======-->
  <link href="assets/css/plugins/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/plugins/aos.css" rel="stylesheet" />
  <link href="assets/css/plugins/fontawesome.css" rel="stylesheet" />
  <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet" />
  <link href="assets/css/plugins/mobile.css" rel="stylesheet" />
  <link href="assets/css/plugins/owlcarousel.min.css" rel="stylesheet" />
  <link href="assets/css/plugins/sidebar.css" rel="stylesheet" />
  <link href="assets/css/plugins/slick-slider.css" rel="stylesheet" />
  <link href="assets/css/plugins/nice-select.css" rel="stylesheet" />
  <link href="assets/css/plugins/swiper-slider.css" rel="stylesheet" />
  <link href="assets/css/main.css" rel="stylesheet" />

  <!--===== JS SCRIPT LINK =======-->
  <script src="assets/js/plugins/jquery-3-7-1.min.js"></script>
<head>
<style>
  .homepage2-body .header-area.homepage2 .header-elements .site-logo {
    height: 64px;
    width: 180px;
    object-fit: contain;
}
.homepage2-body .header-area.homepage2 .header-elements {
 
    background: rgb(245 211 174);

}



.header-area.homepage2.sticky {
  background: rgb(245 211 174);
}
.cta1-section-area {
  
    margin-bottom: -24px;
}
.homepage2-body .header-area.homepage2 .header-elements .main-menu ul li:hover > a {
   
    color: #ff0000 !important;
}
</style>
<body class="homepage2-body">
  <!--===== PRELOADER STARTS =======-->
 
  <!--===== PRELOADER ENDS =======-->
  <!--===== PROGRESS STARTS=======-->
  <div class="paginacontainer">
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" height="100%" viewbox="-1 -1 102 102" width="100%">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
      </svg>
    </div>
  </div>
  <!--===== PROGRESS ENDS=======-->
  <!--===== SEARCHBAR STARTS=======-->
  <div class="header-search-form-wrapper">
    <div class="tx-search-close tx-close"><i class="fa-solid fa-xmark"></i></div>
    <div class="header-search-container">
      <form class="search-form" role="search">
        <input class="search-field" name="s" placeholder="Search …" type="search" value="" />
        <button class="search-submit" type="submit"><svg fill="none" height="20" viewbox="0 0 20 20" width="20"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M13.7955 13.8111L19 19M16 8.5C16 12.6421 12.6421 16 8.5 16C4.35786 16 1 12.6421 1 8.5C1 4.35786 4.35786 1 8.5 1C12.6421 1 16 4.35786 16 8.5Z"
              stroke="#030E0F" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
          </svg></button>
      </form>
    </div>
  </div>
  <div class="body-overlay"></div>
  <!--===== SEARCHBAR STARTS=======-->
  <!--=====HEADER START=======-->
<!--=====HEADER START=======-->
<header>
  <div class="header-area homepage2 header header-sticky d-none d-lg-block" id="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-elements">
            <div class="site-logo">
              <a href="index.php"><img alt="Puja Booking India" src="img/logo.png" /></a>
            </div>
            <div class="main-menu">
              <ul>
                <li><a class="plus" href="index.php">Home</a></li>
                <li><a class="plus" href="about-us.php">About Us</a></li>
                <li><a class="plus" href="services.php">Our Services <i class="fa-solid fa-angle-down"></i></a>
                  <ul class="dropdown-padding">
                    <?php
                    include './admin/codes/db.php';
                    $brand_query = "SELECT * FROM category";
                    $brand_result = $db->query($brand_query);
                    if ($brand_result->num_rows > 0) {
                      while ($brand = $brand_result->fetch_assoc()) {
                        $category_url = "services.php?brand_url=" . urlencode($brand['url']);
                        echo '<li><a href="' . htmlspecialchars($category_url) . '">' . htmlspecialchars($brand['name']) . '</a></li>';
                      }
                    } else {
                      echo '<li><a href="#">No Categories Available</a></li>';
                    }
                    $brand_result->close();
                    ?>
                  </ul>
                </li>
                <li><a class="plus" href="blog-category.php">Blogs <i class="fa-solid fa-angle-down"></i></a>
                  <ul class="dropdown-padding">
                    <li><a href="blog-category.php">Blog Categories</a></li>
                  
                  </ul>
                </li>
                <li><a href="contact-us.php">Contact Us</a></li>
              </ul>
            </div>
            <div class="btn-area">
              <div class="search-icon header__search header-search-btn">
                <a href="#"><svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z"></path>
                  </svg></a>
              </div>
              <a class="theme-btn3" href="contact-us.php">Book a Puja <span class="arrow1"><svg fill="currentColor" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 13H4V11H12V4L20 12L12 20V13Z"></path>
                  </svg></span><span class="arrow2"><svg fill="currentColor" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 13H4V11H12V4L20 12L12 20V13Z"></path>
                  </svg></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!--=====HEADER END =======-->
  <!--=====HEADER END =======-->
  <!--===== MOBILE HEADER STARTS =======-->
 <!--===== MOBILE HEADER STARTS =======-->
<div class="mobile-header mobile-header2 d-block d-lg-none">
  <div class="container-fluid">
    <div class="col-12">
      <div class="mobile-header-elements">
        <div class="mobile-logo">
          <a href="index.php"><img alt="Puja Booking India" src="img/logo.png" /></a>
        </div>
        <div class="mobile-right d-flex gap-1 align-items-center">
          <div class="mobile-nav-icon dots-menu">
            <svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 4H21V6H3V4ZM7 19H21V21H7V19ZM3 14H21V16H3V14ZM7 9H21V11H7V9Z"></path>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="mobile-sidebar mobile-sidebar2">
  <div class="logosicon-area">
    <div class="logos">
      <img alt="Puja Booking India" src="img/logo.png" />
    </div>
    <div class="menu-close">
      <svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.5859 12L2.79297 4.20706L4.20718 2.79285L12.0001 10.5857L19.793 2.79285L21.2072 4.20706L13.4143 12L21.2072 19.7928L19.793 21.2071L12.0001 13.4142L4.20718 21.2071L2.79297 19.7928L10.5859 12Z"></path>
      </svg>
    </div>
  </div>
  <div class="mobile-nav mobile-nav1">
    <ul class="mobile-nav-list nav-list1">
      <li><a href="index.php">Home</a></li>
      <li><a href="about-us.php">About Us</a></li>
      <li><a href="services.php">Our Services</a></li>
      <li><a href="blog-category.php">Blogs</a>
        <ul class="sub-menu">
        
          <li><a href="blog-details.php">Blog Details</a></li>
        </ul>
      </li>
      <li><a href="contact-us.php">Contact Us</a></li>
    </ul>
    <div class="allmobilesection">
      <a class="theme-btn3" href="contact-us.php">Book a Puja <span class="arrow1"><svg fill="currentColor" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 13H4V11H12V4L20 12L12 20V13Z"></path>
          </svg></span><span class="arrow2"><svg fill="currentColor" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 13H4V11H12V4L20 12L12 20V13Z"></path>
          </svg></span></a>
    </div>
  </div>
</div>
<!--===== MOBILE HEADER ENDS =======-->