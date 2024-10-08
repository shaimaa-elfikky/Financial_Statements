<?php

namespace App\Http;


class Helpers
{

    public static function arabicCharacters($text)

    {

            $text = str_replace(['ى', 'ي'], 'ي', $text);

            $text = str_replace(['ة', 'ه'], 'ه', $text);

            $text = str_replace(['ا', 'أ'], 'أ', $text);

            $text = str_replace(['إ'], 'ا', $text);

            return $text ;


    }
}
