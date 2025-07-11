<?php
// Set content type to JSON
header('Content-Type: application/json');

// Handle CORS if needed
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Database configuration
$host = 'localhost';
$dbname = 'test_base';
$user = 'root';
$pass = '';

// Function to send JSON response
function sendResponse($success, $message, $data = null, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit();
}

// Handle GET request - retrieve all contacts
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $conn = new mysqli($host, $user, $pass, $dbname);
        
        if ($conn->connect_error) {
            sendResponse(false, "Database connection failed: #dkljasdaklj", null, 500);
        }
        
        $result = $conn->query("SELECT * FROM contacts ORDER BY id ASC");
        
        if ($result) {
            $contacts = [];
            while ($row = $result->fetch_assoc()) {
                $contacts[] = $row;
            }
            sendResponse(true, "Contacts retrieved successfully", $contacts);
        } else {
            sendResponse(false, "Error retrieving contacts: " . $conn->error, null, 500);
        }
        
        $conn->close();
    } catch (Exception $e) {
        sendResponse(false, "Server error: " . $e->getMessage(), null, 500);
    }
}

// Handle POST request - submit new contact
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validate input
    if (empty($name) || empty($email) || empty($message)) {
        sendResponse(false, "All fields are required.", null, 400);
    }

    // Basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendResponse(false, "Please enter a valid email address.", null, 400);
    }

    try {
        // Connect to the database
        $conn = new mysqli($host, $user, $pass, $dbname);

        // Check connection
        if ($conn->connect_error) {
            sendResponse(false, "Database connection failed: " . $conn->connect_error, null, 500);
        }

        // Prepare and execute SQL query
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $insertId = $conn->insert_id;
            sendResponse(true, "Message received. Thank you!", ['id' => $insertId]);
        } else {
            sendResponse(false, "Error saving message: " . $stmt->error, null, 500);
        }

        // Close connection
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        sendResponse(false, "Server error: " . $e->getMessage(), null, 500);
    }
}

// If method is not supported
sendResponse(false, "Method not allowed", null, 405);
?>
