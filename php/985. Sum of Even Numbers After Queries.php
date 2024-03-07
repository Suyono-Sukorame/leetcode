class Solution {

/**
 * @param Integer[] $nums
 * @param Integer[][] $queries
 * @return Integer[]
 */
function sumEvenAfterQueries($nums, $queries) {
    $result = [];
    $sumEven = 0;

    foreach ($nums as $num) {
        if ($num % 2 == 0) {
            $sumEven += $num;
        }
    }

    foreach ($queries as $query) {
        $val = $query[0];
        $index = $query[1];

        if ($nums[$index] % 2 == 0) {
            $sumEven -= $nums[$index];
        }

        $nums[$index] += $val;

        if ($nums[$index] % 2 == 0) {
            $sumEven += $nums[$index];
        }

        $result[] = $sumEven;
    }

    return $result;
}
}
