class Solution {

/**
 * @param Integer[][] $matrix
 * @param Integer $target
 * @return Boolean
 */
function searchMatrix($matrix, $target) {
    $m = count($matrix); // Jumlah baris
    $n = count($matrix[0]); // Jumlah kolom

    $row = 0;
    $col = $n - 1;

    while ($row < $m && $col >= 0) {
        if ($matrix[$row][$col] == $target) {
            return true;
        } elseif ($matrix[$row][$col] < $target) {
            $row++;
        } else {
            $col--;
        }
    }

    return false;
}
}
