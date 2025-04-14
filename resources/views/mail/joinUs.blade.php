<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>

<body>
    <p>Ciao,</p>
    <p>Hai ricevuto un nuovo messaggio da: <strong>{{ $userData['email'] }}</strong></p>
    <p>Messaggio:</p>
    <blockquote>
        {{ $userData['message_user'] }}
    </blockquote>
    <p>Grazie.</p>
    <a href="{{ route('make.revisor', ['email' => $userData['email']]) }}">Rendi Revisore</a>
</body>

</html>
