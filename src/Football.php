<?php

namespace DataMunging;

class Football
{
    private $dataFile;
    private $data;

    public function __construct()
    {
        $this->loadDataFile(__DIR__ . '../../data/football.dat');
    }

    public function loadDataFile($file)
    {
        $this->dataFile = $file;
        $this->data = file_get_contents($this->dataFile);
        return (boolean) count($this->data);
    }

    public function loadDataFileToArrayOfLines()
    {
        $file = fopen($this->dataFile, "r");
        $lines = array();

        while (!feof($file)) {
            $lines[] = fgets($file);
        }

        fclose($file);
        return $lines;
    }

    public function football()
    {
        $lineStartData  = 2;
        $lengthEachInfo = 2;
        $forStartPosition     = 44;
        $againstStartPosition = 51;

        $teamNameStartPosition = 7;
        $teamNameLength        = 15;

        $teamWithSmallestDiff = 0;
        $smallestDiff         = 100;

        $lines = $this->loadDataFileToArrayOfLines();

        for ($i = 1; $i < $lineStartData; $i++) {
            array_shift($lines);
        }

        foreach ($lines as $teamLine) {
            if ('--' === substr($teamLine, $forStartPosition -1, $lengthEachInfo) ) {
                break;
            }
            $forGoals      = (int) substr($teamLine, $forStartPosition -1, $lengthEachInfo);
            $againstGoals  = (int) substr($teamLine, $againstStartPosition -1, $lengthEachInfo);
            $goalsDiff = abs($forGoals - $againstGoals);
            if ($smallestDiff >= $goalsDiff ) {
                $smallestDiff = $goalsDiff;
                $teamWithSmallestDiff = trim(substr($teamLine, $teamNameStartPosition,$teamNameLength));
            }
        }

        return $teamWithSmallestDiff;
    }
}
