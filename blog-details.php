<?php
session_start();
include 'header.php';
include 'nav.php';
include './admin/codes/db.php';

// Fetch blog post based on slug from URL
$slug = isset($_GET['slug']) ? mysqli_real_escape_string($db, $_GET['slug']) : '';
if ($slug) {
    $query = "SELECT * FROM article WHERE slug = '$slug'";
    $result = mysqli_query($db, $query);
    $post = mysqli_fetch_assoc($result);

    if (!$post) {
        echo '<div class="container"><p>Blog post not found.</p></div>';
        exit;
    }
} else {
    echo '<div class="container"><p>Please select a blog post.</p></div>';
    exit;
}

// Generate the current blog URL dynamically
$current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<!-- Add Open Graph Meta Tags in the <head> section (put this in header.php) -->
<head>
    <meta property="og:title" content="<?php echo htmlspecialchars($post['title']); ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars(substr(strip_tags($post['article']), 0, 150)) . '...'; ?>" />
    <meta property="og:image" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/admin/images/blog/' . htmlspecialchars($post['featuredimage']); ?>" />
    <meta property="og:url" content="<?php echo $current_url; ?>" />
    <meta property="og:type" content="article" />
</head>

<!--===== HERO AREA ENDS =======-->
<style>
    .blog-inner-section .blog-post-details-area .img1 img {
        height: 27rem;
    }
    .blog-bottom-area .blog-single-boxarea .img1 img {
        height: 20rem;
    }
