<?php

class reservations
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=covoiturage;charset=utf8', 'root', '');
    }
    public function addReservation(array $reservation)
    {
        $sql = "INSERT INTO reservation (animal, nb_valize, mode_paiement,date_meet) VALUES ( :animal, :nb_valize, :mode_paiement, :date_meet)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':animal', $reservation['animal']);
        $stmt->bindValue(':nb_valize', $reservation['nb_valize']);
        $stmt->bindValue(':mode_paiement', $reservation['mode_paiement']);
        $stmt->bindValue(':date_meet', $reservation['date_meet']);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function showReservations()
    {
        $sql = "SELECT * FROM reservation";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteReservation($id)
    {
        $sql = "DELETE FROM reservation where id_reserv = :id_reserv";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_reserv', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function updateReservation(array $reservation)
    {
        $sql = "UPDATE reservation SET animal = :animal, nb_valize = :nb_valize, mode_paiement = :mode_paiement, date_meet = :date_meet";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':animal', $reservation['animal']);
        $stmt->bindValue(':nb_valize', $reservation['nb_valize']);
        $stmt->bindValue(':mode_paiement', $reservation['mode_paiement']);
        $stmt->bindValue(':date_meet', $reservation['date_meet']);
        $stmt->execute();
        return $stmt->rowCount();
    }
}

?>