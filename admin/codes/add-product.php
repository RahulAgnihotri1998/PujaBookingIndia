<?php
// Include the database configuration file
include('db.php');
$destinationDirectory = 'product-image/'; // Replace with the actual path

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define an array to store validation errors
    $errors = array();

    // Validate required fields
    $requiredFields = array('title', 'url', 'metaTitle', 'metaDescription', 'additionalCode', 'status', 'longDescription', 'applications', 'brandId');
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
        $selectBrand = $_POST['brandId']; // Ensure this matches a valid brand ID
        $status = $_POST['status'];
        $longDescription = $_POST['longDescription'];
        $applications = $_POST['applications'];

        // Check if a product with the same URL already exists
        $checkStmt = $db->prepare("SELECT * FROM products WHERE url = ?");
        $checkStmt->bind_param("s", $url);
        $checkStmt->execute();
        $result = $checkStmt->get_result();
        if ($result && $result->num_rows > 0) {
            $response = array('success' => false, 'message' => 'A product with the same URL already exists.');
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
        $checkStmt->close();

        // Prepare JSON data for related products
        $relatedProducts = isset($_POST['selectedProducts']) && !empty($_POST['selectedProducts']) 
            ? json_encode($_POST['selectedProducts']) 
            : null;

        // Handle gallery images (optional)
        $galleryImages = array();
        if (isset($_FILES['galleryImages']) && !empty($_FILES['galleryImages']['name'][0])) {
            foreach ($_FILES['galleryImages']['name'] as $key => $file_name) {
                if ($_FILES['galleryImages']['error'][$key] === UPLOAD_ERR_OK) {
                    $file_tmp = $_FILES['galleryImages']['tmp_name'][$key];
                    $target_file = $destinationDirectory . uniqid() . '_' . basename($file_name); // Unique filename
                    if (move_uploaded_file($file_tmp, $target_file)) {
                        $galleryImages[] = $target_file;
                    } else {
                        $errors[] = 'Failed to move uploaded file: ' . $file_name;
                    }
                } else {
                    $errors[] = 'Error uploading file: ' . $file_name;
                }
            }
        }

        // Proceed if no errors
        if (empty($errors)) {
            try {
                // Insert product using prepared statement
                $sql = "INSERT INTO products (title, url, meta_title, meta_description, additional_code, main_image, brand, status, long_description, applications, related_products) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $db->prepare($sql);
                $stmt->bind_param("sssssssssss", $title, $url, $metaTitle, $metaDescription, $additionalCode, $mainImage, $selectBrand, $status, $longDescription, $applications, $relatedProducts);
                
                if ($stmt->execute()) {
                    $lastProductId = $db->insert_id;

                    // Insert gallery images
                    if (!empty($galleryImages)) {
                        $imageStmt = $db->prepare("INSERT INTO gallery_images (product_id, image_url) VALUES (?, ?)");
                        foreach ($galleryImages as $image) {
                            $imageStmt->bind_param("is", $lastProductId, $image);
                            $imageStmt->execute();
                        }
                        $imageStmt->close();
                    }

                    $response = array('success' => true, 'message' => 'Product data saved successfully.');
                } else {
                    $errors[] = 'Error saving product: ' . $db->error;
                }
                $stmt->close();
            } catch (mysqli_sql_exception $e) {
                $errors[] = 'Database error: ' . $e->getMessage();
            }
        }
    }

    // Send response
    if (!empty($errors)) {
        $response = array('success' => false, 'errors' => $errors);
    }
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    http_response_code(405);
    echo json_encode(array('error' => 'Invalid request method.'));
}

function uploadFile($inputName) {
    global $destinationDirectory;

    if (!isset($_FILES[$inputName]) || $_FILES[$inputName]['error'] == UPLOAD_ERR_NO_FILE) {
        return null; // No file uploaded
    }

    $fileName = uniqid() . '_' . basename($_FILES[$inputName]['name']); // Unique filename
    $targetFile = $destinationDirectory . $fileName;

    // Check file size (5MB limit)
    if ($_FILES[$inputName]['size'] > 5000000) {
        return false;
    }

    // Allow certain file formats
    $allowedFileTypes = array('jpg', 'jpeg', 'png', 'gif', 'webp');
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($fileType, $allowedFileTypes)) {
        return false;
    }

    if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetFile)) {
        return $targetFile;
    }
    return false;
}

$db->close();
?>