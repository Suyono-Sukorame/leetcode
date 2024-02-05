class Solution {

function convert($s, $numRows) {
    if ($numRows == 1) {
        return $s;
    }

    $result = array_fill(0, $numRows, '');
    $row = 0;
    $direction = 1;

    for ($i = 0; $i < strlen($s); $i++) {
        $result[$row] .= $s[$i];

        if ($row == 0) {
            $direction = 1;
        } elseif ($row == $numRows - 1) {
            $direction = -1;
        }

        $row += $direction;
    }

    return implode('', $result);
}
}

$solution = new Solution();
echo $solution->convert("PAYPALISHIRING", 3); // Output: "PAHNAPLSIIGYIR"
echo $solution->convert("PAYPALISHIRING", 4); // Output: "PINALSIGYAHRPI"
echo $solution->convert("A", 1); // Output: "A"
