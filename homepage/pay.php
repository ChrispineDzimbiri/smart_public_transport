<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .payment-form {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #f73b3b;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ea0909;
        }
        h2{
          color: #ea0909;
          margin-top: 0;
          margin-left: 10px;
        }
        img{
          width: 90px;
          margin-left: 80px;
        }
    </style>
    <title>Airtel Money Payment</title>
</head>
<body>
    <div class="payment-form">
      <div>
        <img src="airtel-logo.png" alt="">
      </div>
        <h2>Airtel Money Payment</h2>
        <form action="process_payment.php" method="post">
          
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" required>

            <label for="pin">Airtel Money PIN:</label>
            <input type="password" id="pin" name="pin" required>

            <input type="hidden" id="seatNumber" name="seatNumber">
            
            <button type="submit">Pay Now</button>
        </form>
    </div>
</body>
</html>
