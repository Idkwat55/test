<?php
include 'header.php';
$pswd = '123456789';
$Hpswd = '$argon2id$v=19$m=65536,t=4,p=1$TTM5dWZZM';
$plainPassword = '123456789';

// Hash the password
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// Output the hashed password
echo "Hashed Password: " . $hashedPassword . "\n";

// Verify the hashed password
if (password_verify($plainPassword, '$2y$10$2FnAIJfCHI8mmU4WEkH81eIYdghH510Sc')) {
    echo "Password is valid.";
} else {
    echo "Invalid password.";
}


include 'footer1.php';
?>