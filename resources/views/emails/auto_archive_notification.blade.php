<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Banners Scheduled for Auto-Archive</h2>

<div>
    <h4>Hi {{ $user->name }}</h4>
    <p>There are {{ $count }} banners scheduled for auto archive this week. <a href="{{ url('banners/scheduled') }}">Click here</a> to view the list.</p>
</div>

</body>
</html>