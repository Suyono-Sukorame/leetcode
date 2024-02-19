class Solution {

/**
 * @param Integer[] $cards
 * @return Boolean
 */
function judgePoint24($cards) {
    $EPSILON = 1e-6;
    $n = count($cards);
    if ($n == 1) {
        return abs($cards[0] - 24) < $EPSILON;
    }
    
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($i != $j) {
                $next = [];
                for ($k = 0; $k < $n; $k++) {
                    if ($k != $i && $k != $j) {
                        $next[] = $cards[$k];
                    }
                }

                foreach (['+', '-', '*', '/'] as $op) {
                    if (($op == '+' || $op == '*') && $i > $j) {
                        continue;
                    }
                    if ($op == '/' && abs($cards[$j]) < $EPSILON) {
                        continue;
                    }

                    switch ($op) {
                        case '+':
                            $next[] = $cards[$i] + $cards[$j];
                            break;
                        case '-':
                            $next[] = $cards[$i] - $cards[$j];
                            break;
                        case '*':
                            $next[] = $cards[$i] * $cards[$j];
                            break;
                        case '/':
                            $next[] = $cards[$i] / $cards[$j];
                            break;
                    }

                    if ($this->judgePoint24($next)) {
                        return true;
                    }

                    array_pop($next);
                }
            }
        }
    }

    return false;
}
}
