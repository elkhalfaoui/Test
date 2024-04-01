<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
</head>

<body>
    <h2>Nouvelle demande de création de compte</h2>
    <p>Réception d'une demande de création de compte avec les éléments suivants :</p>
    <ul>
        <li><strong>Nom</strong> : {{ $demande->nom }}</li>
        <li><strong>Prénom</strong> : {{ $demande->prenom }}</li>
        <li><strong>Email</strong> : {{ $demande->email }}</li>
        <li><strong>Numéro de téléphone</strong> : {{ $demande->telephone }}</li>
        <li><strong>Etablissement</strong> : {{ $demande->etablissement }}</li>
        <li><strong>Service</strong> : {{ $demande->service }}</li>
    </ul>
</body>

</html>
