<?php

namespace App\Http\Controllers;

use App\Models\View;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //change mode
    public function changeMode(Request $request)
    {
        View::where('id', 1)->update([
            'mode' => $request->mode
        ]);

        return response()->json(200);
    }
}