<?php

namespace App\Exports;

use App\Models\TalkshowRegistration;
use Maatwebsite\Excel\Concerns\FromArray;

class PTExport implements FromArray
{

    public function array() : array
    {     
        $registrations = TalkshowRegistration::select('name', 'phone', 'email', 'data')->get()->toArray();
        $registrations = array_map(function($reg) {
            $data = json_decode($reg['data'], true);
            $reg = array_merge($reg, $data);
            unset($reg['data']);
            return $reg;
        }, $registrations);

        return $registrations;
    }
}
