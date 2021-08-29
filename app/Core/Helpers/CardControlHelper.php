<?php

namespace App\Core\Helpers;

class CardControlHelper
{
    public static $lowerBound = 1;
    public static $upperBound = 75;
    private static $card = [
        [
            "column" => "B",
            "lower_limit" => 1,
            "upper_limit" => 15,
            "numbers_take" => 5,
            "values" => [],
        ],
        [
            "column" => "I",
            "lower_limit" => 16,
            "upper_limit" => 30,
            "numbers_take" => 5,
            "values" => [],
        ],
        [
            "column" => "N",
            "lower_limit" => 31,
            "upper_limit" => 45,
            "numbers_take" => 4,
            "values" => [],
        ],
        [
            "column" => "G",
            "lower_limit" => 46,
            "upper_limit" => 60,
            "numbers_take" => 5,
            "values" => [],
        ],
        [
            "column" => "O",
            "lower_limit" => 61,
            "upper_limit" => 75,
            "numbers_take" => 5,
            "values" => [],
        ],
    ];

    public static function generateNumbers($lower_limit, $upper_limit, $numbers_take)
    {
        $rand = range($lower_limit, $upper_limit);

        shuffle($rand);

        $rand = array_slice($rand, 0, $numbers_take);

        return $rand;
    }

    public static function allNumbers()
    {
        return static::generateNumbers(static::$lowerBound, static::$upperBound, static::$upperBound);
    }

    public static function generateCard()
    {
        $response = static::$card;
        $position = 0;

        foreach (static::$card as $value) {
            $response[$position]['values'] = static::generateNumbers($value['lower_limit'], $value['upper_limit'], $value['numbers_take']);

            $position++;
        }

        return $response;
    }

    public static function getNumber($arr)
    {
        $pos = range(0, count($arr) - 1);

        shuffle($pos);

        $number_obtained = $arr[$pos[0]];

        unset($arr[$pos[0]]);

        $newArray = array_values($arr);

        return [
            'numbers_left' => $newArray,
            'number_obtained' => $number_obtained,
        ];
    }

    public static function validateWinner($numbers_left, $numbers)
    {
        $result = array_diff($numbers, $numbers_left);

        return count($result) == 24 ? true : false;
    }

}
