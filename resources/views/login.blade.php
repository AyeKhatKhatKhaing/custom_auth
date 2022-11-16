<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Login Form</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="">Email or Phone</label><br>
        <input type="text" name="userCredential" required><br>
        <label for="">Password</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>
