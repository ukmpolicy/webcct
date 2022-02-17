<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    private $default = [
        "competition_opening_registration",
        "competition_closing_registration",
        "competition_status_registration",
        "terms_competition",
        "terms_talkshow",
        "talkshow_opening_registration",
        "talkshow_closing_registration",
        "talkshow_status_registration",
    ];

    public function index() {
        $data['settings'] = $this->getData();

        return view('admin.pages.setting.index', $data);
    }

    private function getData() {
        $data = [];
        foreach ($this->default as $k) {
            $s = Setting::where('key', $k)->first();
            if (!$s) {
                $s = new Setting();
                $s->key = strtolower($k);
                $s->value = '';
                $s->save();
            }
            $data[$k] = $s->value;
        }
        return $data;
    }

    public function save(Request $request) {
        $data = $request->only($this->default);
        foreach ($data as $k => $v) {
            if (trim($v) != '' && !is_null($v)) {
                $s = Setting::where('key', $k)->first();
                if (!$s) {
                    $s = new Setting();
                    $s->key = strtolower($k);
                }
                $s->value = $v;
                $s->save();
            }
        }
        // dd(Setting::all()->toArray());
        return redirect()->route('setting')->with('success', 'Perubahan berhasil disimpan');
    }
}
