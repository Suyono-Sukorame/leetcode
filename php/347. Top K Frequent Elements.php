class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer[]
 */
function topKFrequent($nums, $k) {
    $frequencyMap = [];
    
    foreach ($nums as $num) {
        if (!isset($frequencyMap[$num])) {
            $frequencyMap[$num] = 0;
        }
        $frequencyMap[$num]++;
    }
    
    $heap = new SplMinHeap();
    foreach ($frequencyMap as $num => $freq) {
        $heap->insert([$freq, $num]);
        if ($heap->count() > $k) {
            $heap->extract();
        }
    }
    
    $result = [];
    while ($heap->count() > 0) {
        $result[] = $heap->extract()[1];
    }
    return array_reverse($result);
}
}

$solution = new Solution();
$nums = [1, 1, 1, 2, 2, 3];
$k = 2;
print_r($solution->topKFrequent($nums, $k)); // Output: [1, 2]
