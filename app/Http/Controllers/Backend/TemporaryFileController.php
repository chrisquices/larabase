<?php

namespace App\Http\Controllers\Backend;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class TemporaryFileController extends Controller
{
    public function store(Request $request)
    {
        if ($request->photo) {
            $file = $request->photo;
            $fileName = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('public/photos/tmp/' . $folder, $fileName);

            TemporaryFile::create([
                'folder' => $folder,
                'name'   => $fileName
            ]);

            return $folder;
        }

        return 'uhoh';
    }

}
