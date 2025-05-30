<?php
// functions/process.php

session_start();

require_once '../config/db.php'; // SQLite connection
$pdo = db();

function respond($success, $message, $data = []) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}
// Sanitize inputs first
function sanitizeInput($data) {
     return htmlspecialchars(trim($data));
 }

// Handle form actions
$rawInput = file_get_contents("php://input");

$data = json_decode($rawInput, true);

if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    respond(false, 'Invalid data submitted');
    exit;
}

$action = $data['action'] ?? null;
var_dump($_POST);
exit();
switch ($action) {
    case 'signup':
        signup(); break;
    case 'login':
        login(); break;
    case 'reserve':
        makeReservation(); break;
    case 'create_employer':
        createEmployer(); break;
    case 'add_room':
        addRoom(); break;
    case 'update_room':
        updateRoom(); break;
    case 'delete_room':
        deleteRoom(); break;
    case 'add_category':
        addCategory(); break;
    case 'update_category':
        updateCategory(); break;
    case 'delete_category':
        deleteCategory(); break;
    case 'set_price':
        setRoomPrice(); break;
    case 'set_payment_info':
        setPaymentInfo(); break;
    default:
        respond(false, 'Invalid action');
}

function signup() {
     $name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
     $email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
     $password = isset($_POST['password']) ? $_POST['password'] : '';
     $role = 'user'; // Can be changed if employers can create account
     // $role = isset($_POST['role']) ? $_POST['role'] == 'admin' ? 'user' : sanitizeInput($_POST['role']) : 'user';

    if (!$name || !$email || !$password) respond(false, 'All fields are required');

    $pdo = db();
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) respond(false, 'Email already exists');

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $hash, $role]);

    respond(true, 'Account created successfully');
}

function login() {
     $email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
     $password = isset($_POST['password']) ? sanitizeInput($_POST['password']) : '';

    if (!$email || !$password) respond(false, 'Both fields are required');

    $pdo = db();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, $user['password'])) {
        respond(false, 'Invalid credentials');
    }

    $_SESSION['user'] = $user;
    respond(true, 'Login successful');
}

