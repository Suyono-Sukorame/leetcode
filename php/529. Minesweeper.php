class Solution {
    /**
     * @param String[][] $board
     * @param Integer[] $click
     * @return String[][]
     */
    function updateBoard($board, $click) {
        $rows = count($board);
        $cols = count($board[0]);
        $this->dfs($board, $click[0], $click[1], $rows, $cols);
        return $board;
    }

    function dfs(&$board, $i, $j, $rows, $cols) {
        if ($i < 0 || $i >= $rows || $j < 0 || $j >= $cols) return;
        if ($board[$i][$j] === 'M') {
            $board[$i][$j] = 'X';
            return;
        }
        if ($board[$i][$j] !== 'E') return;

        $mines = $this->checkForMine($board, $i, $j, $rows, $cols);

        if ($mines) {
            $board[$i][$j] = (string)$mines;
            return;
        } else {
            $board[$i][$j] = 'B';
            for ($x = max($i - 1, 0); $x < min($i + 2, $rows); $x++) {
                for ($y = max($j - 1, 0); $y < min($j + 2, $cols); $y++) {
                    $this->dfs($board, $x, $y, $rows, $cols);
                }
            }
        }
    }

    function checkForMine($board, $x, $y, $rows, $cols) {
        $mines = 0;
        for ($i = max($x - 1, 0); $i < min($x + 2, $rows); $i++) {
            for ($j = max($y - 1, 0); $j < min($y + 2, $cols); $j++) {
                if ($board[$i][$j] === 'M') $mines++;
            }
        }
        return $mines;
    }
}
