<?php
/**
 * Created by PhpStorm.
 * User: ghost
 * Date: 6/1/19
 * Time: 10:46 PM
 */

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use File;

class UploaderService
{
    /**
     * creatOurFolderPath , it's function just to create custom global folder like our need
     *
     * @param  string $folder
     * @return string
     */
    public function creatOurFolderPath($folder)
    {

        $path =  base_path().'/uploads/'.$folder.'/';

        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }

        return ['path' => $path];
    }
    public function upload(UploadedFile $file, $folder)
    {
        $ourPath = $this->creatOurFolderPath($folder);

        $file_name = time().rand().'.'.$file->getClientOriginalExtension();

        if ($file->move($ourPath['path'], $file_name)) {
            return 'uploads'.$folder.'/'.$file_name;
        }
    }
}
