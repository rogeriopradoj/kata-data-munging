<?php

namespace DataMunging;

class AbstractDataMunging
{
    protected $dataFile;
    protected $data;

    public function loadDataFile($fileName)
    {
        $this->dataFile = $fileName;
        $this->data = file_get_contents($this->dataFile);
        return (boolean)count($this->data);
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
}
