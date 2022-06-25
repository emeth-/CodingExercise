<?php

class Animal extends Organism {
    public $sound;
  
    function __construct($name, $species) {
        parent::__construct($name, $species);

        $this->sound = "";

        //Attempt to retrieve sound from our local file "database". 
        $sound_db_file_path = realpath('animal_sounds/'.$this->get_species());
        if($sound_db_file_path) { //Null if no file at that path

            //Check for Hackerman trying to read files he shouldn't be.
            $valid_folder = realpath(dirname(__FILE__)."/../animal_sounds")."/"; 
            if(str_replace($valid_folder, "", $sound_db_file_path) != $this->get_species()) {
                throw new Exception("Invalid filepath requested, there's shenaniganz afoot!");
            }

            //Read the file
            $this->sound = file_get_contents($sound_db_file_path);
        }

        //If sound not found in local database, try pulling it from wikipedia
        if(!$this->sound) {

            //Grab the HTML from Wikipedia's List_of_animal_sounds page
            $wikipedia_animal_sounds_html = @json_decode(file_get_contents("https://en.wikipedia.org/w/api.php?action=parse&page=List_of_animal_sounds&prop=text&formatversion=2&format=json"), true)['parse']['text'];

            if($wikipedia_animal_sounds_html) {

                //Parse the HTML, finding the table of data we care about
                $dom = new DomDocument();
                @$dom->loadHTML($wikipedia_animal_sounds_html);
                $xpath = new DOMXpath($dom);
                $data_rows = $xpath->query("/html/body/div/table[1]/tbody/tr");
            
                //Loop through each row of the table.
                foreach ($data_rows as $data_row) {

                    //Find the columns containing the animal species and sound, and extract just the FIRST element shown in each.
                    $data_col = $xpath->query('td', $data_row);
                    $wiki_animal_species = strtolower(trim(explode("(", @$data_col->item(1)->nodeValue)[0]));
                    $wiki_animal_sound = trim(explode("(", explode(",", explode("[", @$data_col->item(2)->nodeValue)[0])[0])[0]);

                    //If we found some good data, use it! And then break, we don't need to scan the rest of the table.
                    if($wiki_animal_species && $wiki_animal_sound) {
                        if($wiki_animal_species == $this->get_species()) {
                            $this->sound = $wiki_animal_sound;
                            break;
                        }
                    }
                }
            }
        }
    }

    function get_sound() {
      return $this->sound;
    }
}

?>