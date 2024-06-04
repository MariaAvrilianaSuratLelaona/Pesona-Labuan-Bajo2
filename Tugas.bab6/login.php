<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $hashed_password = password_hash("maria123", PASSWORD_DEFAULT);

    if ($username === "2218096" && password_verify($password, $hashed_password)) {
        $_SESSION["username"] = $username;

        header("Location: admin.php");
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="Labuan Bajo 2.jpeg" />
    <title>Labuan Bajo</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <div class="logo">
                    <img src="Labuan Bajo 2.jpeg" alt="" />
                </div>
                <input type="checkbox" id="click" />
                <label for="click" class="menu-btn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="login.html" class="btn_login">Login</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="center">
              <div class="form-login">
               <h2>Login</h2>
               <form action="" id="loginForm">
                 <input class="input" type="text" name="username"
                      placeholder="Enter your username" />
                   <input class="input" type="password" name="password"
                      placeholder="Enter your password" />
                 <button type="submit" class="btn_login" name="login"  
                            id="login"> Login
                 </button>
               </form>
               <p>Don't have an account? <a href="register.html" class="link-register">Register here</a></p>
              </div>
            </div>
          </main>
          <footer>
             <h4>&copy;  Labuan Bajo : Wisata Surga Tersembunyi di Nusa Tenggara Timur jadi pilihan untuk menghabiskan waktu liburan berharga anda.</h4>
            </footer>
          </div>

          <script>
            const loginForm = document.getElementById('loginForm');
      
            loginForm.addEventListener('submit', function(event) {
                event.preventDefault();
      
                // Get form values
                const username = loginForm.elements['username'].value;
                const password = loginForm.elements['password'].value;
      
                // Retrieve registered data from local storage
                const registeredUsername = localStorage.getItem('registeredUsername');
                const registeredPassword = localStorage.getItem('registeredPassword');
      
                // Check if entered username and password match with registered data
                if (username === registeredUsername && password === registeredPassword) {
                    // Save username to local storage
                    localStorage.setItem('loggedInUsername', username);
      
                    // Redirect to dashboard if login is successful
                    window.location.href = 'admin.html';
                } else {
                    // Show alert box for invalid login
                    alert('Invalid username or password. Please try again.');
                }
            });
          </script>
</body>

</html>
