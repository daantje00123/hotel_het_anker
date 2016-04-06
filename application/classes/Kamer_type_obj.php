<?php

class Kamer_type_obj {
    private $id_kamer_type;
    private $naam;

    public function __construct(array $data = array()) {
        foreach($data as $key => $value) {
            if (property_exists($this, $key)) {
                $function = 'set_'.$key;
                $this->$function($value);
            }
        }
    }

    public function get_id_kamer_type()     {return $this->id_kamer_type;}
    public function get_naam()              {return $this->naam;}

    public function set_id_kamer_type($v)   {$this->id_kamer_type = (int) $v; return $this;}
    public function set_naam($v)            {$this->naam = (string) $v; return $this;}
}