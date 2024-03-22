class Solution {

function numOfBurgers($tomatoSlices, $cheeseSlices) {
    $total_jumbo = ($tomatoSlices - 2 * $cheeseSlices) / 2;
    $total_small = $cheeseSlices - $total_jumbo;

    if ($total_jumbo >= 0 && $total_small >= 0 && $total_jumbo == (int)$total_jumbo && $total_small == (int)$total_small) {
        return [(int)$total_jumbo, (int)$total_small];
    } else {
        return [];
    }
}
}
