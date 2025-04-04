<?php
session_start();

include('./codes/db.php');

// Check if database connection is established
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Ensure required POST data is set
if (empty($_POST['cat_name']) || empty($_POST['cat_url'])) {
    die("categories Name and URL are required.");
}

$catname = mysqli_real_escape_string($db, $_POST['cat_name']);
$cat_url = mysqli_real_escape_string($db, $_POST['cat_url']);
$metatitle = isset($_POST['meta_title']) ? mysqli_real_escape_string($db, $_POST['meta_title']) : '';
$metadescription = isset($_POST['meta_description']) ? mysqli_real_escape_string($db, $_POST['meta_description']) : '';

$sql_u = "SELECT * FROM categories WHERE slug ='$cat_url'";
$sql_catname_check = "SELECT * FROM categories WHERE cat_name = '$catname'";
$res_catname_check_query = mysqli_query($db, $sql_catname_check);
$res_u = mysqli_query($db, $sql_u);

if (mysqli_num_rows($res_u) > 0) {
    echo "URL already exists.";
} elseif (mysqli_num_rows($res_catname_check_query) > 0) {
    echo "categories Name Already Exists.";
} else {
    $sql = "INSERT INTO categories (cat_name, slug, meta_title, meta_description)
            VALUES ('$catname', '$cat_url', '$metatitle', '$metadescription')";
    $result = mysqli_query($db, $sql);

    if ($result) {
        echo "categories created Successfully.";
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>
