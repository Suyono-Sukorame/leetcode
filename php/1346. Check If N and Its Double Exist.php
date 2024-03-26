class Solution {

function checkIfExist($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($i != $j && $arr[$i] == 2 * $arr[$j]) {
                return true;
            }
        }
    }
    return false;
}
}

$solution = new Solution();
$arr = [10, 2, 5, 3];
$result = $solution->checkIfExist($arr);
echo $result ? "Ada pasangan yang memenuhi kondisi." : "Tidak ada pasangan yang memenuhi kondisi.";
