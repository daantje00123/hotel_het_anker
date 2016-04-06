<?php

class Klant_model extends CI_Model {
    public function new_klant($voornaam, $tussenvoegsel = '', $achternaam, $email, $straat, $hnummer, $woonplaats, $pc, $tel) {
        $this->db->insert('klanten', array(
            'voornaam' => $voornaam,
            'tussenvoegsel' => $tussenvoegsel,
            'achternaam' => $achternaam,
            'email' => $email,
            'straat' => $straat,
            'huisnummer' => $hnummer,
            'woonplaats' => $woonplaats,
            'postcode' => $pc,
            'telefoon' => $tel
        ));

        return $this->db->insert_id();
    }

    public function get_klant($id) {
        $id = (int) $id;

        if (empty($id)) {return null;}

        return $this->db->get_where('klanten', array('id_klant' => $id))->row_array();
    }

    public function get_klanten() {
        return $this->db->get('klanten')->result_array();
    }
}