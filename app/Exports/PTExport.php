<?php

namespace App\Exports;

use App\Models\TalkshowRegistration;
use Maatwebsite\Excel\Concerns\FromArray;

class PTExport implements FromArray
{

    public function array() : array
    {   
        $fields = ['created_at', 'serial_number', 'name', 'phone', 'email', 'city', 'region', 'address', 'birthdate', 'profession', 'institution'];
        $registrations = TalkshowRegistration::select('created_at', 'serial_number', 'name', 'phone', 'email', 'data')->get()->toArray();
        $registrations = array_map(function($reg) {
            $reg['created_at'] = date('d-m-Y H:i:s', strtotime($reg['created_at']));
            $data = json_decode($reg['data'], true);
            $reg = array_merge($reg, $data);
            unset($reg['data']);
            return $reg;
        }, $registrations);

        return array_merge([$fields], $registrations);
    }
}
