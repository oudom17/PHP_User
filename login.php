<?php
session_start(); // Start session for form processing or user authentication
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include head.php for common meta tags, CSS, and other head content -->
    <?php include "include/head.php"; ?>

    <!-- Additional page-specific styles to match the image design -->
    <style>
        .login-container {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-form {
            padding: 30px;
            background-color: #ffffff;
        }

        .login-panel {
            background-color: #343a40; /* Dark background as in the image */
            color: #ffffff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .form-outline input {
            border-radius: 4px;
        }

        .forgot-password {
            color: #6c757d;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password:hover {
            text-decoration: underline;
            color: #007bff;
        }

        .btn-login {
            width: 100%;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }
    </style>

    <title>Login - Your Website</title>
</head>
<body>
    <!-- Include header.php for navigation and branding -->
    <?php include "include/header.php"; ?>

    <!-- Section: Login Block -->
    <section class="login-container">
        <div class="login-card">
            <div class="login-panel">LOGIN</div>
            <div class="login-form">
                <form action="process_login.php" method="POST"> <!-- Point to a processing script -->
                    <!-- Username input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="formLoginUsername" name="username" class="form-control" required />
                        <label class="form-label" for="formLoginUsername">Username</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="formLoginPassword" name="password" class="form-control" required />
                        <label class="form-label" for="formLoginPassword">Password</label>
                    </div>

                    <!-- Remember me and Forgot Password -->
                    <div class="d-flex justify-content-between mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe" />
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <a href="forgot_password.php" class="forgot-password">Forgot Password?</a>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-login mb-4">
                        Login
                    </button>

                    <!-- Link to Signup -->
                    <p class="text-center">Don't have an account? <a href="signup.php" class="text-primary">Sign up</a></p>

                    <!-- Error/Success Messages (if any) -->
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo '<div class="alert alert-' . (strpos($_SESSION['message'], 'Error') !== false ? 'danger' : 'success') . '" role="alert">' . htmlspecialchars($_SESSION['message']) . '</div>';
                        unset($_SESSION['message']); // Clear the message after displaying
                    }
                    ?>
                </form>
            </div>
        </div>
    </section>
    <!-- Section: Login Block -->

    <!-- Include footer.php for footer content -->
    <?php include "include/footer.php"; ?>

    <!-- MDB JavaScript (required for data-mdb-* attributes) -->
    <script src="https://cdn.jsdelivr.net/npm/mdb-ui-kit/dist/js/mdb.min.js"></script>
</body>
</html>