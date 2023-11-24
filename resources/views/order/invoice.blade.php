<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <title>Invoice</title>


   {{-- Link to CSS --}}
   <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
   
   {{-- bootsrap --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
     
   {{-- Box Icons --}}
   <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
   <style>
    .pe{
      margin-top: 20px;
    }
    </style>
</head>
<body>

    <div class="wrapper">
      <h2>Invoice</h2>
      <p class="pe">Check your invoice here</p>
      <table>
        <tr class="pe">
          <td>Name</td>
          <td>: {{$order->name}}</td>
        </tr>
        <tr class="pe">
          <td>Phone Number</td>
          <td>: {{$order->phone}}</td>
        </tr>
        <tr class="pe">
          <td>Email</td>
          <td>: {{$order->email}}</td>
        </tr>
        <tr class="pe">
          <td>Qty</td>
          <td>: {{$order->qty}}</td>
        </tr>
        <tr class="pe">
          <td>Total</td>
          <td>: IDR {{$order->total_price}}</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>: {{$order->status}}</td>
        </tr>
      </table>
      <button class="btn btn-primary pe"><a href="" class="text-decorat8ion-none">Back To Dashboard</a></button>
  
    </div>
    
  </div>
    











  {{-- JQuery --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  {{-- link to JS --}}
  <script src="{{asset('assets/js/blog.js')}}"></script>
</body>
</html>
