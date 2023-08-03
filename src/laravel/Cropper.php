<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Cropper
{
    /**
     * Realiza o corte da imagem de acordo com parametro
     * @param string $pathImage
     * @param int $width
     * @param int $height
     * @return string|null
     */
    public static function thumb(string $pathImage, int $width, int $height): ?string
    {
        $cropper = new \CoffeeCode\Cropper\Cropper(public_path("storage/cache/image/logo"));
        if (Storage::exists($pathImage)) {
            $img = $cropper->make(storage_path("app/public/" . $pathImage), $width, $height);
            return Storage::url('cache/image/logo' . substr($img, strripos($img, "/")));
        }
        return null;
    }

    /**
     * Remove as imagens em cache
     * @param string $pathImage
     * @return void
     */
    public static function flush(string $pathImage): void
    {
        $cropper = new \CoffeeCode\Cropper\Cropper(public_path("storage/cache/image/logo"));
        $cropper->flush(storage_path("app/public/" . $pathImage));
    }
}
