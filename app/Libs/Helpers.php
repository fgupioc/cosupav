<?php

use Illuminate\Support\Facades\Storage;

/**
 * @param $path
 * @param null $content
 * @return string
 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
 */
function storageFile($path, $content = null)
{
    if ($content) Storage::disk('logos')->put($path, $content);
    else return Storage::disk('logos')->get($path);
}

function storageDeleteFile($path) {
    if (Storage::disk('logos')->exists($path)) {
        Storage::disk('logos')->delete($path);
    }
}
