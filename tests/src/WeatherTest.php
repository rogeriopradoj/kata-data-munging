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
        $this->assertTrue($this->weather->weather());
    }
}
