class Solution {

function candy($ratings) {
    $n = count($ratings);
    $candies = array_fill(0, $n, 1);

    for ($i = 1; $i < $n; $i++) {
        if ($ratings[$i] > $ratings[$i - 1]) {
            $candies[$i] = $candies[$i - 1] + 1;
        }
    }

    for ($i = $n - 2; $i >= 0; $i--) {
        if ($ratings[$i] > $ratings[$i + 1]) {
            $candies[$i] = max($candies[$i], $candies[$i + 1] + 1);
        }
    }

    return array_sum($candies);
}
}

$solution = new Solution();
echo $solution->candy([1,0,2]); // Output: 5
echo $solution->candy([1,2,2]); // Output: 4
