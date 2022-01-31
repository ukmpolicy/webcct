<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $data["events"] = Event::all();
        return view("admin.page.event.index", $data);
    }

    public function create() {
        return view("admin.page.event.create");
    }

    public function edit($id) {
        $data["event"] = Event::find($id);
        return view("admin.page.event.edit", $data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            "name" => "required",
            "price" => "requied",
            "start" => "requied",
            "limit" => "requied",
        ]);

        $event = new Event();
        $event->name = trim(strtolower($request->name));
        $event->price = trim(strtolower($request->price));
        $event->start = trim(strtolower($request->start));
        $event->limit = trim(strtolower($request->limit));
        $event->save();

        return redirect()->route("event")->with("success", "Event berhasil ditambahkan");
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            "name" => "required",
            "price" => "requied|numeric",
            "start" => "requied",
            "limit" => "requied|numeric",
        ]);

        $event = Event::find($id);

        if ($event) {
            $event->name = trim(strtolower($request->name));
            $event->price = $request->price;
            $event->start = $request->start;
            $event->limit = $request->limit;
            $event->save();

            return redirect()->route("event")->with("success", "Perubahan berhasil di simpan");
        }
        return redirect()->route("event")->with("failed", "Perubahan gagal di simpan");
    }

    public function destroy($id) {
        $event = Event::find($id);

        if ($event) {
            $event->delete();
         
            return redirect()->route("event")->with("success", "Event berhasil di hapus");
        }
        return redirect()->route("event")->with("failed", "Event gagal di hapus");
    }
}
