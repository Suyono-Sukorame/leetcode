class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function shortestSubarray($nums, $k) {
    $n = count($nums);
    $output = PHP_INT_MAX;
    $q = new SplQueue();
    $q->enqueue([0, -1]);
    $total = 0;
    
    for ($i = 0; $i < $n; $i++) {
        $total += $nums[$i];
        while (!$q->isEmpty() && $total - $q->bottom()[0] >= $k) {
            [$prefix_sum, $index] = $q->dequeue();
            $output = min($output, $i - $index);
        }
        while (!$q->isEmpty() && $total < $q->top()[0]) {
            $q->pop();
        }
        $q->enqueue([$total, $i]);
    }
    
    return $output == PHP_INT_MAX ? -1 : $output;
}
}
