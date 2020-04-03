<?php


class Formatter
{

    public function __construct()
    {
    }

    static function formatHTMLText($entities, $message, $offset_msg = 0)
    {
        $counter = 0;
        $counter -= $offset_msg;
        foreach ($entities as $value) {
            if ($value['type'] == 'italic') {
                $offset = $value['offset'];
                $length = $value['length'];
                if ($offset != 0) {
                    //$offset--;
                } else {
                    $length--;
                }
                $offset = $offset + $counter;
                $p2 = '<i>'; //символ
                $p3 = '</i>'; //символ
                $message = self::mb_substrr($message,0,$offset).$p2.self::mb_substrr($message,$offset,$length).$p3.self::mb_substrr($message,($offset + $length));

                $counter = $counter + 7;
            }
            if ($value['type'] == 'bold') {
                $offset = $value['offset'];
                $length = $value['length'];
                if ($offset != 0) {
                    //$offset--;
                }
                $offset = $offset + $counter;
                $p2 = '<b>'; //символ
                $p3 = '</b>'; //символ
                $message = self::mb_substrr($message,0,$offset).$p2.self::mb_substrr($message,$offset,$length).$p3.self::mb_substrr($message,($offset + $length));

                $counter = $counter + 7;
            }
            if ($value['type'] == 'text_link') {
                $offset = $value['offset'];
                $length = $value['length'];
                $url = $value['url'];
                if ($offset != 0) {
                    //$offset--;
                }
                $offset = $offset + $counter;
                $p2 = '<a href="'; //символ
                $p3 = '">'; //символ
                $p4 = '</a>'; //символ
                $del = self::mb_substrr($message, $offset, $length);
                $link = $p2 . $url . $p3 . $del . $p4;
                $message = self::mb_substrr($message, 0, $offset).$link.self::mb_substrr($message, ($offset + $length));

                $link_c = mb_strlen($link,'UTF-8');
                $del_c = mb_strlen($del,'UTF-8');

                $sum = $link_c - $del_c;

                //$counter2 = $counter2 + $length;
                $counter = $counter + $sum;
            }
        }
        return $message;
    }

    private static function mb_strlen($text)
    {
        $length = 0;
        $textlength = strlen($text);
        for ($x = 0; $x < $textlength; $x++) {
            $char = ord($text[$x]);
            if (($char & 0xC0) != 0x80) {
                $length += 1 + ($char >= 0xf0);
            }
        }

        return $length;
    }

    private static function mb_substrr($text, $offset, $length = null)
    {
        $mb_text_length = self::mb_strlen($text);
        if ($offset < 0) {
            $offset = $mb_text_length + $offset;
        }
        if ($length < 0) {
            $length = ($mb_text_length - $offset) + $length;
        } elseif ($length === null) {
            $length = $mb_text_length - $offset;
        }
        $new_text = '';
        $current_offset = 0;
        $current_length = 0;
        $text_length = strlen($text);
        for ($x = 0; $x < $text_length; $x++) {
            $char = ord($text[$x]);
            if (($char & 0xC0) != 0x80) {
                $current_offset += 1 + ($char >= 0xf0);
                if ($current_offset > $offset) {
                    $current_length += 1 + ($char >= 0xf0);
                }
            }
            if ($current_offset > $offset) {
                if ($current_length <= $length) {
                    $new_text .= $text[$x];
                }
            }
        }

        return $new_text;
    }
}