class Solution {

/**
 * @param Integer $num
 * @return Integer[]
 */
function closestDivisors($num) {
    $a = $this->findDivisors($num + 1);
    $b = $this->findDivisors($num + 2);
    
    if ($this->getDifference($a) < $this->getDifference($b)) {
        return $a;
    } else {
        return $b;
    }
}

function findDivisors($num) {
    $sqrt = sqrt($num);
    for ($i = (int)$sqrt; $i >= 1; $i--) {
        if ($num % $i == 0) {
            return [$i, $num / $i];
        }
    }
    return [1, $num];
}

function getDifference($pair) {
    return abs($pair[0] - $pair[1]);
}
}
