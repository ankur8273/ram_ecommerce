<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{
    public static function slug($digit = 16)
    {
        $slug = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $digit);
        return $slug;
    }

    public static function mroNumber($digit = 5)
    {
        $mroNumber = substr(str_shuffle('0123456789'), 0, $digit);
        return $mroNumber;
    }

    public static function getCurlData($method, $url, $data = null, $headers = [])
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_USERAGENT, 'My New Shopify App v.1');
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            return 'Error:' . curl_error($curl);
        }
        curl_close($curl);
        return $response;
    }

    public static function isJSON($string)
    {
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }

    public static function randomPassword()
    {
        $randomCharLen = 2;

        $lowerCase = "abcdefghijklmnopqrstuvwxyz";
        $upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numbers = "1234567890";
        $symbols = "!@#$%&*";

        $lowerCase = str_shuffle($lowerCase);
        $upperCase = str_shuffle($upperCase);
        $numbers = str_shuffle($numbers);
        $symbols = str_shuffle($symbols);

        $randomPassword = substr($lowerCase, 0, $randomCharLen);
        $randomPassword .= substr($upperCase, 0, $randomCharLen);
        $randomPassword .= substr($numbers, 0, $randomCharLen);
        $randomPassword .= substr($symbols, 0, $randomCharLen);

        return str_shuffle($randomPassword);
    }

    public static function dateFormat($dateTimeString)
    {
        $dateTime = Carbon::parse($dateTimeString);
        $formattedDate = $dateTime->format('d-m-Y');
        return $formattedDate;
    }

    public static function dateTimeFormat($dateTimeString)
    {
        $dateTime = Carbon::parse($dateTimeString);
        $formattedDate = $dateTime->format('Y-m-d h:i:s');
        return $formattedDate;
    }
}
