<?php

namespace App\Exports;

use Faker\Factory;
use Maatwebsite\Excel\Concerns\FromArray;

class DataPeserta implements FromArray
{
    public function array() : array
    {
        $faker = Factory::create('id_ID');
        $data = [];
        for($i = 1; $i <= 463; $i++){
 
            $time = $faker->dateTimeBetween('-40 days', '-13 days');
            $birthdate = $faker->dateTimeBetween('-42 years', '-22 years');
            $uname = $this->getName($faker->name);
            $umur = (int) date('Y', $birthdate->getTimestamp()) - 1970;
            // dd((int)date('Y', $birthdate->getTimestamp()) - 1970);
            $birthdate = date('d-m-Y', $birthdate->getTimestamp());
            $arr = explode('.', $uname);
            $name = join(' ', $arr);
            $email = $this->makeEmail($uname, rand(0,4));
            $address = $faker->address;
            // dd($address);
            $address = explode(',', $faker->address);
            $phone = $this->optimizePhone($faker->phoneNumber);
            $profesi = $this->getProfesi($uname, $umur);

            $data[] = [
                date('d-m-Y H:i:s', $time->getTimestamp()),
                $name,
                $email,
                $phone,
                $profesi,
                $birthdate,
                trim(end($address)),
                $this->getKota($address[1]),
                $this->getAlamat($address[0]),
            ];
        }
        $fields = [
            'Terdaftar Pada',
            'nama',
            'email',
            'phone',
            "Profesi",
            "Tanggal Lahir",
            "Provinsi",
            "Kota",
            "Alamat",
        ];
        $a = [$fields, ...$data];
        // dd($a);
        return $a;
    }

    private function getAlamat($alamat) {
        $arr = explode(' ', $alamat);
        unset($arr[0]);
        $arr2 = array_values($arr);
        unset($arr2[count($arr2)-1]);
        $arr3 = array_values($arr2);
        unset($arr3[count($arr3)-1]);
        return join(' ', $arr3);
    }

    private function getKota($str) {
        $arr = explode(' ', trim($str));
        unset($arr[count($arr)-1]);
        return join(' ', $arr);
    }

    private function getProfesi($name, $umur) {
        $arr = explode(' ', $name);
        if ($umur > rand(17,18)) {
            return ['Mahasiswa', 'Umum'][rand(0,1)];
        }
        return 'Siswa';
    }

    private function getName($uname) {
        $arr = explode(' ', $uname);
        $arr2 = array_splice($arr, 0, rand(2,3));
        return join(' ', $arr2);
    }

    private function optimizePhone($number) {
        $arr = explode(' ', $number);
        $str = '';
        if ($arr[0] == '(+62)') {
            unset($arr[0]);
        }
        $prov = [52,53,22,13,95,23];
        $str = '08'.$prov[rand(0,count($prov)-1)].substr(join($arr),0,-3);
        return $str;
    }

    private function makeEmail($uname, $type) {
        $uname = strtolower($uname);
        $uname = trim($uname);
        $arr = explode(' ', $uname);
        $name = '';
        switch ($type) {
            case 0:
                $name = $arr[0].rand(10,1111);
                break;
            case 1:
                if (isset($arr[1])) {
                    $name = $arr[0].$arr[1].rand(10,1111);
                    break;
                }
            case 2:
                if (isset($arr[1])) {
                    $name = $arr[1].rand(10,1111);
                    break;
                }
            case 3:
                if (isset($arr[1])) {
                    $name = $arr[0].$arr[1];
                    break;
                }
            case 4:
                $name = join('', $arr);
                break;
        }
        return $name.'@gmail.com';
    }
}
