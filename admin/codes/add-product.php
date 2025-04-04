<?php
// Include the database configuration file
include('db.php');
$destinationDirectory = 'product-image/'; // Replace with the actual path

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define an array to store validation errors
    $errors = array();

    // Validate required fields
    $requiredFields = array('title', 'url', 'metaTitle', 'metaDescription', 'additionalCode', 'status', 'longDescription', 'applications');
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst($field) . ' is required.';
        }
    }

    // Check if any validation errors occurred
    if (empty($errors)) {
        // Get the form data
        $title = $_POST['title'];
        $url = $_POST['url'];
        $metaTitle = $_POST['metaTitle'];
        $metaDescription = $_POST['metaDescription'];
        $additionalCode = $_POST['additionalCode'];
        $mainImage = uploadFile('mainImage');
        $selectBrand = $_POST['brandId'];
        $status = $_POST['status'];
        $longDescription = $_POST['longDescription'];
        $applications = $_POST['applications'];
    // Check if a product with the same URL already exists
       // Check if a product with the same URL already exists
$checkDuplicateQuery = "SELECT * FROM products WHERE url = '$url'";
$result = $db->query($checkDuplicateQuery);
if ($result && $result->num_rows > 0) {
    // Product with the same URL already exists, return error message
    $response = array(
        'success' => false,
        'message' => 'A product with the same URL already exists.'
    );
    
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Stop further execution
}

        // Prepare JSON data for related products
        // Check if 'related_products' field is set and not empty
        if (isset($_POST['selectedProducts']) && !empty($_POST['selectedProducts'])) {
            // Encode 'related_products' into JSON format
            $relatedProducts = json_encode($_POST['selectedProducts']);
        } else {
            // If 'related_products' is empty or not set, assign null
            $relatedProducts = null;
        }
        $galleryImages = array();

        // Iterate over each uploaded file
        foreach ($_FILES['galleryImages']['name'] as $key => $file_name) {
            // Retrieve file details for the current iteration
            $file_tmp = $_FILES['galleryImages']['tmp_name'][$key];
            $file_error = $_FILES['galleryImages']['error'][$key];

            // Handle file upload
            if ($file_error === UPLOAD_ERR_OK) {
                $target_file = $destinationDirectory . basename($file_name);
                if (move_uploaded_file($file_tmp, $target_file)) {
                    $galleryImages[] = $target_file;
                } else {
                    // Handle the error if the file cannot be moved
                    $errors[] = 'Failed to move uploaded file: ' . $file_name;
                }
            } else {
                // Handle the error if the file cannot be uploaded
                $errors[] = 'Error uploading file: ' . $file_name;
            }
        }

        // Check if any validation errors occurred during file upload
        if (empty($errors)) {
            // Prepare SQL statement for inserting product details
            $sql = "INSERT INTO products (title, url, meta_title, meta_description, additional_code, main_image, brand, status, long_description, applications, related_products) 
                    VALUES ('$title', '$url', '$metaTitle', '$metaDescription', '$additionalCode', '$mainImage', '$selectBrand', '$status', '$longDescription', '$applications', '$relatedProducts')";

            // Execute the statement to insert product details
            if ($db->query($sql) === TRUE) {
                // Get the last inserted product ID
                $lastProductId = $db->insert_id;

                // Insert gallery images into the database
                foreach ($galleryImages as $image) {
                    $insertImageSql = "INSERT INTO gallery_images (product_id, image_url) VALUES ('$lastProductId', '$image')";
                    $db->query($insertImageSql);
                }

                // Success
                $response = array(
                    'success' => true,
                    'message' => 'Product data received and saved to the database successfully.'
                );
            } else {
                // Error
                $errors[] = 'Error saving the product data to the database: ' . $db->error;
            }
        }
    }

    // If validation errors occurred, send an error response
    if (!empty($errors)) {
        $response = array(
            'success' => false,
            'errors' => $errors
        );
    }

    // Send a JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle non-POST requests if necessary
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Invalid request method.'));
}

function uploadFile($inputName) {
    global $destinationDirectory;

    $fileName = basename($_FILES[$inputName]['name']);
    $targetFile = $destinationDirectory . $fileName;
    $uploadOk = 1;

    // Check file size (adjust as needed)
    if ($_FILES[$inputName]['size'] > 5000000) {
        $uploadOk = 0;
    }

    // Allow certain file formats (adjust as needed)
    $allowedFileTypes = array('jpg', 'jpeg', 'png', 'gif', 'webp');
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($fileType, $allowedFileTypes)) {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return false;
    } else {
        // If everything is ok, try to upload the file
        if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFile)) {
            return $targetFile;
        } else {
            return false;
        }
    }
}
?>
