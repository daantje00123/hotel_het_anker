<?php

class Reservering_model extends CI_Model {
    public function new_reservering($van, $tot, $klant, $kamer, $type) {
        if (
            empty($van) ||
            empty($tot) ||
            empty($klant) ||
            empty($kamer)
        ) {
            return false;
        }

        if (
            !preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/', $van) ||
            !preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/', $tot)
        ) {
            return false;
        }

        $v = $van;
        $t = $tot;

        $van = explode('-', $van);
        $van = $van[2].'-'.$van[1].'-'.$van[0];

        $tot = explode('-', $tot);
        $tot = $tot[2].'-'.$tot[1].'-'.$tot[0];

        $this->db->insert('reserveringen', array(
            'id_kamer' => $kamer['id_kamer'],
            'id_klant' => $klant['id_klant'],
            'van' => $van,
            'tot' => $tot
        ));

        $this->load->library('email');

        $this->email->from('hotelhetanker@daanvanberkel.nl', 'Hotel Het Anker');
        $this->email->to($klant['email'], $klant['voornaam'].(!empty($klant['tussenvoegsel']) ? ' '.$klant['tussenvoegsel'] : '').' '.$klant['achternaam']);

        $this->email->subject('Reservering bevestiging');
        $this->email->message($this->load->view('confirm_email', array(
            'klant' => $klant,
            'type' => $type,
            'kamer' => $kamer,
            'van' => $v,
            'tot' => $t
        ), true));

        return $this->email->send();
    }
}