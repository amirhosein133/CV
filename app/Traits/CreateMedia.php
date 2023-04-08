<?php

namespace App\Traits;

use App\Models\Article;
use App\Models\Media;
use App\Models\Product;
use App\Models\Project;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

trait CreateMedia
{
    protected function uploadMedia($files, $type, $class)
    {
        if (isset($files)) {
            $url = null;
            foreach ($files as $key => $file) {
                $year = Carbon::now()->year;
                switch ($class) {
                    case ($class == Project::class):
                        $mediaUrl = "/upload/Project/{$type}/{$year}/";
                        break;

                    case ($class == Article::class):
                        $mediaUrl = "/upload/Article/{$type}/{$year}/";
                        break;

                    case ($class == Product::class):
                        $mediaUrl = "/upload/Product/{$type}/{$year}/";
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

    public function FindMedia($model, $type = null)
    {
        if ($type == null)
            $media = Media::where('mediable_id', $model->id)->where('mediable_type', get_class($model))->get();
        else
            $media = Media::where('mediable_id', $model->id)->where('mediable_type', get_class($model))->where('type', $type)->get();

        return $media;
    }

    public function destroyMedia($model, $id = null)
    {
        if ($id == null)
            Media::where('mediable_id', $model->id)->where('mediable_type', get_class($model))->delete();
        else
            Media::where('mediable_id', $model->id)->where('mediable_type', get_class($model))->where('id', $id)->delete();

        return true;
    }

    public function uploadVideoservice($file, $type, $class)
    {
        if (isset($file)) {
            $year = Carbon::now()->year;
            switch ($class) {
                case ($class == Project::class):
                    $mediaUrl = "/upload/Project/{$type}/{$year}/";
                    break;

                case ($class == Article::class):
                    $mediaUrl = "/upload/Article/{$type}/{$year}/";
                    break;

                case ($class == Product::class):
                    $mediaUrl = "/upload/Product/{$type}/{$year}/";
                    break;

            }
            $fileName = $file->getClientOriginalName();
            $file = $file->move(public_path($mediaUrl), $fileName);
            $url = $mediaUrl . $fileName;
            return $url;
        } else return null;
    }
}

