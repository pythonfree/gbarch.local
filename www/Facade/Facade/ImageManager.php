<?php

namespace Facade\Facade;


use Facade\Service\CdnUploader;
use Facade\Service\ImageDownloader;
use Facade\Service\ImageResizer;

/**
 * Class ImageManager Сам Фасад, он объединяет классы для работы над
 * изображением в данном случае. Загрузкой, ибрезкой и загрузкой на CDN
 * Методы Фасада легко могут быть и статические, так тоже делают.
 * @package Facade\Facade
 */
class ImageManager
{
    /**
     * @var CdnUploader
     */
    private $cdnUploader;

    /**
     * @var ImageDownloader
     */
    private $downloader;

    /**
     * @var ImageResizer
     */
    private $resizer;

    /**
     * ImageManager constructor
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->downloader = new ImageDownloader($path);
        $this->resizer = new ImageResizer();
        $this->cdnUploader = new CdnUploader('key');
    }

    public function downloadImage(string $path)
    {
        //Загружаем картинку
        $path = $this->downloader->upload($path);
        //Обрезаем картинку
        $this->resizer->resize($path, 100, 100);
        //Загружаем на CDN
        $this->cdnUploader->upload($path);
    }

}