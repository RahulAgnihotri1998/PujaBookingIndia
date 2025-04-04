<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include './admin/codes/db.php'; ?>
<!--===== HERO AREA STARTS =======-->
<!--===== HERO AREA STARTS =======-->
<div class="hero-inner-section-area-sidebar">
    <img alt="housebox" class="hero-img1" src="assets/img/all-images/hero/hero-img1.png" />
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-header-area text-center">
                    <a href="index.php">Home <svg fill="currentColor" viewbox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                            </path>
                        </svg> Our Service</a>
                    <div class="space24"></div>
                    <h1>Our Services</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .blog-grid-section-area .blog-single-boxarea .img1 img {
    height: 20rem;

}
</style>
<!--===== HERO AREA ENDS =======-->
<!--===== BLOG AREA STARTS =======-->
<?php include './admin/codes/db.php'; ?>
<div class="blog-grid-section-area sp1">
    <div class="container">
        <div class="row">
            <?php
            // Get category URL from query string
            $category_url = isset($_GET['brand_url']) ? $_GET['brand_url'] : '';

            if ($category_url) {
                // Fetch category (brand) ID based on URL
                $brand_stmt = $db->prepare("SELECT id, name FROM category WHERE url = ?");
                $brand_stmt->bind_param("s", $category_url);
                $brand_stmt->execute();
                $brand_result = $brand_stmt->get_result();
                $brand = $brand_result->fetch_assoc();
                $brand_stmt->close();

                if ($brand) {
                    $brand_id = $brand['id'];
                    $brand_name = $brand['name'];

                    // Fetch products for this brand
                    $product_stmt = $db->prepare("SELECT * FROM products WHERE brand = ? AND status = 'active'");
                    $product_stmt->bind_param("i", $brand_id);
                    $product_stmt->execute();
                    $product_result = $product_stmt->get_result();

                    if ($product_result->num_rows > 0) {
                        while ($product = $product_result->fetch_assoc()) {
                            $services = json_decode($product['services'], true);
                            $created_at = new DateTime($product['created_at']);
                            ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="blog-single-boxarea">
                                    <div class="img1 image-anime">
                                        <img alt="<?php echo htmlspecialchars($product['title']); ?>"
                                            src="./admin/codes/<?php echo htmlspecialchars($product['main_image']); ?>" />
                                    </div>
                                    <div class="content-area">
                                        <ul>
                                            <li><a href="#"><svg fill="none" height="20" viewbox="0 0 20 20" width="20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.6665 9.16732H18.3332V16.6673C18.3332 17.1276 17.9601 17.5007 17.4998 17.5007H2.49984C2.0396 17.5007 1.6665 17.1276 1.6665 16.6673V9.16732ZM14.1665 2.50065H17.4998C17.9601 2.50065 18.3332 2.87375 18.3332 3.33398V7.50065H1.6665V3.33398C1.6665 2.87375 2.0396 2.50065 2.49984 2.50065H5.83317V0.833984H7.49984V2.50065H12.4998V0.833984H14.1665V2.50065Z"
                                                            fill="#030E0F"></path>
                                                    </svg> <?php echo $created_at->format('d F Y'); ?></a></li>
                                            <li><a href="#"><svg fill="none" height="21" viewbox="0 0 16 21" width="16"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M7.08317 12.8894V18.3327H8.9165V12.8894C12.5339 13.3405 15.3332 16.4264 15.3332 20.166H0.666504C0.666504 16.4264 3.46572 13.3405 7.08317 12.8894ZM7.99984 11.916C4.96109 11.916 2.49984 9.45477 2.49984 6.41602C2.49984 3.37727 4.96109 0.916016 7.99984 0.916016C11.0386 0.916016 13.4998 3.37727 13.4998 6.41602C13.4998 9.45477 11.0386 11.916 7.99984 11.916Z"
                                                            fill="#030E0F"></path>
                                                    </svg> By PoojaBooking</a></li>
                                        </ul>
                                        <div class="space14"></div>
                                        <a class="head" href="puja-details.php?url=<?php echo $product['url']; ?>">
                                            <?php echo htmlspecialchars($product['title']); ?>
                                        </a>
                                        <div class="space20"></div>
                                        <a class="readmore" href="puja-details.php?url=<?php echo $product['url']; ?>">Learn More <svg fill="currentColor"
                                                viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.0508 12.361L7.39395 18.0179L5.97974 16.6037L11.6366 10.9468L6.68684 5.99707H18.0006V17.3108L13.0508 12.361Z">
                                                </path>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<div class="col-lg-12"><p>No services found for this category.</p></div>';
                    }
                    $product_stmt->close();
                } else {
                    echo '<div class="col-lg-12"><p>Category not found.</p></div>';
                }
            } else {
                echo '<div class="col-lg-12"><p>Please select a category.</p></div>';
            }
            $db->close();
            ?>
            <div class="col-lg-12">
                <div class="space30"></div>
                <div class="pagination-area">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a aria-label="Previous" class="page-link" href="#">
                                    <svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">....</a></li>
                            <li class="page-item"><a class="page-link" href="#">12</a></li>
                            <li class="page-item">
                                <a aria-label="Next" class="page-link" href="#">
                                    <svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== BLOG AREA ENDS =======-->
<?php include 'footer.php'; ?>