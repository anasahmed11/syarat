<?php


namespace App\Traits;
use Illuminate\Support\Facades\File;
trait ImageTrait
{
    function upload_image($image, $folder, $prev_image = null)
    {
        $filename = $prev_image;
        File::delete('../' . $filename);
        $photo = $image;
        $ext = $photo->getClientOriginalExtension();
        $fileStore = time() . '.' . $ext;
        $photo->move(public_path($folder), $fileStore);
        $image = 'public' . '/' . $folder . '/' . $fileStore;
        return $image;
    }

    function delete_image($image)
    {
        File::delete('../' . $image);
    }
}
