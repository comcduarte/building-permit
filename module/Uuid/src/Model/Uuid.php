<?php
namespace Uuid\Model;

class Uuid
{
    public $value;
    
    public function __construct()
    {
        $this->generate();
    }
    
    public function generate()
    {
        $this->value = sprintf('%04x%04x-%04x-%03x4-%04x-%04x%04x%04x',
            mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 4095),
            bindec(substr_replace(sprintf('%016b', mt_rand(0, 65535)), '01', 6, 2)),
            mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)
        );
    }
}