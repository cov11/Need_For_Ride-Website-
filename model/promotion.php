<?php
class Promotion {
    private $id;
    private $code_promotion;
    private $date_debut;
    private $date_fin;
    private $valeur;
    private $user_id;

    // 
    public function __construct($code_promotion, $date_debut, $date_fin, $valeur, $user_id, $id = null) {
        $this->id = $id;
        $this->code_promotion = $code_promotion;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->valeur = $valeur;
        $this->user_id = $user_id;
    }
    public function getAllPromotions() {
        // Ici tu fais une requête SQL pour récupérer toutes les promotions
        // Par exemple :
        $sql = "SELECT * FROM promotions";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des promotions : " . $e->getMessage());
        }}

    // Getters pour récupérer les valeurs des propriétés
    public function getId() {
        return $this->id;
    }

    public function getCodePromotion() {
        return $this->code_promotion;
    }

    public function getDateDebut() {
        return $this->date_debut;
    }

    public function getDateFin() {
        return $this->date_fin;
    }

    public function getValeur() {
        return $this->valeur;
    }

    public function getUserId() {
        return $this->user_id;
    }

    // Setters pour modifier les valeurs des propriétés
    public function setId($id) {
        $this->id = $id;
    }

    public function setCodePromotion($code_promotion) {
        $this->code_promotion = $code_promotion;
    }

    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
    }

    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
    }

    public function setValeur($valeur) {
        $this->valeur = $valeur;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
}
?>
