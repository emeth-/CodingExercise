<?php
use PHPUnit\Framework\TestCase;

final class AnimalTest extends TestCase
{
    public function testReadSoundFromLocalFile(): void
    {
        $a = new Animal("Mr Kitty", "cat");
        $a->get_sound();

        $this->assertEquals(
            'meow',
            $a->get_sound()
        );
    }

    public function testReadSoundFromLocalFileTwoWordName(): void
    {
        $a = new Animal("Mr Kitty", "guinea pig");
        $a->get_sound();

        $this->assertEquals(
            'wheek',
            $a->get_sound()
        );
    }


    public function testReadSoundFromWikipedia(): void
    {
        $a = new Animal("Mr Crane", "crane");
        $a->get_sound();

        $this->assertEquals(
            'clang',
            $a->get_sound()
        );
    }

    public function testReadSoundFromWikipediaWithMultipleSounds(): void
    {
        $a = new Animal("Mr Crab", "crab");
        $a->get_sound();

        $this->assertEquals(
            'chirp',
            $a->get_sound()
        );
    }


    public function testReadSoundFromFileHackerInput(): void
    {
        try {
            $a = new Animal("Mr Kitty", "../../../../../etc/passwd");
        } catch (Exception $e) {
            $this->assertEquals($e->getMessage(), "Invalid filepath requested, there's shenaniganz afoot!");
        }
    }
}
?>