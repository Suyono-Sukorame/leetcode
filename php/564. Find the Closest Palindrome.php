class Solution {

/**
 * @param String $n
 * @return String
 */
function nearestPalindromic($n) {
    if ($n === '10' || $n === '11') {
        return '9';
    }
    $number = 0;
    $ten = 1;
    $dp = [];
    $dp[0] = $ten;
    for ($i = 1; $i < 18; $i++) {
        $dp[$i] = $dp[$i - 1] * 10;
    }
    $number = intval($n[0] ?? 0) - 0;
    if (strlen($n) === 1) {
        $number--;
        return strval($number);
    }
    for ($i = 1; $i < strlen($n); $i++) {
        $number = ($number * 10) + (intval($n[$i] ?? 0) - 0);
    }
    for ($i = 0; $i < 19; $i++) {
        if ($dp[$i] === $number) {
            return strval($number - 1);
        }
        if ($dp[$i] === ($number + 1)) {
            return strval($dp[$i] + 1);
        }
    }
    $copyNumber = $number;
    $mid = intval(strlen($n) / 2);
    $copyNumber = intval($number / $dp[$mid]);
    $copyNumber -= 1;
    $takeOffMid = '';
    $firstHalf = strval($copyNumber);
    if (strlen($n) % 2 && strlen($firstHalf) > $mid) {
        $takeOffMid = $firstHalf[strlen($firstHalf) - 1];
        $firstHalf = substr($firstHalf, 0, -1);
    }
    $reversedHalf = $firstHalf;
    $reversedHalf = strrev($reversedHalf);
    $less = $firstHalf . $takeOffMid . $reversedHalf;

    $copyNumber = intval($number / $dp[$mid]);
    $copyNumber += 1;
    if ($copyNumber === 0) {
        return '9';
    }
    $takeOffMid = '';
    $firstHalf = strval($copyNumber);
    if (strlen($n) % 2) {
        $takeOffMid = $firstHalf[strlen($firstHalf) - 1];
        $firstHalf = substr($firstHalf, 0, -1);
    }
    $reversedHalf = $firstHalf;
    $reversedHalf = strrev($reversedHalf);
    $more = $firstHalf . $takeOffMid . $reversedHalf;

    $possibleAns = '';
    if (intval($more) - $number < $number - intval($less)) {
        $possibleAns = $more;
    } else {
        $possibleAns = $less;
    }
    
    if (!$this->isPalindrome($n)) {
        $j = strlen($n) - 1;
        for ($i = 0; $i < $mid; $i++) {
            $n = substr_replace($n, $n[$i], $j, 1);
            $j--;
        }
        $thirdParty = intval($n);
        if (abs(intval($possibleAns) - $number) > abs($number - intval($n))) {
            $possibleAns = $n;
        } else if (abs(intval($possibleAns) - $number) === abs($number - intval($n))) {
            if (intval($n) <= intval($possibleAns)) {
                $possibleAns = $n;
            }
        }
    }
    return $possibleAns;
}

function isPalindrome($n) {
    $j = strlen($n) - 1;
    for ($i = 0; $i < floor(strlen($n) / 2); $i++) {
        if ($n[$i] !== $n[$j]) {
            return false;
        }
        $j--;
    }
    return true;
}
}
