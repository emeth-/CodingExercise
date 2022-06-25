<?php
use PHPUnit\Framework\TestCase;

final class OrganismTest extends TestCase
{
    public function testUppercaseUserInputHandled(): void
    {
        $a = new Animal("Mr Cat", "CAT");
        $a->get_sound();

        $this->assertEquals(
            'meow',
            $a->get_sound()
        );
    }

    public function testUnicornSpecialCase(): void
    {
        $a = new Animal("Mr Uni", "unicorn");
        $a->get_sound();

        $this->assertEquals(
            '',
            $a->get_sound()
        );
    }

    public function testInvalidAnimal(): void
    {
        $a = new Animal("Mr qwerty", "qwertyuiop");
        $a->get_sound();

        $this->assertEquals(
            '',
            $a->get_sound()
        );
    }
}
?>