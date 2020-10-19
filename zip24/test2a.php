<?php
/**
 * CLI >=PHP7.3 need!
 * test without unit tests! run:
 * php -d zend.assertions=1 -f test2a.php
 */

const INT_MIN = -2147483648;
const INT_MAX = 2147483647;
/**
 * @return int -- Reverse digits from input number 123->321
 * @param int $num
 * 1. Direct decision (such strrev)
 */
function intRevert1( int $num = -123 ): int
{
    assert($num==-123 );

    $strNum = (string)$num;
    $length = strlen($strNum)-1;
    if( $num<0 ){
        $res = '-';
        $endLoop = 1;
    }else{
        $res = '';
        $endLoop = 0;
    }
    for($i=$length; $i>=$endLoop; $i--){
        $res .= $strNum[$i];
    }
    assert($res === '-321');
    return ($res=intval($res)) > INT_MAX ? 0
        : ($res < INT_MIN ? 0 : $res);
}

/**
 * @return int -- var.2 on math functions
 * @param int $num
 */
function intRevert2( int $num = -12345 ): int
{
    $res = $num<0? '-' : '';
    $num = abs($num);
    while( $num>0 ){
        $res .= (string)($num % 10);
        $num = intdiv($num,10);
    }
    return ($res=intval($res)) > INT_MAX ? 0
        : ($res < INT_MIN ? 0 : $res);
}

// ================ main code for CLI ======================= //
//ini_set('zend.assertions', 1); -- не работает, только при запуске через -d !!!

$number = 0;
fscanf(STDIN, "%d\n", $number);
$number = (int)$number;

assert($number===-123);

if( $number > INT_MIN && $number < INT_MAX ){
    fprintf( STDOUT, "Ответ1: %d\nОтвет2: %d\n",
        intRevert2( $number ), intRevert1( $number )
    );
}else{
    echo "Число выходит за диапазон 32-х битных целых чисел.\n";
}
