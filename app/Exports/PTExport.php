<?php

namespace App\Exports;

use App\Models\TalkshowRegistration;
use Maatwebsite\Excel\Concerns\FromArray;

class PTExport implements FromArray
{

    public function array() : array
    {   
        $fields = ['created_at', 'name', 'phone', 'email', 'city', 'region', 'address', 'birthdate', 'profession', 'institution'];
        $registrations = TalkshowRegistration::select('created_at', 'name', 'phone', 'email', 'data')->get()->toArray();
        $registrations = array_map(function($reg) {
            $data = json_decode($reg['data'], true);
            $reg = array_merge($reg, $data);
            unset($reg['data']);
            return $reg;
        }, $registrations);

        return array_merge([$fields], $registrations);
    }
}
