<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['email'])) {
  // Redirect to the dashboard or home page
  header('Location: dashboard.php');
  exit;
}
?>

        <?php
// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Validate the email and password
  if (validateEmailPassword($email, $password)) {
    // Create a new session
    $_SESSION['email'] = $email;
    // Redirect to the dashboard or home page
    header('Location: dashboard.php');
    exit;
  } else {
    // Display an error message
    echo 'Invalid email or password';
  }
}

function validateEmailPassword($email, $password) {
  // Your validation logic here
  // For example:
  $validCredentials = [
    ['email' => 'g@g', 'password' => 'g'],
    ['email' => 's@s', 'password' => 's'],
    ['email' => 'z@z', 'password' => 'z'],
  ];
  return $validCredentials.some((credential) => {
    return $email === credential.email && $password === credential.password;
  });
}
?>
