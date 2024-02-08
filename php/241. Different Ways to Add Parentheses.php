class Solution {

/**
 * @param String $expression
 * @return Integer[]
 */
function diffWaysToCompute($expression) {
    $results = [];

    for ($i = 0; $i < strlen($expression); $i++) {
        $char = $expression[$i];

        if ($char == '+' || $char == '-' || $char == '*') {
            $leftResults = $this->diffWaysToCompute(substr($expression, 0, $i));
            $rightResults = $this->diffWaysToCompute(substr($expression, $i + 1));

            foreach ($leftResults as $left) {
                foreach ($rightResults as $right) {
                    if ($char == '+') {
                        $results[] = $left + $right;
                    } elseif ($char == '-') {
                        $results[] = $left - $right;
                    } elseif ($char == '*') {
                        $results[] = $left * $right;
                    }
                }
            }
        }
    }

    if (empty($results)) {
        $results[] = intval($expression);
    }

    return $results;
}
}
