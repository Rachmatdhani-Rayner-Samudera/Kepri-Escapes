<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepri Escapes</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
   </head>
<body>
  <div class="wrapper">
    <h2>Kepri Escapes</h2>
    <p>Register for your adventure</p>
    <form action="{{ route('register-proses') }}" method="POST">
        @csrf
      <div class="input-box">
        <input name="name" type="text" placeholder="Full Name" autofocus required value="{{ old('name') }}">
      </div>

    @error('name')
    <small>{{ $message }}</small>
    @enderror

      <div class="input-box">
        <input name="email" type="email" placeholder="Email" required value="{{ old('email') }}">
      </div>

      @error('email')
<small>{{ $message }}</small>
@enderror

      <div class="input-box">
        <input name="phone" type="text" placeholder="Phone" required value="{{ old('phone') }}">
      </div>

      @error('phone')
<small>{{ $message }}</small>
@enderror

      <div class="input-box">
        <input name="password" type="password" placeholder="Password" required>
      </div>

      @error('password')
<small>{{ $message }}</small>
@enderror

<div class="input-box">
    <input name="password_confirmation" type="password" placeholder="Password Confirmation" required>
  </div>

  @error('confirmed')
<small>{{ $message }}</small>
@enderror

      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Don't have an account? <a href="/login">Register Now</a></h3>
      </div>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if($massage = Session::get('sucess'))
  <script>
        Swal.fire({
  title: "{{ $massage }}",
  icon: "success"
});
  </script>
  @endif
</body>
</html>
