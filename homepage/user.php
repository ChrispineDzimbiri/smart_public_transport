<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>

    <style>
         @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&family=Poppins:wght@400;600&family=Roboto:wght@100;400;500&display=swap');
        body {
            font-family: montserrat;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: rgb(244, 255, 255);
        }

        header {
         background-color: rgb(5, 147, 255);
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav {
            width: 200px;
            margin-top: 10%;
            padding: 10px;
            color: rgb(32, 65, 91);
            height: 100vh;
            background-color: rgb(5, 147, 255);
            box-sizing: border-box;
            position: fixed;
            top: 0;
            left: 0;
        }

        nav a {
            display: block;
            color: rgb(32, 65, 91);
            text-decoration: none;
            padding: 10px 0;
            margin-bottom: 10px;
          
            /* text-align: center; */
        }

        main {
            /* margin-left: 220px;
            padding: 20px;
          */
        }

        footer {
            background-color: rgb(5, 147, 255);
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        img{
            position: absolute;
            width: 20%;
            right: 20%;
            padding-top: 7%;
        }
    </style>
</head>
<body>

    <header>
        <h1>Welcome, User!</h1>
    </header>

    <nav>
        <a href="user_reviewroutes.php">View Routes</a>
        <a href="viewseats.php">Book Bus</a>
        <a href="home.php">Logout</a>
    </nav>

    <main>
        <!-- Main content goes here -->
        <!-- <h2>Main Content Area</h2>
        <p>This is where the main content for the user page goes.</p> -->
        <img src="Bus driver-amico.png" alt="">
    </main>

    <footer>
        <p>&copy; 2023 Transport System. All rights reserved.</p>
    </footer>

</body>
</html>
