<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Banner Status Updates</h2>

<div>
    <h4>Hi {{$user->name}}</h4>
    The banner <b>{{$banner->name}}</b> you created within Vacoda has a new status of <b>{{$status}}.</b></a><br>
    
    Please click <a href="{{$url}}">here</a> to view your banner.
</div>

</body>
</html>