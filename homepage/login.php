<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

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

        .login-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: rgb(32, 65, 91);
        }

        input {
           margin-left: 40px;
            height: 50px; 
            width: 80%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
          
            background-color: rgb(222, 245, 245);
            padding: 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 20%;
            margin-left: 40%;
            color: rgb(5, 147, 255);
        }
        button:hover{
          background-color: rgb(5, 147, 255);
          color: rgb(222, 245, 245);
        }
        .create-account {
            text-align: center;
            margin-top: 20px;
        }

        .create-account a {
            color: rgb(5, 147, 255);
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Welcome back
        !</h2>

        <form action="validate.php" method="post">
            
            <input type="tel" id="PHONE" name="PHONE" placeholder="+265....." required>

           
            <input type="password" id="PASWORD" name="PASWORD" placeholder="*******" required>

            <button type="submit">Login</button>
        </form>

        <div class="create-account">
            <p>Are you new? <a href="createacc.php">signup</a></p>
        </div>
    </div>

</body>
</html>