function makeReservation() {
    $user_email = $_POST['userEmail'] ?? null;
    $user_phone = $_POST['userPhone'] ?? null;
    $reservation = json_decode($_POST['reservationData'] ?? '{}', true);
    $checkin = $_POST['checkin'] ?? '';
    $checkout = $_POST['checkout'] ?? '';
    var_dump($_POST);
    exit();
    // Validate user_id (must be a valid number or string with no special chars)
    // Validate user_email (must be a valid email format)
    if (!empty($user_email) && !filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid user email.";
    }

     // Validate checkin and checkout dates (must be valid date format and only digits, hyphen, and slash allowed)
     if (!empty($checkin) && !preg_match("/^\d{4}-\d{2}-\d{2}$/", $checkin)) {
          $errors[] = "Invalid check-in date format. Please use YYYY-MM-DD.";
     }
     if (!empty($checkout) && !preg_match("/^\d{4}-\d{2}-\d{2}$/", $checkout)) {
          $errors[] = "Invalid checkout date format. Please use YYYY-MM-DD.";
     }
    if (!$user_id || !$room_id || !$checkin || !$checkout) respond(false, 'Incomplete booking data');

    $pdo = db();
    $stmt = $pdo->prepare("INSERT INTO bookings (user_id, room_id, checkin, checkout) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $room_id, $checkin, $checkout]);

    respond(true, 'Room booked successfully');
}

function createEmployer() {
    $_POST['role'] = 'employer';
    signup();
}

function addRoom() {
    $name = sanitizeInput($_POST['name']) ?? '';
    $category = sanitizeInput($_POST['category']) ?? '';
    $description = sanitizeInput($_POST['description']) ?? '';
    // Validate room name (only letters, numbers, spaces, and hyphens allowed)
     if (!empty($name) && !preg_match("/^[a-zA-Z0-9\s\-]*$/", $name)) {
          $errors[] = "Room name can only contain letters, numbers, spaces, and hyphens.";
     }
     
     // Validate category (only letters, numbers, spaces, and hyphens allowed)
     if (!empty($category) && !preg_match("/^[a-zA-Z0-9\s\-]*$/", $category)) {
          $errors[] = "Category name can only contain letters, numbers, spaces, and hyphens.";
     }
     
     // Validate description (letters, numbers, spaces, periods, commas, and simple punctuation)
     if (!empty($description) && !preg_match("/^[a-zA-Z0-9\s\.,!?-]*$/", $description)) {
          $errors[] = "Description can only contain letters, numbers, spaces, periods, commas, exclamation marks, and hyphens.";
     }

    if (!isset($_FILES['image'])) respond(false, 'Image is required');

    $imageName = time() . '_' . $_FILES['image']['name'];
    $target = '../uploads/' . $imageName;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        respond(false, 'Failed to upload image');
    }

    $pdo = db();
    $stmt = $pdo->prepare("INSERT INTO rooms (name, category, description, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $category, $description, $imageName]);

    respond(true, 'Room added');
}

function updateRoom() {
    $id = sanitizeInput($_POST['id']) ?? null;
    $name = sanitizeInput( $_POST['name']) ?? '';
    $category = sanitizeInput($_POST['category']) ?? '';
    $description = sanitizeInput($_POST['description']) ?? '';
    // Validate room name (only letters, numbers, spaces, and hyphens allowed)
     if (!empty($name) && !preg_match("/^[a-zA-Z0-9\s\-]*$/", $name)) {
          $errors[] = "Room name can only contain letters, numbers, spaces, and hyphens.";
     }
     
     // Validate category (only letters, numbers, spaces, and hyphens allowed)
     if (!empty($category) && !preg_match("/^[a-zA-Z0-9\s\-]*$/", $category)) {
          $errors[] = "Category name can only contain letters, numbers, spaces, and hyphens.";
     }
     
     // Validate description (letters, numbers, spaces, periods, commas, and simple punctuation)
     if (!empty($description) && !preg_match("/^[a-zA-Z0-9\s\.,!?-]*$/", $description)) {
          $errors[] = "Description can only contain letters, numbers, spaces, periods, commas, exclamation marks, and hyphens.";
     }

    if (!$id) respond(false, 'Room ID is required');

    $pdo = db();
    $stmt = $pdo->prepare("UPDATE rooms SET name = ?, category = ?, description = ? WHERE id = ?");
    $stmt->execute([$name, $category, $description, $id]);

    respond(true, 'Room updated');
}

function deleteRoom() {
    $id = sanitizeInput($_POST['id']) ?? null;
    if (!$id) respond(false, 'Room ID required');

    $pdo = db();
    $stmt = $pdo->prepare("DELETE FROM rooms WHERE id = ?");
    $stmt->execute([$id]);

    respond(true, 'Room deleted');
}

function addCategory() {
    $name = sanitizeInput($_POST['name']) ?? '';
    if (!$name) respond(false, 'Name is required');

    $pdo = db();
    $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
    $stmt->execute([$name]);

    respond(true, 'Category added');
}

function updateCategory() {
    $id = sanitizeInput($_POST['id']) ?? null;
    $name = sanitizeInput($_POST['name']) ?? '';
    if (!$id || !$name) respond(false, 'Incomplete data');

    $pdo = db();
    $stmt = $pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
    $stmt->execute([$name, $id]);

    respond(true, 'Category updated');
}

function deleteCategory() {
    $id = sanitizeInput($_POST['id']) ?? null;
    if (!$id) respond(false, 'ID required');

    $pdo = db();
    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->execute([$id]);

    respond(true, 'Category deleted');
}

function setRoomPrice() {
    $room_id = $_POST['room_id'] ?? null;
    $price = $_POST['price'] ?? null;

    if (!$room_id || !$price) respond(false, 'Incomplete data');

    $pdo = db();
    $stmt = $pdo->prepare("UPDATE rooms SET price = ? WHERE id = ?");
    $stmt->execute([$price, $room_id]);

    respond(true, 'Price updated');
}

function setPaymentInfo() {
    $user_id = $_SESSION['user']['id'] ?? null;
    $method = $_POST['method'] ?? '';
    $details = $_POST['details'] ?? '';
     // Validate user_id (must be a valid number or string with no special chars)
     if (!empty($user_id) && !preg_match("/^[a-zA-Z0-9]*$/", $user_id)) {
          $errors[] = "Invalid user ID.";
     }
     
     // Validate payment method (only letters, numbers, and spaces allowed)
     if (!empty($method) && !preg_match("/^[a-zA-Z0-9\s]*$/", $method)) {
          $errors[] = "Payment method can only contain letters, numbers, and spaces.";
     }
     
     // Validate payment details (only letters, numbers, spaces, periods, commas, and hyphens allowed)
     if (!empty($details) && !preg_match("/^[a-zA-Z0-9\s\.,!?-]*$/", $details)) {
          $errors[] = "Payment details can only contain letters, numbers, spaces, periods, commas, exclamation marks, and hyphens.";
     }
     
    if (!$user_id || !$method || !$details) respond(false, 'Incomplete payment data');

    $pdo = db();
    $stmt = $pdo->prepare("INSERT INTO payment_info (user_id, method, details) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $method, $details]);

    respond(true, 'Payment info saved');
}
