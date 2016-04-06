<?php

class Reservering extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model("Kamer_model");
    }

    public function index() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('van', 'van', 'required|regex_match[/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/]', array(
            'required' => 'Selecteer een van datum',
            'regex_match' => 'De geselecteerde datum heeft geen geldig formaat'
        ));
        $this->form_validation->set_rules('tot', 'tot', 'required|regex_match[/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/]', array(
            'required' => 'Selecteer een van datum',
            'regex_match' => 'De geselecteerde datum heeft geen geldig formaat'
        ));

        $types = $this->Kamer_model->get_kamer_types();

        $validation_list = array();

        foreach($types as $type) {
            $validation_list[] = $type->get_id_kamer_type();
        }

        $this->form_validation->set_rules('type', 'type', 'required|in_list['.implode(',', $validation_list).']', array(
            'required' => 'Selecteer een type kamer',
            'in_list' => 'Selecteer een type kamer uit de lijst'
        ));

        if ($this->form_validation->run() === false) {
            $this->_load_view('step1', array('types' => $types, 'step' => 0));
            return;
        }

        $van = $this->input->post('van');
        $tot = $this->input->post('tot');
        $type = $this->input->post('type');

        redirect('reservering/step2/?van='.$van.'&tot='.$tot.'&type='.$type);
    }

    public function step2() {
        $van = $this->input->get('van');
        $tot = $this->input->get('tot');
        $type = $this->input->get('type');

        if (
            empty($van) ||
            empty($tot) ||
            empty($type)
        ) {
            show_error('Niet alle benodigde gegevens zijn aanwezig. <a href="'.base_url('reservering').'">Probeer het opnieuw!</a>');
            return;
        }

        $lege_kamers = $this->Kamer_model->get_lege_kamer($van, $tot, $type);

        $this->load->library('form_validation');

        $validation_list = array();

        foreach($lege_kamers as $kamer) {
            $validation_list[] = $kamer['id_kamer'];
        }

        $this->form_validation->set_rules('kamer', 'kamer', 'required|in_list['.implode(',',$validation_list).']', array(
            'required' => "Selecteer een kamer uit de onderstaande lijst",
            'in_list' => "Selecteer een kamer uit de onderstaande lijst"
        ));

        if ($this->form_validation->run() === false) {
            $this->_load_view('step2', array(
                'lege_kamers' => $lege_kamers,
                'van' => $van,
                'tot' => $tot,
                'type' => $type,
                'step' => 1
            ));
            return;
        }

        $kamer = $this->input->post('kamer');

        redirect('reservering/step3/?van='.$van.'&tot='.$tot.'&type='.$type.'&kamer='.$kamer);
    }

    public function step3() {
        $van = $this->input->get('van');
        $tot = $this->input->get('tot');
        $type = $this->input->get('type');
        $kamer = $this->input->get('kamer');

        if (
            empty($van) ||
            empty($tot) ||
            empty($type)
        ) {
            show_error('Niet alle benodigde gegevens zijn aanwezig. <a href="'.base_url('reservering').'">Probeer het opnieuw!</a>');
            return;
        }

        if (empty($kamer)) {
            show_error('Niet alle benodigde gegevens zijn aanwezig. <a href="'.base_url('reservering/step2/?van='.$van.'&tot='.$tot.'&type='.$type).'">Probeer het opnieuw!</a>');
            return;
        }

        $action = $this->input->post('action');

        if (empty($action) || ($action != 'new' && $action !='old')) {
            $this->_load_view('step3', array(
                'van' => $van,
                'tot' => $tot,
                'type' => $type,
                'kamer' => $kamer,
                'step' => 2
            ));
            return;
        }

        if ($action == 'new') {
            redirect('reservering/step3new/?van='.$van.'&tot='.$tot.'&type='.$type.'&kamer='.$kamer);
            return;
        }

        if ($action == 'old') {
            redirect('reservering/step3old/?van='.$van.'&tot='.$tot.'&type='.$type.'&kamer='.$kamer);
            return;
        }

        redirect();
    }

    public function step3new() {
        $van = $this->input->get('van');
        $tot = $this->input->get('tot');
        $type = $this->input->get('type');
        $kamer = $this->input->get('kamer');

        if (
            empty($van) ||
            empty($tot) ||
            empty($type)
        ) {
            show_error('Niet alle benodigde gegevens zijn aanwezig. <a href="'.base_url('reservering').'">Probeer het opnieuw!</a>');
            return;
        }

        if (empty($kamer)) {
            show_error('Niet alle benodigde gegevens zijn aanwezig. <a href="'.base_url('reservering/step2/?van='.$van.'&tot='.$tot.'&type='.$type).'">Probeer het opnieuw!</a>');
            return;
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('voornaam', 'voornaam', 'required|max_length[50]');
        $this->form_validation->set_rules('tussenvoegsel', 'tussenvoegsel', 'max_length[20]');
        $this->form_validation->set_rules('achternaam', 'achternaam', 'required|max_length[100]');
        $this->form_validation->set_rules('email', 'email', 'required|max_length[200]|valid_email');
        $this->form_validation->set_rules('straat', 'straat', 'required|max_length[100]');
        $this->form_validation->set_rules('huisnummer', 'huisnummer', 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('woonplaats', 'woonplaats', 'required|max_length[100]');
        $this->form_validation->set_rules('postcode', 'postcode', 'required|max_length[7]');
        $this->form_validation->set_rules('telefoon', 'telefoonnummer', 'required|max_length[10]');

        if ($this->form_validation->run() === false) {
            $this->_load_view('step3new', array(
                'van' => $van,
                'tot' => $tot,
                'type' => $type,
                'kamer' => $kamer,
                'step' => 2.5
            ));
            return;
        }

        $voornaam = $this->input->post('voornaam');
        $tussenvoegsel = $this->input->post('tussenvoegsel');
        $achternaam = $this->input->post('achternaam');
        $email = $this->input->post('email');
        $straat = $this->input->post('straat');
        $huisnummer = $this->input->post('huisnummer');
        $woonplaats = $this->input->post('woonplaats');
        $postcode = $this->input->post('postcode');
        $telefoon = $this->input->post('telefoon');

        $postcode = strtoupper(str_replace(' ', '', $postcode));

        $this->load->model("Klant_model");

        $id = $this->Klant_model->new_klant($voornaam, $tussenvoegsel, $achternaam, $email, $straat, $huisnummer, $woonplaats, $postcode, $telefoon);

        redirect('reservering/step4/?van='.$van.'&tot='.$tot.'&type='.$type.'&kamer='.$kamer.'&klant='.$id);
    }

    public function step3old() {
        $van = $this->input->get('van');
        $tot = $this->input->get('tot');
        $type = $this->input->get('type');
        $kamer = $this->input->get('kamer');

        if (
            empty($van) ||
            empty($tot) ||
            empty($type)
        ) {
            show_error('Niet alle benodigde gegevens zijn aanwezig. <a href="'.base_url('reservering').'">Probeer het opnieuw!</a>');
            return;
        }

        if (empty($kamer)) {
            show_error('Niet alle benodigde gegevens zijn aanwezig. <a href="'.base_url('reservering/step2/?van='.$van.'&tot='.$tot.'&type='.$type).'">Probeer het opnieuw!</a>');
            return;
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('klant', 'klant', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->model('Klant_model');

            $this->_load_view('step3old', array(
                'van' => $van,
                'tot' => $tot,
                'type' => $type,
                'kamer' => $kamer,
                'klanten' => $this->Klant_model->get_klanten(),
                'step' => 2.5
            ));
            return;
        }

        $klant = $this->input->post('klant');

        redirect('reservering/step4/?van='.$van.'&tot='.$tot.'&type='.$type.'&kamer='.$kamer.'&klant='.$klant);
    }

    public function step4() {
        $van = $this->input->get('van');
        $tot = $this->input->get('tot');
        $type = $this->input->get('type');
        $kamer = $this->input->get('kamer');
        $klant = $this->input->get('klant');

        if (
            empty($van) ||
            empty($tot) ||
            empty($type)
        ) {
            show_error('Niet alle benodigde gegevens zijn aanwezig. <a href="'.base_url('reservering').'">Probeer het opnieuw!</a>');
            return;
        }

        if (empty($kamer)) {
            show_error('Niet alle benodigde gegevens zijn aanwezig. <a href="'.base_url('reservering/step2/?van='.$van.'&tot='.$tot.'&type='.$type).'">Probeer het opnieuw!</a>');
            return;
        }

        if (empty($klant)) {
            show_error('Niet alle benodigde gegevens zijn aanwezig. <a href="'.base_url('reservering/step3/?van='.$van.'&tot='.$tot.'&type='.$type.'&kamer='.$kamer).'">Probeer het opnieuw!</a>');
            return;
        }

        $this->load->model('Kamer_model');
        $this->load->model('Klant_model');

        $db_type = $this->Kamer_model->get_kamer_type($type);
        $db_kamer = $this->Kamer_model->get_kamer($kamer);
        $db_klant = $this->Klant_model->get_klant($klant);

        $confirm = $this->input->post('confirm');

        if (empty($confirm) || ($confirm != 'confirm' && $confirm != 'cancel')) {
            $this->_load_view('step4', array(
                'van' => $van,
                'tot' => $tot,
                'type' => $db_type,
                'kamer' => $db_kamer,
                'klant' => $db_klant,
                'step' => 3
            ));
            return;
        }

        if ($confirm == 'cancel') {
            redirect();
            return;
        }

        $this->load->model('Reservering_model');
        $this->Reservering_model->new_reservering($van, $tot, $db_klant, $db_kamer, $db_type);

        $this->_load_view('step5', array('step' => 4));
    }

    private function _load_view($path, $data = array()) {
        $this->load->view('layout/header', $data);
        $this->load->view($path, $data);
        $this->load->view('layout/footer', $data);
    }
}