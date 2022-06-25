<?php

class Organism {
    public $species;
    public $name;

    function __construct($name, $species) {
        $this->species = trim(strtolower($species));
        $this->name = trim($name);
    }

    function get_species() {
      return $this->species;
    }
    
    function get_name() {
      return $this->name;
    }
}

?>