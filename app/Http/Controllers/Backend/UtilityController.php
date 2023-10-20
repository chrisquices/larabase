<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function updatePreferredTheme(Request $request)
    {
        $user = auth()->user();
        $user->preferred_theme = $request->theme;
        $user->save();

        return back();
    }
}
