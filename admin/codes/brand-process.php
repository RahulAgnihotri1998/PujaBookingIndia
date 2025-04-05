<?php
// Include the database configuration file
include('db.php');

// Function to handle file upload
function uploadFile($file) {
    $uploadDirectory = 'uploads/'; // Change this to your desired upload directory
    
    if ($file['error'] == UPLOAD_ERR_OK) {
        $fileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $uploadDirectory . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            return $targetFilePath;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $longDescription = $_POST['longDescription'];
    $status = $_POST['status'];

    // Handle file uploads
    $logoPath = '';
    $featuredImagePath = '';
    $descriptionImagePath = '';

    // Upload logo if provided
    if (!empty($_FILES['logo']['name'])) {
        $logoPath = uploadFile($_FILES['logo']);
        if ($logoPath === false) {
            $response = array('success' => false, 'message' => 'Error uploading logo file.');
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }

    // Upload featured image if provided
    if (!empty($_FILES['featuredImage']['name'])) {
        $featuredImagePath = uploadFile($_FILES['featuredImage']);
        if ($featuredImagePath === false) {
            $response = array('success' => false, 'message' => 'Error uploading featured image file.');
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }

    // Upload description image if provided
    if (!empty($_FILES['descriptionImage']['name'])) {
        $descriptionImagePath = uploadFile($_FILES['descriptionImage']);
        if ($descriptionImagePath === false) {
            $response = array('success' => false, 'message' => 'Error uploading description image file.');
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }

    // Use prepared statements to prevent SQL injection and handle duplicates
    try {
        // Check if a record with the same name or URL already exists
        $checkSql = "SELECT COUNT(*) AS total FROM category WHERE name = ? OR url = ?";
        $stmt = $db->prepare($checkSql);
        $stmt->bind_param("ss", $title, $url);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['total'] > 0) {
            $response = array('success' => false, 'message' => 'A category with the same name or URL already exists.');
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }

        // Prepare the insert query
        $sql = "INSERT INTO category (name, url, description, longDescription, logo, featuredImage, descriptionImage, status, created_at, updated_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssssssss", $title, $url, $description, $longDescription, $logoPath, $featuredImagePath, $descriptionImagePath, $status);

        if ($stmt->execute()) {
            $response = array('success' => true, 'message' => 'Category added successfully.');
        } else {
            $response = array('success' => false, 'message' => 'Error adding category: ' . $db->error);
        }

        $stmt->close();
    } catch (mysqli_sql_exception $e) {
        // Handle duplicate entry error (MySQL error code 1062)
        if ($e->getCode() == 1062) {
            $response = array('success' => false, 'message' => 'A category with the same name already exists.');
        } else {
            $response = array('success' => false, 'message' => 'Database error: ' . $e->getMessage());
        }
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'Invalid request method.');
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Close the database connection
$db->close();
?>