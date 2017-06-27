<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styleconnexion.css">
</head>

<body>
<div class="wrapper">
    <div class="container">
        <h1>Inscrivez-vous !</h1>

        <form class="form" action="{{action('ClientController@ajouter')}}">
            <input type="text" placeholder="Nom">
            <input type="text" placeholder="Prénom">
            <input type="text" placeholder="Email">
            <input type="password" placeholder="Password">
            <input type="text" placeholder="Numero de téléphone">
            <input type="date" placeholder="Date de naissance">
            <input type="text" placeholder="Lieu naissance">
            <input type="text" placeholder="Adresse de domicile">
            <input type="number" placeholder="Code postal">
            <input type="text" placeholder="Ville"><br>
            <button type="submit">S'enregistrer</button>
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../js/indexconnexion.js"></script>
</body>
</html>
