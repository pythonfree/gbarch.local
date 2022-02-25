<?php

namespace Facade\Service;

/**
 * Class CdnUpload Класс для загрузки на CDN
 */
class CdnUploader
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * CdnUpload constructor.
     * @param string $apiKey
     */
    public function __constructor(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $path
     */
    public function upload(string $path): void
    {
        echo "Загрузка изображения $path на CDN используя ключ $this->apiKey\n";
    }

}