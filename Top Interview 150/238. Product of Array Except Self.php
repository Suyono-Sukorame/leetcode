class Solution {

function productExceptSelf($nums) {
    $n = count($nums);
    $output = array_fill(0, $n, 1);

    $leftProduct = 1;
    for ($i = 0; $i < $n; $i++) {
        $output[$i] *= $leftProduct;
        $leftProduct *= $nums[$i];
    }

    $rightProduct = 1;
    for ($i = $n - 1; $i >= 0; $i--) {
        $output[$i] *= $rightProduct;
        $rightProduct *= $nums[$i];
    }

    return $output;
}
}

$solution = new Solution();
print_r($solution->productExceptSelf([1,2,3,4])); // Output: [24,12,8,6]
print_r($solution->productExceptSelf([-1,1,0,-3,3])); // Output: [0,0,9,0,0]
