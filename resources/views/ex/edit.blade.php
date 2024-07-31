<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Edit </title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/create.css') }}">
    </head>
<body>
  <div class="container">
    <div class="title">Edit Ex's Profile</div>
    <div class="content">
      <form method="POST" action="{{ route('ex.update', $exName['id']) }}">
        {{ csrf_field() }}
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter your name" required value="{{$exName['name']}}" name="name">
          </div>
          <div class="input-box">
            <span class="details">Reason to Broke Up</span>
            <input type="text" placeholder="Enter the reason" required value="{{$exName['reason_to_separate']}}" name="reason_to_separate">
          </div>
          <div class="input-box">
            <span class="details">Date of Broke Up</span>
            <input type="date" placeholder="Enter the date" required value="{{$exName['date_of_separation']}}" name="date_of_separation">
          </div>
          <div class="input-box">
            <span class="details">Date of Starting the Relationship</span>
            <input type="date" placeholder="Enter the date" required value="{{$exName['date_of_start_dating']}}" name="date_of_start_dating">
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your ex's number" required value="{{$exName['phone_number']}}" name="phone_number">
          </div>
          {{-- 
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div> 
          --}}
        </div>
      
        <div class="button">
          <input type="submit" value="Save">
        </div>
      </form>
    </div>
  </div>

</body>
</html>