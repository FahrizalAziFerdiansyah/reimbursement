<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public function store($file, $path)
    {
        $original_extension_name = $file->getClientOriginalExtension();
        $fileName = self::generateName() . "." . $original_extension_name;
        $file->storeAs('public/' . $path, $fileName);
        $image = 'storage/' . $path . "/" . $fileName;

        return $image;
    }

    public function delete($path)
    {
        $path = str_replace('storage/', '', $path);
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    function generateName()
    {
        $now = Carbon::now()->format("dmY-His");
        $random = uniqid();
        return $random . "_" . $now;
    }
}
