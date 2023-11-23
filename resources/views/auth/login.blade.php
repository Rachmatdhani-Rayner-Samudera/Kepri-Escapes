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
    <p>Start you advanture | Login</p>
    <form action="{{ route('login-proses') }}" method="POST">
        @csrf
      <div class="input-box">
        <input name="email" type="text" placeholder="Your email" required>
      </div>

      @error('email')
      <small>{{ $massage }}</small>
      @enderror

      <div class="input-box">
        <input name="password" type="password" placeholder="Your password" required>
      </div>

      @error('password')
      <small>{{ $massage }}</small>
      @enderror

      <div class="policy">
        <input type="checkbox">
        <h3>Remember Me?</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Don't have an account? <a href="/register">Register Now</a></h3>
      </div>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if($massage = Session::get('error'))
  <script>
        Swal.fire({
  title: "{{ $massage }}",
  icon: "error"
});
  </script>
  @endif
</body>
</html>
