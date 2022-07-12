<?php

declare(strict_types=1);

namespace Facade\Service;

class ImageDownloader
{
    /**
     * @var string
     */
    private $path;

    /**
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