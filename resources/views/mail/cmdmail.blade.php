<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de votre commande miliboo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #000000 !important;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 750px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #111111 !important;
            text-align: center;
        }
        p {
            margin: 10px 0;
            color: #000000 !important;
        }
        .btn {
            display: inline-block;
            background-color: #222222;
            color: #ffff55 !important;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }
        .btn:hover {
            background-color: #333333;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bonjour {{ $prenomclient }} {{ $nomclient }},</h1>

        <p>Merci d'avoir fait confiance à Miliboo pour votre commande.</p>
        <p>Le détail de votre commande est disponible sur votre compte client.</p>

        <p>
            <a href="{{ url('detailcommande?id='.$id)}}" class="btn">Voir cette commande</a>
        </p>

        <p>Si vous ne parvenez pas à cliquer sur le bouton ci-dessus, copiez et collez ce lien dans votre navigateur :</p>
        <p><a href="{{ url('detailcommande?id='.$id)}}">{{ url('detailcommande?id='.$id)}}</a></p>

        <p>Adresse email utilisée : {{ $emailclient }}</p>

        <p>Merci et à bientôt,</p>
        <p>L'équipe de Miliboo</p>

        <div class="footer">
            <p>Si vous n'avez commandé d'articles sur miliboo, contactez immédiatement le service client.</p>
        </div>
    </div>
</body>
</html>
