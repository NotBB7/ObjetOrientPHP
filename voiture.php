<?php
class Vehicule {
    private string $immatriculation;
    private string $couleur;
    private int $poids;
    private int $puissance;
    private float $capaciteReservoir;
    private float $niveauEssence;
    private int $nombrePlaces;
    private bool $assure;
    private string $messageTableauBord;

    // Constructeur
    public function __construct(
        string $immatriculation,
        string $couleur,
        int $poids,
        int $puissance,
        float $capaciteReservoir,
        float $niveauEssence,
        int $nombrePlaces,
        bool $assure,
        string $messageTableauBord
    ) {
        $this->immatriculation = $immatriculation;
        $this->couleur = $couleur;
        $this->poids = $poids;
        $this->puissance = $puissance;
        $this->capaciteReservoir = $capaciteReservoir;
        $this->niveauEssence = 5.0; // Initialisation à 5 litres
        $this->nombrePlaces = $nombrePlaces;
        $this->assure = false; // Non assuré à la livraison
        $this->messageTableauBord = $messageTableauBord;
    }


    //Couleur
    public function Repeindre(string $nouvelleCouleur): bool {
        if (!isset($nouvelleCouleur)) {
            // Paramètre manquant, renvoyer une erreur
            return false;
        }

        if ($nouvelleCouleur === $this->couleur) {
            // La nouvelle couleur est identique à la couleur courante
            $this->genererMessageTableauBord("Merci pour ce rafraîchissement !");
        } else {
            // La nouvelle couleur est différente, la mémoriser
            $this->couleur = $nouvelleCouleur;
            $this->genererMessageTableauBord("Merci pour ce nouveau look !");
        }

        return true;
    }

    //Essence
    public function Mettre_essence(float $quantiteCarburant): ?float {
        if (!isset($quantiteCarburant)) {
            // Paramètre manquant, renvoyer une erreur
            return null;
        }

        if ($quantiteCarburant < 0) {
            // Quantité de carburant invalide, renvoyer une erreur
            return null;
        }

        $nouveauNiveauEssence = $this->niveauEssence + $quantiteCarburant;
        if ($nouveauNiveauEssence > $this->capaciteReservoir) {
            // La quantité de carburant dépasse la capacité du réservoir, renvoyer une erreur
            return null;
        }

        // Ajouter le carburant au réservoir et générer un message de feedback
        $this->niveauEssence = $nouveauNiveauEssence;
        $this->genererMessageTableauBord("Merci pour le plein d'essence !");

        // Retourner le nouveau niveau de carburant
        return $this->niveauEssence;
    }


    //KMH
    public function Se_deplacer(float $distance, float $vitesseMoyenne): ?float {
        if (!isset($distance, $vitesseMoyenne)) {
            // Paramètres manquants, renvoyer une erreur
            return null;
        }

        if ($distance < 0 || $vitesseMoyenne < 0) {
            // Valeurs invalides pour la distance ou la vitesse moyenne, renvoyer une erreur
            return null;
        }

        $consommation = 0.0;
        if ($vitesseMoyenne < 50) {
            // Vitesse inférieure à 50 km/h, consommation de 10 l/100 km en ville
            $consommation = ($distance / 100) * 10;
        } elseif ($vitesseMoyenne >= 50 && $vitesseMoyenne < 90) {
            // Vitesse entre 50 et 90 km/h, consommation de 5 l/100 km sur route
            $consommation = ($distance / 100) * 5;
        } elseif ($vitesseMoyenne >= 90 && $vitesseMoyenne < 130) {
            // Vitesse entre 90 et 130 km/h, consommation de 8 l/100 km sur autoroute
            $consommation = ($distance / 100) * 8;
        } elseif ($vitesseMoyenne >= 130) {
            // Vitesse supérieure à 130 km/h, consommation de 12 l/100 km (à titre indicatif)
            $consommation = ($distance / 100) * 12;
        }

        if ($consommation > $this->niveauEssence) {
            // Niveau d'essence insuffisant pour le trajet, renvoyer une erreur
            return null;
        }

        // Mise à jour du niveau d'essence en fonction de la consommation
        $this->niveauEssence -= $consommation;

        // Retourner la consommation de carburant
        return $consommation;
    }
    
    public function __toString(): string {
        return sprintf("Immatriculation: %s, Puissance: %d chevaux, Couleur: %s", $this->immatriculation, $this->puissance, $this->couleur);
    }


        // Getter pour l'attribut immatriculation
        public function getImmatriculation(): string {
            return $this->immatriculation;
        }
    
        // Getter pour l'attribut couleur
        public function getCouleur(): string {
            return $this->couleur;
        }
    
        // Getter pour l'attribut poids
        public function getPoids(): int {
            return $this->poids;
        }
    
        // Getter pour l'attribut puissance
        public function getPuissance(): int {
            return $this->puissance;
        }
    
        // Getter pour l'attribut capaciteReservoir
        public function getCapaciteReservoir(): float {
            return $this->capaciteReservoir;
        }
    
        // Getter pour l'attribut niveauEssence
        public function getNiveauEssence(): float {
            return $this->niveauEssence;
        }
    
        // Getter pour l'attribut nombrePlaces
        public function getNombrePlaces(): int {
            return $this->nombrePlaces;
        }
    
        // Getter pour l'attribut assure
        public function isAssure(): bool {
            return $this->assure;
        }
    
        // Getter pour l'attribut messageTableauBord
        public function getMessageTableauBord(): string {
            return $this->messageTableauBord;
        }

        // Setter pour l'attribut assure
    public function setAssure(bool $assure): void {
        $this->assure = $assure;
    }

        // Méthode pour générer un message pour le tableau de bord
        public function genererMessageTableauBord(string $message): void {
            $this->messageTableauBord = $message;
        }
}
