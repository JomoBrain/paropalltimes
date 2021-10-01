<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contact message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-primary">paropalltimes21</h2>
    <h2>Subject : {{ $details['subject']}} </h2>
    <small><b>message</b></small>
    <p>
        {{$details['message']}}
    </p>
    by: <small>{{$details['name']}}</small>
    email: <small><b>{{$details['email']}}</b></small>


</body>
</html>