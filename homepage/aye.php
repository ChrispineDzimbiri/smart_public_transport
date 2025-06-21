

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Payment.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="table-container">
      <div class="container">
        <div class="title">
          <h4>Select a <span style="color: #ff0000">Payment</span> method</h4>
        </div>

        <form action="#">

          <div class="category">
           
            <label for="mastercard" class="mastercardMethod">
              <div class="imgName">
                <div class="imgContainer mastercard">
                  <img src="TNM.png" alt="" />
                </div>
                <span class="name">TNM Mpamba</span>
              </div>
              <span class="check"
                ><i class="fa-solid fa-circle-check" style="color: #76b4c1"></i
              ></span>
            </label>

            <a href="pay.php">
            <label for="Airtel" class="Airtel">
              <div class="imgName AMEX">
                <div class="imgContainer">
                  <img src="airtel-logo.png" alt="" />
                </div>
                <span class="name">Airtel Money</span>
              </div>
              <span class="check"
                ><i class="fa-solid fa-circle-check" style="color: #76b4c1"></i
              ></span>
            </label>
          </a>
          
          </div>
        </form>
      </div>
    </div>
  </body>
</html>