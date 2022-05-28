<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Login</h1>
<form action="{{route('login')}}" method="post">
    @csrf
    <label for="">Email OR Phone</label>
    <input type="text" name="aa" required>
    <br><br>
    <label for="">Password</label>
    <input type="password" name="password"> <br>
    <button>Submit</button>
</form>
</body>
</html>
