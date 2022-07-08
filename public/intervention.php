<?php

require_once '../vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;


$img = Image::make('loradanc.jpg');

$img->resize(200, null, function (\Intervention\Image\Constraint $constraint) {
    $constraint->aspectRatio();
});

$img->text('Lora-Danc', $img->getWidth() - 50, $img->getHeight() - 10, function (\Intervention\Image\AbstractFont $font) {
    $font->size(24);
    //$font->file('Verdana.ttf');
    $font->color([2555, 255, 255, 0.3]);
    $font->align('left');
    $font->valign('top');
});

$img->save('test.jpg');

echo $img->response('jpg');