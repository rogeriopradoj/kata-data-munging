<?php

namespace DataMunging;

class WeatherTest extends \PHPUnit_Framework_TestCase
{
    private $weather;

    public function setUp()
    {
        $this->weather = new \DataMunging\Weather;
    }

    public function testWeather()
    {
        $this->assertEquals(14, $this->weather->weather(), '14th day, 2 temp, 61 to 59');
    }
}
