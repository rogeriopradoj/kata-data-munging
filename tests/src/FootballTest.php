<?php

namespace DataMunging;

class FootballTest extends \PHPUnit_Framework_TestCase
{
    private $football;

    public function setUp()
    {
        $this->football = new \DataMunging\Football;
    }

    public function testFootball()
    {
        $this->assertEquals('Aston_Villa', $this->football->football(), 'Aston_Villa, 1 diff, 46 pro 47 against');
    }
}
