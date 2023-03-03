<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
      body{
        background-color: rgb(161, 158, 180);
      }
      h2{
        color: blue;
      }
      .field-input{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 15px 0;

      }
      .otp-field{
        border-radius: 5px;
        font-size: 60px;
        height: 100px;
        width: 100px;
        border: 3px solid #cacaca;
        margin: 1% ;
        text-align: center;
        outline: none;

      }
      .otp-field::-webkit-inner-spin-button,
      .otp-field::-webkit-outer-spin-button{
        -webkit-appearance: none;
        margin: 0;

      }
      .otp-field:valid{
        border-color:#3095d8 ;
        box-shadow: 0 10px 10px -5px rgba(0,0,0,0.25);

      }
      @media only screen and (max-width:455px) { 
        .otp-field{

          /* border-radius: 5px; */
         font-size: 55px;
         height: 80px;
         width: 80px;
      }
        
      }
    </style>
</head>
<body>
    <div class="form" style="text-align: center; ">
      <h2>Verify your Account</h2>
      <p>We emailed you the four digit verification otp code to Enter the code to confirm your email address..</p>
      <form action="" autocomplete="off">
        <div class="error-text">Error</div>
        <div class="field-input">
            <input type="number" name="0tp1" class="otp-field" placeholder="0" min="0" max="9" required onpaste="false">
            <input type="number" name="0tp2" class="otp-field" placeholder="0" min="0" max="9" required onpaste="false">
            <input type="number" name="0tp3" class="otp-field" placeholder="0" min="0" max="9" required onpaste="false">
            <input type="number" name="0tp4" class="otp-field" placeholder="0" min="0" max="9" required onpaste="false">

            
        </div>
        <div class="submit">
            <input type="submit" value="verify" class="button">

        </div>
      </form>
    </div>
    <script>
      const opt = document.querySelectorAll('otp-field');
      //focus on first input 
      otp[0].focus();

      otp.foreach((field, index) => {
        field.addEventlistner('keydown', (e) => {
          if(e.key >= 0 && e.key <=9){
          otp[index].value = "";
          setTimeout( () => {
            otp[index+1].focus();
          }, 4);
        }
         else if(e.key === 'Backspace'){
          setTimeout(() =>{
            otp[index-1].focus();
            }, 4);
          }
        })
      })
       
      
    </script>


<?php
// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];

// Generate a random verification code
$verification_code = substr(md5(rand()), 0, 8);

// Send the verification email
$to = $email;
$subject = 'Verify your email';
$message = 'Hi ' . $name . ', please click on the following link to verify your email: http://verify.php?email=' . urlencode($email) . '&code=' . urlencode($verification_code);
$headers = 'From: kritiadhikari213@gmail.com' . "\r\n" .
           'Reply-To: $@sender' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

// Store the verification code in the database for the user
// ...

// Redirect the user to a page to verify their email
header('Location: verify.php?email=' . urlencode($email));
exit;
?>
    
</body>
</html>