<?php
// Include the database configuration file
include('db.php');
$destinationDirectory = 'product-image/'; // Replace with the actual path

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID from the URL
    $productId = $_POST['id'];

    // Get the form data
    $title = $_POST['title'];
    $url = $_POST['url'];
    $metaTitle = $_POST['metaTitle'];
    $metaDescription = $_POST['metaDescription'];
    $additionalCode = $_POST['additionalCode'];
    $selectBrand = $_POST['brandId'];
    $status = $_POST['status'];
    $longDescription = $_POST['longDescription'];
    $applications = $_POST['applications'];

    // Prepare JSON data for related products
    // Check if 'related_products' field is set and not empty
    if (isset($_POST['selectedProducts']) && !empty($_POST['selectedProducts'])) {
        // Encode 'related_products' into JSON format
        $relatedProducts = json_encode($_POST['selectedProducts']);
    } else {
        // If 'related_products' is empty or not set, assign null
        $relatedProducts = null;
    }

    // Check if the main image is updated
    if (!empty($_FILES['mainImage']['name'])) {
        // Upload new main image
        $mainImage = uploadFile('mainImage');
        // Prepare SQL statement to update main image
        $updateMainImageSql = "UPDATE products SET main_image = '$mainImage' WHERE id = '$productId'";
        // Execute the SQL query to update main image
        $db->query($updateMainImageSql);
    }

    // Handle gallery images
    $galleryImages = array();

    // Check if galleryImages files are uploaded
    if (isset($_FILES['galleryImages']) && !empty($_FILES['galleryImages']['name'])) {
        // Iterate over each uploaded file
        foreach ($_FILES['galleryImages']['name'] as $key => $file_name) {
            // Retrieve file details for the current iteration
            $file_tmp = $_FILES['galleryImages']['tmp_name'][$key];
            $file_type = $_FILES['galleryImages']['type'][$key];
            $file_size = $_FILES['galleryImages']['size'][$key];
            $file_error = $_FILES['galleryImages']['error'][$key];
    
            // Handle file upload
            if ($file_error === UPLOAD_ERR_OK) {
                $target_file = $destinationDirectory . basename($file_name);
                if (move_uploaded_file($file_tmp, $target_file)) {
                    $galleryImages[] = $target_file;
                } else {
                    // Handle the error if the file cannot be moved
                    // Log or display an error message
                }
            } else {
                // Handle the error if the file cannot be uploaded
                // Log or display an error message
            }
        }
    } else {
        // Handle case when no files are uploaded
    }
    
 // Check for duplicate URL
 $checkDuplicateQuery = "SELECT * FROM products WHERE url = '$url' AND id != '$productId'";
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

    // Prepare SQL statement for updating product details
    $updateProductSql = "UPDATE products SET 
                            title = '$title',
                            url = '$url',
                            meta_title = '$metaTitle',
                            meta_description = '$metaDescription',
                            additional_code = '$additionalCode',
                            brand = '$selectBrand',
                            status = '$status',
                            long_description = '$longDescription',
                            applications = '$applications',
                            related_products = '$relatedProducts'
                        WHERE id = '$productId'";

     // Execute the SQL query to update product details
     // Execute the SQL query to update product details
if ($db->query($updateProductSql) === TRUE) {
    // Check if new gallery images are provided
    if (!empty($galleryImages)) {
        // Then, insert new gallery images
        foreach ($galleryImages as $image) {
            $insertImageSql = "INSERT INTO gallery_images (product_id, image_url) VALUES ('$productId', '$image')";
            $db->query($insertImageSql);
        }
    }

    // Success
    $response = array(
        'success' => true,
        'message' => 'Product data updated successfully.'
    );
} else {
    // Error
    $response = array(
        'success' => false,
        'message' => 'Error updating product data: ' . $db->error
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
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Generate a unique filename to avoid overwriting existing files
    $counter = 1;
    while (file_exists($targetFile)) {
        $fileName = pathinfo($targetFile, PATHINFO_FILENAME) . '_' . $counter . '.' . $fileType;
        $targetFile = $destinationDirectory . $fileName;
        $counter++;
    }

    // Check file size (adjust as needed)
    if ($_FILES[$inputName]['size'] > 5000000) {
        $uploadOk = 0;
    }

    // Allow certain file formats (adjust as needed)
    $allowedFileTypes = array('jpg', 'jpeg', 'png', 'gif', 'webp');
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
