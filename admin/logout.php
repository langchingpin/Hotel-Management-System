<?php
session_start();

// Check if the user is logged in before logging out
if (isset($_SESSION["user"])) {
    // Clear all session variables
    $_SESSION = array();

    // Invalidate the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Destroy the session
    session_destroy();

    // Redirect to the index or login page after logout
    header("Location: index.php"); // Replace 'index.php' with the appropriate page
    exit();
} else {
    // If the user is not logged in, handle accordingly (e.g., redirect to login page)
    header("Location: index.php"); // Replace 'login.php' with the login page URL
    exit();
}
?>
