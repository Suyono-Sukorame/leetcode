class Solution {

function hIndex($citations) {
    $n = count($citations);
    $buckets = array_fill(0, $n + 1, 0);

    foreach ($citations as $citation) {
        $buckets[min($n, $citation)]++;
    }

    $count = 0;
    for ($i = $n; $i >= 0; $i--) {
        $count += $buckets[$i];
        if ($count >= $i) {
            return $i;
        }
    }

    return 0;
}
}

$solution = new Solution();
echo $solution->hIndex([3,0,6,1,5]); // Output: 3
echo $solution->hIndex([1,3,1]); // Output: 1
