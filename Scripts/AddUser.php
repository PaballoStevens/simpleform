<?php
require '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    
    if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?mess=error");
        exit();
    }

    try {
        $stmt = $conn->prepare("INSERT INTO submissions (fname, email) VALUES (:fname, :email)");
        $stmt->bindParam(':fname', $name);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        header("Location: ../index.php?mess=success");
        exit();
    } catch (PDOException $e) {
        header("Location: ../index.php?mess=error");
        exit();
    }
}