</style>
<div class="hero-inner-section-area-sidebar">
    <img alt="housebox" class="hero-img1" src="img/banner123.jpg" />
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-header-area text-center">
                    <a href="index.html">Home <svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
                        </svg> Our Blog</a>
                    <div class="space24"></div>
                    <h1>Our Blog</h1>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                $cat_query = "SELECT c.cat_name, c.slug, COUNT(a.id) as count 
                                              FROM categories c 
                                              LEFT JOIN article a ON c.id = a.category
                                              GROUP BY c.id, c.cat_name, c.slug";
                                $cat_result = mysqli_query($db, $cat_query);
                                while ($cat = mysqli_fetch_assoc($cat_result)) {
                                    $cat_name = htmlspecialchars($cat['cat_name']);
                                    $cat_slug = htmlspecialchars($cat['slug']);
                                    $count = $cat['count'];
                                    echo "<li><a href='?category=$cat_slug'>$cat_name ($count) <svg fill='currentColor' viewbox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z'></path></svg></a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="space40 d-lg-none d-block"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-post-details-area heading1">
                            <div class="img1">
                                <img alt="<?php echo htmlspecialchars($post['alt_text']); ?>"
                                     src="./admin/images/blog/<?php echo htmlspecialchars($post['featuredimage']); ?>" />
                            </div>
                            <div class="space32"></div>
                            <ul class="list-author">
                                <li><a href="#">#<?php echo htmlspecialchars($post['category']); ?></a></li>
                                <li><a href="#"><svg fill="none" height="21" viewbox="0 0 16 21" width="16" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.08317 12.8894V18.3327H8.9165V12.8894C12.5339 13.3405 15.3332 16.4264 15.3332 20.166H0.666504C0.666504 16.4264 3.46572 13.3405 7.08317 12.8894ZM7.99984 11.916C4.96109 11.916 2.49984 9.45477 2.49984 6.41602C2.49984 3.37727 4.96109 0.916016 7.99984 0.916016C11.0386 0.916016 13.4998 3.37727 13.4998 6.41602C13.4998 9.45477 11.0386 11.916 7.99984 11.916Z" fill="#030E0F"></path>
                                        </svg> By Admin <span> | </span></a></li>
                                <li><a href="#"><svg fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.6665 9.16732H18.3332V16.6673C18.3332 17.1276 17.9601 17.5007 17.4998 17.5007H2.49984C2.0396 17.5007 1.6665 17.1276 1.6665 16.6673V9.16732ZM14.1665 2.50065H17.4998C17.9601 2.50065 18.3332 2.87375 18.3332 3.33398V7.50065H1.6665V3.33398C1.6665 2.87375 2.0396 2.50065 2.49984 2.50065H5.83317V0.833984H7.49984V2.50065H12.4998V0.833984H14.1665V2.50065Z" fill="#030E0F"></path>
                                        </svg> <?php echo date('d F Y', strtotime($post['created_at'])); ?></a></li>
                            </ul>
                            <div class="space20"></div>
                            <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                            <div class="space18"></div>
                            <p><?php echo html_entity_decode($post['article']); ?></p>

                            <div class="space32"></div>
                            <div class="tags-social">
                                <div class="tags">
                                    <ul>
                                        <li>Tags:</li>
                                        <?php
                                        $tag_query = "SELECT t.name FROM product_tags pt JOIN tags t ON pt.tag_id = t.id WHERE pt.post_id = '{$post['id']}'";
                                        $tag_result = mysqli_query($db, $tag_query);
                                        while ($tag = mysqli_fetch_assoc($tag_result)) {
                                            echo "<li><a href='#'>#" . htmlspecialchars($tag['name']) . "</a></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="social">
                                    <ul>
                                        <li>Share:</li>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_url); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($current_url); ?>&text=<?php echo urlencode($post['title']); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($current_url); ?>&title=<?php echo urlencode($post['title']); ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--===== READ MORE RECENT BLOGS =======-->
<div class="blog-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center space-margin60">
                    <h2>Read More Recent Blogs</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $recent_query = "SELECT * FROM article WHERE slug != '$slug' ORDER BY created_at DESC LIMIT 3";
            $recent_result = mysqli_query($db, $recent_query);
            while ($recent_post = mysqli_fetch_assoc($recent_result)) {
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-single-boxarea">
                        <div class="img1 image-anime">
                            <img alt="<?php echo htmlspecialchars($recent_post['alt_text']); ?>"
                                 src="./admin/images/blog/<?php echo htmlspecialchars($recent_post['featuredimage']); ?>" />
                        </div>
                        <div class="content-area">
                            <ul>
                                <li><a href="#"><svg fill="none" height="20" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.6665 9.16732H18.3332V16.6673C18.3332 17.1276 17.9601 17.5007 17.4998 17.5007H2.49984C2.0396 17.5007 1.6665 17.1276 1.6665 16.6673V9.16732ZM14.1665 2.50065H17.4998C17.9601 2.50065 18.3332 2.87375 18.3332 3.33398V7.50065H1.6665V3.33398C1.6665 2.87375 2.0396 2.50065 2.49984 2.50065H5.83317V0.833984H7.49984V2.50065H12.4998V0.833984H14.1665V2.50065Z" fill="#030E0F"></path>
                                        </svg> <?php echo date('d F Y', strtotime($recent_post['created_at'])); ?></a></li>
                                <li><a href="#"><svg fill="none" height="21" viewbox="0 0 16 21" width="16" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.08317 12.8894V18.3327H8.9165V12.8894C12.5339 13.3405 15.3332 16.4264 15.3332 20.166H0.666504C0.666504 16.4264 3.46572 13.3405 7.08317 12.8894ZM7.99984 11.916C4.96109 11.916 2.49984 9.45477 2.49984 6.41602C2.49984 3.37727 4.96109 0.916016 7.99984 0.916016C11.0386 0.916016 13.4998 3.37727 13.4998 6.41602C13.4998 9.45477 11.0386 11.916 7.99984 11.916Z" fill="#030E0F"></path>
                                        </svg> By Admin</a></li>
                            </ul>
                            <div class="space14"></div>
                            <a class="head" href="?slug=<?php echo htmlspecialchars($recent_post['slug']); ?>">
                                <?php echo htmlspecialchars($recent_post['title']); ?></a>
                            <div class="space20"></div>
                            <a class="readmore" href="?slug=<?php echo htmlspecialchars($recent_post['slug']); ?>">learn more <svg fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.0508 12.361L7.39395 18.0179L5.97974 16.6037L11.6366 10.9468L6.68684 5.99707H18.0006V17.3108L13.0508 12.361Z"></path>
                                </svg></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>