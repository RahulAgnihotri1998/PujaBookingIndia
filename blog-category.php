<?php
session_start();
include 'header.php';
include 'nav.php';
include './admin/codes/db.php';

// Get the category slug from URL parameter
$category_slug = isset($_GET['category']) ? mysqli_real_escape_string($db, $_GET['category']) : '';

// Fetch the category ID based on the slug
$cat_query = "SELECT id, cat_name FROM categories WHERE slug = '$category_slug'";
$cat_result = mysqli_query($db, $cat_query);
$category = mysqli_fetch_assoc($cat_result);

if (!$category && $category_slug) {
    echo '<div class="container"><p>Category not found.</p></div>';
    exit;
}

$category_id = $category ? $category['id'] : 0; // Default to 0 if no category is specified
$category_name = $category ? htmlspecialchars($category['cat_name']) : 'All Categories';

// Pagination settings
$posts_per_page = 4; // Number of posts per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $posts_per_page;

// Fetch total number of posts in the category for pagination
if ($category_id) {
    $total_query = "SELECT COUNT(*) as total FROM article WHERE category = '$category_id'";
} else {
    $total_query = "SELECT COUNT(*) as total FROM article"; // Show all posts if no category is specified
}
$total_result = mysqli_query($db, $total_query);
$total_posts = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total_posts / $posts_per_page);

// Fetch posts for the current page
if ($category_id) {
    $query = "SELECT * FROM article WHERE category = '$category_id' ORDER BY created_at DESC LIMIT $offset, $posts_per_page";
} else {
    $query = "SELECT * FROM article ORDER BY created_at DESC LIMIT $offset, $posts_per_page"; // Show all posts if no category
}
$result = mysqli_query($db, $query);
?>

<!--===== HERO AREA STARTS =======-->
<!--===== HERO AREA STARTS =======-->
<div class="hero-inner-section-area-sidebar">
    <img alt="housebox" class="hero-img1" src="img/banner-blog.jpg" />
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-header-area text-center">
                    <a href="index.html">Home <svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
                    </svg> Our Blog</a>
                    <div class="space24"></div>
                    <h1><?php echo $category_name; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->
<!--===== BLOG AREA STARTS =======-->
<style>
    .blog-inner-section .blog-post-details-area .img1 img {
    height: 40rem;
  
}
.blog-bottom-area .blog-single-boxarea .img1 img {
    height: 40rem;
   
}
.blog-inner-section .blog-details-boxarea .img1 img {
   
    height: 40rem;
   
}
</style>
<div class="blog-inner-section sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="blog-siderbar">
                    <div class="all-category">
                      
                       
                        <div class="categories-area">
                            <h3>Blog Category</h3>
                            <ul>
    <?php
    // Fetch categories and their article counts from the categories and article tables
    $cat_query = "
        SELECT c.cat_name, c.slug, COUNT(a.id) as count 
        FROM categories c 
        LEFT JOIN article a ON c.id = a.category
        GROUP BY c.id, c.cat_name, c.slug
    ";
    $cat_result = mysqli_query($db, $cat_query);
    while ($cat = mysqli_fetch_assoc($cat_result)) {
        $cat_name = htmlspecialchars($cat['cat_name']);
        $cat_slug = htmlspecialchars($cat['slug']); // Use slug for URL consistency
        $count = $cat['count'];
        echo "<li><a href='?category=$cat_slug'>$cat_name ($count) <svg fill='currentColor' viewbox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z'></path></svg></a></li>";
    }
    ?>
