<?php
use PHPUnit\Framework\TestCase;

final class OrganismTest extends TestCase
{
    public function testUppercaseUserInputHandled(): void
    {
        $a = new Animal("Mr Cat", "CAT");
        $a->get_name();

        $this->assertEquals(
            'cat',
            $a->get_species()
        );
    }
}
?>