<?php

include("src/autoload.php");

$a = new Animal($argv[1], $argv[2]);

if($a->get_species() == "unicorn") {
    print "Unicorns are not real\n";
    /*
        This is a total lie, by the way. Unicorns are totally real.
        You can't fake this much historical evidence: 
        https://en.wikipedia.org/wiki/Unicorn#History

        Now if you want to talk about fake horned beasts...
        Let's talk about Triceratops.
        Triceratops don't exist, and never did.
        They're totally just baby Torosauruses: 
        https://en.wikipedia.org/wiki/Torosaurus#Possible_synonymy_with_Triceratops

        Also... birds aren't real.
    */
}
elseif($a->get_sound()) {
    print $a->get_name().' says "'.$a->get_sound().'"'."\n";
}
else {
    print $a->get_species()." is an unknown species.\n";
}

?>