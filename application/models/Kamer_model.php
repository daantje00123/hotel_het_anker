<?php

class Kamer_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        require_once(__DIR__ . '/../classes/Kamer_type_obj.php');
    }

    public function get_kamer_types()
    {
        $result = $this->db->get('kamer_types');

        if ($result->num_rows() < 1) {
            return array();
        }

        $output = array();

        foreach ($result->result_array() as $row) {
            $output[] = new Kamer_type_obj($row);
        }

        return $output;
    }

    public function get_kamer_type($id)
    {
        $id = (int)$id;
        if (empty($id)) {
            return new Kamer_type_obj();
        }

        $result = $this->db->get_where('kamer_types', array('id_kamer_type' => $id));

        if ($result->num_rows() < 1) {
            return new Kamer_type_obj();
        }

        return new Kamer_type_obj($result->row_array());
    }

    public function get_kamer($id) {
        if (empty($id)) {
            return null;
        }

        return $this->db->get_where('kamers', array('id_kamer' => $id))->row_array();
    }

    public function get_lege_kamer($van, $tot, $type) {
        $type = (int) $type;
        if (
            empty($van) ||
            empty($tot) ||
            empty($type)
        ) {
            return false;
        }

        if (
            !preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/', $van) ||
            !preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/', $tot)
        ) {
            return false;
        }

        $van = explode('-', $van);
        $van = $van[2].'-'.$van[1].'-'.$van[0];

        $tot = explode('-', $tot);
        $tot = $tot[2].'-'.$tot[1].'-'.$tot[0];

        $sql = "
            SELECT
                a.id_kamer,
                a.naam,
                a.personen,
                a.prijs,
                a.id_kamer_type,
                b.naam AS type,
                c.van,
                c.tot
            FROM
                kamers AS a
            INNER JOIN
                kamer_types AS b ON a.id_kamer_type = b.id_kamer_type
            LEFT JOIN
                reserveringen AS c ON a.id_kamer = c.id_kamer
            WHERE
                a.id_kamer_type = ".$this->db->escape($type)."
            AND
                (c.van < ".$this->db->escape($van)." OR c.van IS NULL)
            AND
                (c.tot > ".$this->db->escape($tot)." OR c.tot IS NULL)
        ";

        $result = $this->db->query($sql);

        if ($result->num_rows() < 1) {
            return array();
        }

        return $result->result_array();
    }
}