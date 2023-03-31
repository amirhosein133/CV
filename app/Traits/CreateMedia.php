<?php

namespace App\Traits;

use App\Models\Article;
use App\Models\Media;
use App\Models\Project;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

trait CreateMedia
{
    protected function uploadMedia($files, $type, $class)
    {

        if (isset($files)) {
            foreach ($files as $key => $file) {

                $year = Carbon::now()->year;
                switch ($class) {
                    case ($class == Project::class):
                        $mediaUrl = "/upload/Project/{$type}/{$year}/";
                        break;

                    case ($class == Article::class):
                        $mediaUrl = "/upload/Article/{$type}/{$year}/";
                        break;

                }
                $fileName = $file->getClientOriginalName();
                $file = $file->move(public_path($mediaUrl), $fileName);
                $url[$key] = $this->ResizeImage($file->getRealPath(), $mediaUrl, $fileName, "300");
//                $url[$key] = $mediaUrl . $fileName;
            }
            return $url;
        } else {
            return null;
        }
    }

    private function ResizeImage($path, $imagePath, $filename, $size)
    {
        $images['original'] = $imagePath . $filename;
        $images[$size] = $imagePath . "{$size}_" . $filename;
        Image::make($path)->resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path($images[$size]));
        return $images;
    }

    public function CreateMedia($attributes)
    {
        $media = Media::create([
            'url' => $attributes['url'],
            'type' => $attributes['type'],
            'mediable_id' => $attributes['mediable_id'],
            'mediable_type' => $attributes['mediable_type'],

        ]);
        return $media;
    }

    public function FindMedia($model)
    {
        $media = Media::where('mediable_id', $model->id)->where('mediable_type', get_class($model))->get();
        return $media;
    }

    public function destroyMedia($model)
    {
        Media::where('mediable_id', $model->id)->where('mediable_type', get_class($model))->delete();
        return true;
    }
}

