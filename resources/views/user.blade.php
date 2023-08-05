{{-- @dd($usersData); --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$usersData['name']}}</title>
</head>
<body>
    <h1>{{$usersData['id']}}</h1>
    <h1>{{$usersData['name']}}</h1>
    <h1>{{$usersData['age']}}</h1>
    <h1>{{$usersData['email']}}</h1>    
</body>
</html>