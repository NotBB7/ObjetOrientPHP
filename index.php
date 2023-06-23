<!DOCTYPE html>
<html>

<head>
    <title>Script PHP principal</title>
</head>

<body>
    <?php
    // Inclusion du script de la classe Voiture
    require_once 'Voiture.php';

    // Instanciation de la voiture de vos rêves avec les caractéristiques requises
    $buggati = new Vehicule(
        "AB123CD",       // Immatriculation
        "Noir",          // Couleur
        1500,            // Poids
        200,             // Puissance
        250,             // Capacité Réservoir
        200,              // Niveau Essence
        4,               // Nombre de Place
        0,               // Assurance
        "Bienvenue !"    // Message au tableau de bord
    );

    // Assurer le véhicule (modification de l'attribut assure)
    $buggati->setAssure(true);

    // Affichage du contenu de l'objet avec var_dump()
    var_dump($buggati);

    echo $buggati;

    // Invoquer la méthode Repeindre() pour repeindre la voiture de vos rêves
    if ($buggati->Repeindre("Bleu")) {
        echo '<p>' . $buggati->getMessageTableauBord() . '</p>';
    } else {
        echo '<p>Erreur lors de la repeinture de la voiture.</p>';
    }


    // Ajouter 10 litres de carburant
    $nouveauNiveauEssence = $buggati->Mettre_essence(10.0);
    if ($nouveauNiveauEssence !== null) {
        echo '<p>Nouveau niveau de carburant : ' . $nouveauNiveauEssence . ' litres</p>';
    } else {
        echo '<p>Erreur lors de appoint de carburant.</p>';
    }

    // Ajouter 20 litres de carburant
    $nouveauNiveauEssence = $buggati->Mettre_essence(20.0);
    if ($nouveauNiveauEssence !== null) {
        echo '<p>Nouveau niveau de carburant : ' . $nouveauNiveauEssence . ' litres</p>';
    } else {
        echo '<p>Erreur lors de appoint de carburant.</p>';
    }

    // Trajet 1 : 50 km à une vitesse moyenne de 40 km/h
    $consommation1 = $buggati->Se_deplacer(50, 40);
    if ($consommation1 !== null) {
        echo '<p>Consommation de carburant pour le trajet 1 : ' . $consommation1 . ' litres</p>';
    } else {
        echo '<p>Erreur : niveau d\'essence insuffisant pour le trajet 1.</p>';
    }

    // Trajet 2 : 100 km à une vitesse moyenne de 80 km/h
    $consommation2 = $buggati->Se_deplacer(100, 80);
    if ($consommation2 !== null) {
        echo '<p>Consommation de carburant pour le trajet 2 : ' . $consommation2 . ' litres</p>';
    } else {
        echo '<p>Erreur : niveau d\'essence insuffisant pour le trajet 2.</p>';
    }
    ?>

</body>

</html>