<?php

use Intervention\Image\ImageManagerStatic as Image;

require_once '../vendor/autoload.php';

/**
 * Изменяет размер картинки
 */
function imageAction()
{
    $_imagePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'images/';
    $source = $_imagePath . 'loradanc.jpg';
    $result = $_imagePath . 'lora_new.jpg';
    $image = Image::make($source)
        ->resize(null, 500, function ($image) {
            $image->aspectRatio();
        })
        //->rotate(45)
        //->blur(1)
        /*->crop(200, 250)*/
        //->invert()
        //->fit(400, 100)
        ->save($result, 80);

    $image->save($result, 80);
    //echo 'success';

    //self::watermark($image);


    echo $image->response('png');
}

/**
 * Наносит watermark
 */
function watermark(\Intervention\Image\Image $image)
{

    $image->text(
        "Лора-Данс",
        5,
        15,
        function ($font) {
            $font->file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'images/' . 'arial.ttf')->size('24'); //требуется расширение freetype
            $font->color(array(255, 0, 0, 0.5));
            $font->align('left');
            $font->valign('top');
        });
}
