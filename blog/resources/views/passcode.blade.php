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
<form action="{{route('passcodeLogin')}}" method="post">
    @csrf
    <label for="">passcode</label>
    <input type="text" name="passcode" required>
    <button>Submit</button>
</form>
</body>
</html>
