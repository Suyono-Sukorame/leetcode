class Solution {

function maxProfit($prices) {
    $minPrice = PHP_INT_MAX;
    $maxProfit = 0;

    foreach ($prices as $price) {
        $minPrice = min($minPrice, $price);
        $maxProfit = max($maxProfit, $price - $minPrice);
    }

    return $maxProfit;
}
}

$solution = new Solution();
echo $solution->maxProfit([7,1,5,3,6,4]); // Output: 5
echo $solution->maxProfit([7,6,4,3,1]); // Output: 0
