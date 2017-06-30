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

        <form class="form" action="{{url('/client/ajouter')}}" method="post">
            {!! csrf_field() !!}
            <select name="civilite" type="text" class="form-control">
                <option value="MR" selected>MR</option>
                <option value="MME">MME</option>
            </select>
            <input name="name" type="text" placeholder="Nom">
            <input name="prenom" type="text" placeholder="Prénom">
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="password" placeholder="Password">
            <input name="numero_telephone" type="text" placeholder="Numero de téléphone">
            <input name="date_naissance" type="date" placeholder="Date de naissance">
            <input name="lieu_naissance" type="text" placeholder="Lieu naissance">
            <input name="adresse_domicile" type="text" placeholder="Adresse de domicile">
            <input name="postal_domicile" type="number" placeholder="Code postal">
            <input name="ville_domicile" type="text" placeholder="Ville"><br>
            <button type="submit">S'enregistrer</button><br><br>

            <a href="/login">Retour</a>
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
