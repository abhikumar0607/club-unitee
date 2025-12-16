<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HandlesFileUpload
{
    public function uploadImage($file, string $folder)
    {
        $path = public_path($folder);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $fileName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();

        $file->move($path, $fileName);

        return $fileName;
    }

    public function deleteImage(?string $fileName, string $folder): void
    {
        if (!$fileName) {
            return;
        }

        $filePath = public_path($folder.'/'.$fileName);

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

}
