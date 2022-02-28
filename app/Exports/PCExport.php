<?php

namespace App\Exports;

use App\Http\Controllers\CompetitionRegistrationController;
use App\Models\CompetitionRegistration;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromArray;

class PCExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public Request $request;
    public $status = ['checking', 'deaccept', 'accepted'];

    public function __construct(Request $request) {
        $this->request = $request;
    }


    public function array() : array
    {

        $fields = ['created_at', 'name', 'email', 'phone', 'birthdate', 'region', 'city', 'address', 'education', 'competitions', 'price', 'status'];

        $registrations = CompetitionRegistration::select('created_at', 'name', 'email', 'phone', 'birthdate', 'region', 'city', 'address', 'education', 'competitions', 'price', 'status');
        
        $registrations = array_map(function($v) {
            $v['status'] = $this->status[$v['status']];
            $competitions = '';
            foreach (json_decode($v['competitions']) as $e) {
                $competitions .= CompetitionRegistrationController::$events[$e]['name'] . ', ';
            }
            $v['competitions'] = substr($competitions, 0, -2);
            return $v;
        },$registrations->get()->toArray());

        $registrations = array_merge([$fields], $registrations);
        return $registrations;
    }
}
