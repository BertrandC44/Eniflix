<?php

namespace App\Helper;

use App\Entity\Serie;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploader
{
public function __construct(private SluggerInterface $slugger){}

public function upload(UploadedFile $file, string $name, string $dir): string{
    $name = $this->slugger->slug($name->getName()) . '-'. uniqid() . '.' . $file->guessExtension();
    $file->move($dir, $name);
    return $name;
}
}