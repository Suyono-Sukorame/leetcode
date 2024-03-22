class Solution {
    function tictactoe($moves) {
        $grid = array_fill(0, 3, array_fill(0, 3, ' '));

        foreach ($moves as $index => $move) {
            $row = $move[0];
            $col = $move[1];
            $player = $index % 2 == 0 ? 'A' : 'B';
            $grid[$row][$col] = $player;

            // Check if current player wins
            if ($this->checkWin($grid, $player)) {
                return $player;
            }
        }

        // Check if game is a draw or pending
        return $this->isDrawOrPending($moves);
    }

    function checkWin($grid, $player) {
        // Check rows and columns
        for ($i = 0; $i < 3; $i++) {
            if ($grid[$i][0] == $player && $grid[$i][1] == $player && $grid[$i][2] == $player) {
                return true;
            }
            if ($grid[0][$i] == $player && $grid[1][$i] == $player && $grid[2][$i] == $player) {
                return true;
            }
        }
        // Check diagonals
        if ($grid[0][0] == $player && $grid[1][1] == $player && $grid[2][2] == $player) {
            return true;
        }
        if ($grid[0][2] == $player && $grid[1][1] == $player && $grid[2][0] == $player) {
            return true;
        }
        return false;
    }

    function isDrawOrPending($moves) {
        if (count($moves) == 9) {
            return "Draw";
        } else {
            return "Pending";
        }
    }
}
