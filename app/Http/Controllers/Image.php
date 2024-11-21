<?php

namespace App\Http\Controllers;

use App\Models\Subido;
use Illuminate\Http\Request;

class Image extends Controller
{

    public function index($id)
    {
        $subido = Subido::find($id);
        if (file_exists(storage_path("app/private" . "/" . $subido->path))) {
            return response()->file(storage_path("app/private" . "/" . $subido->path));
        }else {
            abort(404);
        }
    }
}
