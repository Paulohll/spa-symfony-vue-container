<?php
namespace App\Helpers;

use Illuminate\Http\Request;

class RequestHelper {

    /**
     * Replace params value of request if exists in the request
     * @param  Illuminate\Http\Request $request
     * @param [] $newParams
     */
    public static function replaceIfExits (Request $request, array $newParams) {
        $replaces = [];
        foreach($request->all() as $key => $value){
            if (array_key_exists($key, $newParams)){
                $replaces[$key] = $newParams[$key];
            }
        }
        if (!empty($replaces)) {
            $request->merge($replaces);
        }
        return $request;
    }

    public static function sanitizeNumber($number) {
        return filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    }

    public static function sanitizeDecimal($decimal) {
        return filter_var($decimal, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    public static function sanitizeString($string) {
        $string = strip_tags($string);
        return filter_var($string, FILTER_SANITIZE_STRING);
    }

    public static function sanitizeHtml($html) {
        $allowedTags = "<a><strong><em><hr><br><p><u><ul><ol><li><dl><dt><dd><table><thead><tr><th><tbody><td><tfoot>";
        $html = strip_tags($html, $allowedTags);
        return filter_var($html, FILTER_SANITIZE_STRING);
    }

    public static function sanitizeUrl($url) {
        return filter_var($url, FILTER_SANITIZE_URL);
    }

    public static function sanitizeSlug($string) {
        $string = str_slug($string);
        return filter_var($string, FILTER_SANITIZE_URL);
    }

    public static function sanitizeEmail($string) {
        return filter_var($string, FILTER_SANITIZE_EMAIL);
    }
}
