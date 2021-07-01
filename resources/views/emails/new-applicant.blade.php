<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Új online bejelentkezes</h1>

<p><strong>Időpont:</strong> {{ $appointment }}</p>
<p><strong>Neve:</strong> {{ $name }}</p>
<p><strong>Email:</strong> {{ $email ? $email : ''}}</p>
<p><strong>Telefonszám:</strong> {{ $phone }}</p>
<p><strong>Megjegyzés:</strong> {{ isset($comment) ? $comment : '' }}</p>

</body>
</html>
