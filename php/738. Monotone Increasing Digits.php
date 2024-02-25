class Solution {

function monotoneIncreasingDigits($n) {
    $temp = $n;
    $rem = $n % 10;
    $n = intval($n / 10);
    $count = 1;
    $power = 0;
    $flag = false;
    
    while ($n > 0) {
        $rem1 = $n % 10;
        $n = intval($n / 10);
        
        if ($rem1 > $rem) {
            $power = $count;
            $flag = true;
        } else if ($rem1 == $rem && $flag) {
            $power = $count;
        } else if ($rem1 < $rem) {
            $flag = false;
        }
        $count++;
        $rem = $rem1;
    }
    
    $temp = intval($temp / pow(10, $power));
    if ($power > 0) {
        $temp--;
    }
    while ($power-- > 0) {
        $temp = $temp * 10 + 9;
    }
    return $temp;
}
}
