<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   {{-- CSS --}}
   <link rel="stylesheet" href="css/styles.css">

   <title>Login Form</title>
</head>
<body>
   <div class="login">
      {{-- <img src="img/login.png" alt="login image" class="login__img"> --}}

      <form action="{{ route('login.post') }}" method="POST" class="login__form">
         @csrf
         <h1 class="login__title">Login</h1>

         <div class="login__content">
            <div class="login__box">
               <i class="ri-user-3-line login__icon"></i>
               <div class="login__box-input">
                  <input type="text" name="username" required class="login__input" id="login-username" placeholder=" ">
                  <label for="login-username" class="login__label">Username</label>
               </div>
            </div>

            <div class="login__box">
               <i class="ri-lock-2-line login__icon"></i>
               <div class="login__box-input">
                  <input type="password" name="password" required class="login__input" id="login-pass" placeholder=" ">
                  <label for="login-pass" class="login__label">Password</label>
                  <i class="ri-eye-off-line login__eye" id="login-eye"></i>
               </div>
            </div>
         </div>

         <div class="login__check">
            <div class="login__check-group">
               <input type="checkbox" name="remember" class="login__check-input" id="login-check">
               <label for="login-check" class="login__check-label">Remember me</label>
            </div>
            <a href="#" class="login__forgot">Forgot Password?</a>
         </div>

         <button type="submit" class="login__button">Login</button>

         <p class="login__register">
            Don't have an account? <a href="/register">Register</a>
         </p>
      </form>
   </div>

   <!-- Notifikasi SweetAlert2 -->
   @if (session('error'))
   <script>
      Swal.fire({
         title: 'Error!',
         text: '{{ session("error") }}',
         icon: 'error',
         confirmButtonText: 'OK',
         timer: 3000,
         timerProgressBar: true,
      });
   </script>
   @endif

   @if (session('success'))
   <script>
      Swal.fire({
         title: 'Success!',
         text: '{{ session("success") }}',
         icon: 'success',
         confirmButtonText: 'OK',
         timer: 3000,
         timerProgressBar: true,
      });
   </script>
   @endif

   <!--=============== MAIN JS ===============-->
   <script src="js/main.js"></script>
</body>
</html>
