<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <title>Register</title>
</head>
<body>
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
   <div class="login">
      <form action="{{ route('register.post') }}" method="POST" class="login__form">
         @csrf
         <h1 class="login__title">Register</h1>

         <div class="login__content">
            <!-- Full Name -->
            <div class="login__box">
               <i class="ri-user-3-line login__icon"></i>
               <div class="login__box-input">
                  <input type="text" name="nama" required class="login__input" value="{{ old('nama') }}" placeholder=" ">
                  <label for="nama" class="login__label">Full Name</label>
               </div>
               @error('nama') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- Role -->
            <div class="login__box">
               <i class="ri-user-settings-line login__icon"></i>
               <div class="login__box-input">
                  <select name="role" required class="login__input" style="margin: 15px 0px">
                     <option value="" disabled selected>Select Role</option>
                     <option value="Admin">Admin</option>
                     <option value="Perawat">Perawat</option>
                     <option value="Dokter">Dokter</option>
                  </select>
                  <label class="login__label" style="
                  font-size: 15px;
              ">Role</label>
               </div>
               @error('role') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- Username -->
            <div class="login__box">
               <i class="ri-user-3-line login__icon"></i>
               <div class="login__box-input">
                  <input type="text" name="username" required class="login__input" value="{{ old('username') }}" placeholder=" ">
                  <label for="username" class="login__label">Username</label>
               </div>
               @error('username') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- Email -->
            <div class="login__box">
               <i class="ri-mail-line login__icon"></i>
               <div class="login__box-input">
                  <input type="email" name="email" required class="login__input" value="{{ old('email') }}" placeholder=" ">
                  <label for="email" class="login__label">Email</label>
               </div>
               @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- Phone -->
            <div class="login__box">
               <i class="ri-phone-line login__icon"></i>
               <div class="login__box-input">
                  <input type="text" name="no_hp" required class="login__input" value="{{ old('no_hp') }}" placeholder=" ">
                  <label for="no_hp" class="login__label">Phone Number</label>
               </div>
               @error('no_hp') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div class="login__box">
               <i class="ri-lock-2-line login__icon"></i>
               <div class="login__box-input">
                  <input type="password" name="password" required class="login__input" placeholder=" ">
                  <label for="password" class="login__label">Password</label>
               </div>
               @error('password') <p class="error">{{ $message }}</p> @enderror
            </div>

            <!-- Confirm Password -->
            <div class="login__box">
               <i class="ri-lock-password-line login__icon"></i>
               <div class="login__box-input">
                  <input type="password" name="password_confirmation" required class="login__input" placeholder=" ">
                  <label for="password_confirmation" class="login__label">Confirm Password</label>
               </div>
            </div>
         </div>

         <button type="submit" class="login__button">Register</button>

         <p class="login__register">
            Already have an account? <a href="/">Login</a>
         </p>
        </form>
   </div>
</body>
</html>
