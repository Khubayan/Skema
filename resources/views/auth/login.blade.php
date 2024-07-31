<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/create.css') }}">
    </head>
<body>
  <div class="container">
    @if (session('errorLogin'))
    <div style="text-align: center"">
        {{ session('errorLogin') }}
    </div>
@endif
    <div class="title">Login</div>
    <div class="content">
        <form action="{{ route('auth.user') }}" method="POST">
            {{ csrf_field() }}
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="Enter the reason" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" placeholder="Enter the date" required>
                </div>
                {{-- <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" name="phone_number" placeholder="Enter your ex's number" required>
                </div> --}}
                
            </div>
        
            <div class="button">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
  </div>

</body>
</html>