</ul>
                        </div>
                       
                        <div class="posts-area">
                            <h3>Featured Post</h3>
                            <?php
                            $featured_query = "SELECT * FROM article WHERE category != '$category_id' ORDER BY created_at DESC LIMIT 4";
                            $featured_result = mysqli_query($db, $featured_query);
                            while ($featured = mysqli_fetch_assoc($featured_result)) {
                            ?>
                                <div class="post-auhtor-area">
                                    <div class="img1">
                                        <img alt="<?php echo htmlspecialchars($featured['alt_text']); ?>" src="./admin/images/blog/<?php echo htmlspecialchars($featured['featuredimage']); ?>" />
                                    </div>
                                    <div class="content">
                                        <a class="date" href="#"><svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 11H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V11ZM17 3H21C21.5523 3 22 3.44772 22 4V9H2V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3Z"></path>
                                        </svg> <?php echo date('d F Y', strtotime($featured['created_at'])); ?></a>
                                        <a class="head" href="blog-details.php?slug=<?php echo htmlspecialchars($featured['slug']); ?>"><?php echo htmlspecialchars($featured['title']); ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="space30"></div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="space40 d-lg-none d-block"></div>
                <div class="row">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($post = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-lg-12">
                            <div class="blog-details-boxarea">
                                <div class="img1">
                                    <img alt="<?php echo htmlspecialchars($post['alt_text']); ?>" src="./admin/images/blog/<?php echo htmlspecialchars($post['featuredimage']); ?>" />
                                </div>
                                <div class="content-area">
                                    <ul>
                                        <li><a href="#"><svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 14.0619V20H13V14.0619C16.9463 14.554 20 17.9204 20 22H4C4 17.9204 7.05369 14.554 11 14.0619ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path>
                                        </svg> By Admin</a></li>
                                        <li><a href="#"><svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 11H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V11ZM17 3H21C21.5523 3 22 3.44772 22 4V9H2V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3Z"></path>
                                        </svg> <?php echo date('d F Y', strtotime($post['created_at'])); ?></a></li>
                                    </ul>
                                    <div class="space24"></div>
                                    <?php
// Define the maximum length for the title
$max_length = 50; // Adjust this value as needed

// Decode HTML entities
$decoded_title = html_entity_decode($post['title'], ENT_QUOTES, 'UTF-8');

// Truncate the title and append an ellipsis if it exceeds the maximum length
$truncated_title = mb_strimwidth($decoded_title, 0, $max_length, '...', 'UTF-8');
?>
<a href="blog-details.php?slug=<?php echo htmlspecialchars($post['slug'], ENT_QUOTES, 'UTF-8'); ?>">
    <?php echo htmlspecialchars($truncated_title, ENT_QUOTES, 'UTF-8'); ?>
</a>

                                    <div class="space16"></div>
                                    <p><?php echo substr(html_entity_decode($post['article']), 0, 150) . ''; ?></p>
                                    <div class="space24"></div>
                                    <a class="readmore" href="blog-details.php?slug=<?php echo htmlspecialchars($post['slug']); ?>">learn more <svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.0508 12.361L7.39395 18.0179L5.97974 16.6037L11.6366 10.9468L6.68684 5.99707H18.0006V17.3108L13.0508 12.361Z"></path>
                                    </svg></a>
                                </div>
                            </div>
                            <div class="space48"></div>
                        </div>
                    <?php
                        }
                    } else {
                        echo '<div class="col-lg-12"><p>No posts found in this category.</p></div>';
                    }
                    ?>
                  <div class="col-lg-12">
    <div class="pagination-area">
        <div class="space60"></div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($page > 1) { ?>
                    <li class="page-item">
                        <a aria-label="Previous" class="page-link" href="?category=<?php echo urlencode($category_slug); ?>&page=<?php echo $page - 1; ?>">
                            <svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path>
                            </svg>
                        </a>
                    </li>
                <?php } ?>
                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <li class="page-item"><a class="page-link <?php echo $i == $page ? 'active' : ''; ?>" href="?category=<?php echo urlencode($category_slug); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <?php if ($page < $total_pages) { ?>
                    <li class="page-item">
                        <a aria-label="Next" class="page-link" href="?category=<?php echo urlencode($category_slug); ?>&page=<?php echo $page + 1; ?>">
                            <svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
                            </svg>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== BLOG AREA ENDS =======-->
<!--===== CTA AREA STARTS =======-->
<div class="cta1-section-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-bg-area" style="background-image: url(assets/img/all-images/bg/cta-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="cta-header">
                                <h2 class="text-anime-style-3">Step Into Your Dream Home with HouseBox</h2>
                                <div class="space16"></div>
                                <p data-aos="fade-left" data-aos-duration="1000">At HouseBox, we believe your next home is more than just a place – it’s where your future begins you’re buy.</p>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="btn-area1 text-center">
                                <a class="theme-btn1" href="property-halfmap-grid.html">Find Your Dream Home <span class="arrow1"><svg fill="currentColor" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
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
    </div>
</div>
<!--===== CTA AREA ENDS =======-->

<?php include 'footer.php'; ?>