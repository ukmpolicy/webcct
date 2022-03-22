<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesController extends Controller
{
    public function index() {
        return response()->json([
            "status" => 200,
            "message" => "Success",
            "data" => [
                "title" => "Example Article",
                "content" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti corrupti quos, sapiente odit adipisci ipsam, itaque alias reprehenderit sit nemo dolore corporis rem harum quae quis excepturi incidunt atque. Odit, illo quibusdam magni accusantium, saepe temporibus, provident ad culpa praesentium ut quidem sapiente omnis inventore in odio facilis? Error odio reiciendis excepturi voluptate quasi, eaque iusto omnis quos optio molestiae totam modi, eos non, nostrum minus quis veniam. Deleniti voluptatum facilis quos exercitationem eos voluptatibus consequuntur totam velit alias tempora."
            ]
        ]);
    }
}
