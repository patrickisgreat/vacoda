<?php

namespace App;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Log;
use Image;

class AddImageToBanner
{
    /**
     * The banner instance.
     *
     * @var Banner
     */
    protected $banner;

    /**
     * The UploadedFile instance.
     *
     * @var UploadedFile
     */
    protected $file;

    /**
     * Create a new AddImageToBanner form object.
     *
     * @param Banner $banner
     * @param UploadedFile $file
     */
    public function __construct(Banner $banner, UploadedFile $file)
    {
        $this->banner = $banner;
        $this->file = $file;
    }

    /**
     * Process the image.
     *
     * @return bool
     */
    public function save()
    {
        $newImage = $this->makeBannerImage();
        $image = $this->banner->banner_image()->save($newImage);

        $width = $this->banner->template->width_desktop;
        Log::info('--------');
        Log::info('Image Banner Template Width');
        Log::info($width);
        Log::info('--------');

        $processedImage = Image::make($this->file)
            ->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save($image->path);

        return $processedImage ? true : false;
    }

    /**
     * Make a BannerImage instance.
     *
     * @return BannerImage
     */
    protected function makeBannerImage()
    {
        $oldFile = $this->banner->banner_image()->first();

        if ($oldFile) {
            $oldFile->delete();
        }

        return new BannerImage(['name' => $this->fileName()]);
    }

    /**
     * Make a filename, based on the uploaded file.
     *
     * @return string
     */
    public function fileName()
    {
        $name = sha1(
            time() . $this->file->getClientOriginalName()
        );

        $name = substr($name, 0, 10);
        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
    }

}