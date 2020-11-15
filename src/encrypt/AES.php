<?php


class AES
{

    /**
     * @param $key
     * @param $data
     * @return false|string|string[]
     */
    public static function encode($key, $data)
    {
        $return_en = openssl_encrypt($data, 'AES-256-CBC', $key, 0, mb_substr($key, 0, 16));
        if (!$return_en) {
            return false;
        }
        $return_en = str_replace(['=', '+', '/'], ['ax0XAx0Xa', 'axAXAxzXa', 'axAXaxAXa'], $return_en);
        return $return_en;
    }

    /**
     * @param $key
     * @param $data
     * @return string
     */
    public static function decode($key, $data)
    {
        $data      = str_replace(['ax0XAx0Xa', 'axAXAxzXa', 'axAXaxAXa'], ['=', '+', '/'], $data);
        $return_en = openssl_decrypt($data, 'AES-256-CBC', $key, 0, mb_substr($key, 0, 16));
        if (!$return_en) {
            return false;
        }

        return $return_en;
    }
}