<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

   {{-- CSS --}}
   <link rel="stylesheet" href="css/styles.css">

   <title>Register Form</title>
</head>
<body>
   <div class="login">
      {{-- <img src="img/login.png" alt="register image" class="login__img"> --}}

      <form action="" class="login__form">
         <h1 class="login__title">Register</h1>

         <div class="login__content">
            <!-- Full Name -->
            <div class="login__box">
               <i class="ri-user-3-line login__icon"></i>

               <div class="login__box-input">
                  <input type="text" required class="login__input" id="register-name" placeholder=" ">
                  <label for="register-name" class="login__label">Full Name</label>
               </div>
            </div>

            <!-- Email -->
            <div class="login__box">
               <i class="ri-mail-line login__icon"></i>

               <div class="login__box-input">
                  <input type="email" required class="login__input" id="register-email" placeholder=" ">
                  <label for="register-email" class="login__label">Email</label>
               </div>
            </div>

            <!-- Password -->
            <div class="login__box">
               <i class="ri-lock-2-line login__icon"></i>

               <div class="login__box-input">
                  <input type="password" required class="login__input" id="login-pass" placeholder=" ">
                  <label for="logim-pass" class="login__label">Password</label>
                  <i class="ri-eye-off-line login__eye" id="login-eye"></i>
               </div>
            </div>

            <!-- Confirm Password -->
            <div class="login__box">
               <i class="ri-lock-password-line login__icon"></i>

               <div class="login__box-input">
                  <input type="password" required class="login__input" id="register-confirm-pass" placeholder=" ">
                  <label for="register-confirm-pass" class="login__label">Confirm Password</label>
               </div>
            </div>
         </div>

         <button type="submit" class="login__button">Register</button>

         <p class="login__register">
            Already have an account? <a href="/">Login</a>
         </p>
      </form>
   </div>

   <!--=============== MAIN JS ===============-->
   <script src="js/main.js"></script>
</body>
</html>
