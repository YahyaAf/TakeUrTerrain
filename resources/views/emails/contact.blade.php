<!DOCTYPE html>
<html>
<head>
    <title>Message de Contact</title>
</head>
<body>
    <h3>Vous avez reçu un nouveau message de contact :</h3>
    <p><strong>Nom :</strong> {{ $name }}</p>
    <p><strong>Email :</strong> {{ $email }}</p>
    <p><strong>Message :</strong></p>
    <p>{{ $contactMessage }}</p>
</body>
</html>
