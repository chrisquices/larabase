<?php

use App\Models\TemporaryFile;

function storeMedia($mediaCollection, $model, $fileName)
{
    $temporaryFile = TemporaryFile::where('folder', $fileName)->first();

    if ($temporaryFile) {
        $model->addMedia(storage_path("app/public/photos/tmp/$fileName/$temporaryFile->name"))->toMediaCollection($mediaCollection);

        rmdir(storage_path("app/public/photos/tmp/$fileName"));

        $temporaryFile->delete();
    }
}
