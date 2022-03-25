<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
</head>
<body style="">
    <div class="container" style="">
<br>
        <div class="header">
            <h1>{{ $name }},</h1>
        </div>
<br>
        <div class="main">
            <p>Ce {{date('d/m/Y')}} à {{\Carbon\Carbon::now()->format('H\h i\m m\s')}}{{-- \Carbon\Carbon::now()->format('%d days, %h hours and %i minutes') --}}, vous avec effectuez une extraction de la table {{$tableName}} au format {{$format}}. </p>
            <p>Si vous n'êtes pas responsable de cette action, veuillez nous contacter <a href="mailto:studscoresapi@gmail.com">ici</a>.</p>
<br><br>
            <hr style="border: 1px solid black; width: 100%;">
            <p>Studscore API - Mail Notification System.</p>
        </div>

    </div>
    
    
</body>
</html>