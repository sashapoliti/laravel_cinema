<?php

namespace App\Functions;

class Helpers
{

    public static function getCsvData($path)
    {


        $file_stream = fopen($path, 'r');

        if ($file_stream === false) {
            exit('Cannot open the file ' . $path);
        }

        $data = [];
        while ($row = fgetcsv($file_stream)) {
            $data[] = $row;
        }
        //chiudo il file
        fclose($file_stream);

        return $data;
    }
}