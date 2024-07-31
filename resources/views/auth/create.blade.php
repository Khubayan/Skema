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
        <div class="title">Register</div>
        <div class="content">
            <form action="{{ route('auth.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="Enter the reason" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Wa Number</span>
                        <input type="text" name="wa_number" placeholder="Enter the date" required>
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
                    <input type="submit" value="Register">
                </div>
            </form>
            <a href="{{ route('auth.user') }}">Login</a>
        </div>
    </div>

</body>

</html>
