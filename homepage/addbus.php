<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h2, h3 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: rgb(32, 65, 91);
            color: white;
        }

        button {
            background-color: rgb(32, 65, 91);
            color: white;
            padding: 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
        padding: 8px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button.delete {
        background-color: #e74c3c; /* Red color for delete button */
        color: white;
        transition: 0.3s;
    }
    button.delete:hover{
        background-color: #3498db;
    }

    button.edit {
        background-color: #3498db; /* Blue color for edit button */
        color: white;
    }

    </style>
</head>
<body>




    <?php include 'bus.php'; ?>

    <h3>Available Buses</h3>
    <?php displayBuses(); ?>

    <h3>Add New Bus</h3>
    <form method="post" action="">
       
        <input type="text" placeholder="registration number" id="registration_number" name="registration_number" required>
        <input type="text" placeholder="bus capacity" id="capacity" name="capacity" required>
        <input type="text" placeholder="price" id="price" name="price" required>
        <input type="text" placeholder="route" id="route" name="route" required>
        <button type="submit" name="add_bus">Add Bus</button>
    </form>

    <?php
    include 'dashbord.php';?>

</body>
</html>
