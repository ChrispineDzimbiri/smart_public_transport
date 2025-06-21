<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>

    <style>
       @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&family=Poppins:wght@400;600&family=Roboto:wght@100;400;500&display=swap');
        body {
          
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: rgb(222, 245, 245);
            margin: 0;
            font-family: montserrat;
        }

        .create-account-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
          color: rgb(32, 65, 91);
        }

        label {
            display: block;
            margin-top: 15px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            height: 50px; 
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .terms-policy {
            margin-top: 20px;
            color: #777;
        }

        .terms-policy a {
            color: rgb(5, 147, 255);
            text-decoration: none;
        }

        button {
          
          background-color: rgb(222, 245, 245);
          padding: 8px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          width: 40%;
          color: rgb(5, 147, 255);
      }
      button:hover{
        background-color: rgb(5, 147, 255);
        color: rgb(222, 245, 245);
      }

        .login-link {
            margin-top: 10px;
            color: #333;
            text-decoration: none;
            display: inline-block;
        }

        .login-link a{
          text-decoration: none;
          color: rgb(5, 147, 255);
        }
    </style>
</head>
<body>

    <div class="create-account-container">
        <h1>Create Account</h1>

        <form action="register.php" method="post">

            <input type="tel" id="phone" name="PHONE" placeholder="Enter your phone number" required>


            <input type="text" id="username" name="USERNAME" placeholder="Choose a username" required>


            <input type="password" id="password" name="PASWORD" placeholder="Choose a password" required>

            <p class="terms-policy">By creating an account, you agree to our <a href="#">Terms</a> and <a href="#">Privacy Policy</a>.</p>

            <button type="submit">Create Account</button>
        </form>

        <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
    </div>

</body>
</html>
