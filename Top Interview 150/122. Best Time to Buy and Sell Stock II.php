class Solution {

function maxProfit($prices) {
    $maxProfit = 0;

    for ($i = 1; $i < count($prices); $i++) {
        $maxProfit += max(0, $prices[$i] - $prices[$i - 1]);
    }

    return $maxProfit;
}
}

$solution = new Solution();
echo $solution->maxProfit([7,1,5,3,6,4]); // Output: 7
echo $solution->maxProfit([1,2,3,4,5]); // Output: 4
echo $solution->maxProfit([7,6,4,3,1]); // Output: 0
