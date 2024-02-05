class Solution {

function canCompleteCircuit($gas, $cost) {
    $totalGas = $currentGas = $startStation = 0;

    for ($i = 0; $i < count($gas); $i++) {
        $totalGas += $gas[$i] - $cost[$i];
        $currentGas += $gas[$i] - $cost[$i];

        if ($currentGas < 0) {
            $currentGas = 0;
            $startStation = $i + 1;
        }
    }

    return ($totalGas >= 0) ? $startStation : -1;
}
}

$solution = new Solution();
echo $solution->canCompleteCircuit([1,2,3,4,5], [3,4,5,1,2]); // Output: 3
echo $solution->canCompleteCircuit([2,3,4], [3,4,3]); // Output: -1
