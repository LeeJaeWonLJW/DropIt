<?php

/**
 * Created by PhpStorm.
 * User: Geonu Ahn
 * Date: 2017-10-11
 * Time: 오후 11:50
 */
class Random
{

    public function random_passcode()
    {
        return mt_rand(1000, 9999);
    }

    public function random_uuid()
    {
        return sprintf('%04x%04x%04x%04x%04x%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}