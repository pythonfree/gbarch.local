<?php

declare(strict_types=1);

namespace Facade\Service;

class ImageDownloader
{
    /**
     * Class CdnUpload Класс для загрузки на CDN
     * @package Facade\Service
     */

    /**
     * @var string
     */
    private $path;

    /**
     * CdnUpload constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $file
     * @return string
     */
    public function upload(string $file): string
    {
        echo "Загрузка изображения $file в $this->path на сервер\n";
        return $this->path . '/' . $file;
    }


}