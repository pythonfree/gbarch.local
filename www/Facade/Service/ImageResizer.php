<?php

declare(strict_types=1);

namespace Facade\Service;

class ImageResizer
{

    /**
     * @param string $file
     * @param int $width
     * @param int $height
     */
    public function resize(string $file, int $width, int $height): void
    {
        echo "Обрезаем изображение $file в размер $width x $height\n";
    }

}