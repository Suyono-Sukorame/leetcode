class Solution {
    /**
     * @param String[] $board
     * @return Boolean
     */
    function validTicTacToe($board) {
        $turns = 0;
        $win_x = false;
        $win_o = false;

        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($board[$i][$j] == 'X') $turns++;
                elseif ($board[$i][$j] == 'O') $turns--;

                if ($board[$i][0] != ' ' && $board[$i][0] == $board[$i][1] && $board[$i][1] == $board[$i][2]) {
                    if ($board[$i][0] == 'X') $win_x = true;
                    if ($board[$i][0] == 'O') $win_o = true;
                }
                if ($board[0][$j] != ' ' && $board[0][$j] == $board[1][$j] && $board[1][$j] == $board[2][$j]) {
                    if ($board[0][$j] == 'X') $win_x = true;
                    if ($board[0][$j] == 'O') $win_o = true;
                }
            }
        }

        if ($board[0][0] != ' ' && $board[0][0] == $board[1][1] && $board[1][1] == $board[2][2]) {
            if ($board[0][0] == 'X') $win_x = true;
            if ($board[0][0] == 'O') $win_o = true;
        }
        if ($board[0][2] != ' ' && $board[0][2] == $board[1][1] && $board[1][1] == $board[2][0]) {
            if ($board[0][2] == 'X') $win_x = true;
            if ($board[0][2] == 'O') $win_o = true;
        }

        if ($turns < 0 || $turns > 1) return false;

        if ($win_x && $win_o) return false;

        if ($win_x && $turns != 1) return false;
        if ($win_o && $turns != 0) return false;

        return true;
    }
}
