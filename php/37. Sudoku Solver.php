class Solution {

/**
 * @param String[][] $board
 * @return NULL
 */
function solveSudoku(&$board) {
    $this->solve($board);
}

function solve(&$board) {
    for ($i = 0; $i < 9; $i++) {
        for ($j = 0; $j < 9; $j++) {
            if ($board[$i][$j] == '.') {
                for ($k = 1; $k <= 9; $k++) {
                    $board[$i][$j] = (string)$k;
                    if ($this->isValid($board, $i, $j) && $this->solve($board)) {
                        return true;
                    }
                    $board[$i][$j] = '.';
                }
                return false;
            }
        }
    }
    return true;
}

function isValid(&$board, $row, $col) {
    $num = $board[$row][$col];
    for ($i = 0; $i < 9; $i++) {
        if ($board[$row][$i] == $num && $i != $col) {
            return false;
        }
        if ($board[$i][$col] == $num && $i != $row) {
            return false;
        }
        $boxRow = floor($row / 3) * 3 + floor($i / 3);
        $boxCol = floor($col / 3) * 3 + $i % 3;
        if ($board[$boxRow][$boxCol] == $num && $boxRow != $row && $boxCol != $col) {
            return false;
        }
    }
    return true;
}
}

// Test case
$solution = new Solution();
$board = [
["5","3",".",".","7",".",".",".","."],
["6",".",".","1","9","5",".",".","."],
[".","9","8",".",".",".",".","6","."],
["8",".",".",".","6",".",".",".","3"],
["4",".",".","8",".","3",".",".","1"],
["7",".",".",".","2",".",".",".","6"],
[".","6",".",".",".",".","2","8","."],
[".",".",".","4","1","9",".",".","5"],
[".",".",".",".","8",".",".","7","9"]
];

$solution->solveSudoku($board);

foreach ($board as $row) {
echo implode(" ", $row) . PHP_EOL;
}
