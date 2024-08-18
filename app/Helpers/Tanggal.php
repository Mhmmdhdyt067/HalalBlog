<?php

use Carbon\Carbon;

if (!function_exists('Indo')) {
    /**
     * Mengubah tanggal ke dalam format bahasa Indonesia.
     *
     * @param  string  $tanggal
     * @param  string  $format
     * @return string
     */
    function Indo($tanggal, $format = 'l, j F Y ; h:i a')
    {
        Carbon::setLocale('id');
        return Carbon::parse($tanggal)->translatedFormat($format);
    }
}
