<?php

namespace DataMunging;

class Weather extends AbstractDataMunging
{
    public function __construct()
    {
        $this->loadDataFile(__DIR__ . '../../data/weather.dat');
    }

    public function weather()
    {
        $lineStartData = 3;
        $lengthEachInfo = 2;
        $maxStart = 7;
        $minStart = 13;

        $dayOfMinSpread = 0;
        $minSpread = 100;

        $lines = $this->loadDataFileToArrayOfLines();

        for ($i = 1; $i < $lineStartData; $i++) {
            array_shift($lines);
        }

        for ($day = 0; $day < 30; $day++) {
            $maxTemp = (int) substr($lines[$day], $maxStart -1, $lengthEachInfo);
            $minTemp = (int) substr($lines[$day], $minStart -1, $lengthEachInfo);
            $spread = $maxTemp - $minTemp;
            if ($spread < $minSpread ) {
                $minSpread = $spread;
                $dayOfMinSpread = $day + 1;
            }

        }

        return $dayOfMinSpread;
    }
}
