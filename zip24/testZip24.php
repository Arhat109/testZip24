<?php

/**
 * As class for unit testing..
 */
class TestZip24
{
    const INT_MIN = -2147483648;
    const INT_MAX = 2147483647;

    /**
     * @param int $num
     * 1. Direct decision (such strrev)
     * @return int -- Reverse digits from input number 123->321
     */
    public static function intRevert1(int $num = -123): int
    {
        $strNum = (string)$num;
        $length = strlen($strNum) - 1;
        if ($num < 0) {
            $res = '-';
            $endLoop = 1;
        } else {
            $res = '';
            $endLoop = 0;
        }
        for ($i = $length; $i >= $endLoop; $i--) {
            $res .= $strNum[$i];
        }

        return ($res = intval($res)) > self::INT_MAX ? 0
            : ($res < self::INT_MIN ? 0 : $res);
    }

    /**
     * @param int $num
     * @return int -- var.2 on math functions
     */
    public static function intRevert2(int $num = -12345): int
    {
        $res = $num < 0 ? '-' : '';
        $num = abs($num);
        while ($num > 0) {
            $res .= (string)($num % 10);
            $num = intdiv($num, 10);
        }
        return ($res = intval($res)) > self::INT_MAX ? 0
            : ($res < self::INT_MIN ? 0 : $res);
    }

    // ================ main code for CLI ======================= //

    public static function runTest()
    {
        $number = 0;
        fscanf(STDIN, "%d\n", $number);
        $number = (int)$number;

        if ($number > self::INT_MIN && $number < self::INT_MAX) {
            fprintf(STDOUT, "Ответ1: %d\nОтвет2: %d\n",
                intRevert2($number), intRevert1($number)
            );
        } else {
            echo "Число выходит за диапазон 32-х битных целых чисел.\n";
        }
    }
}
