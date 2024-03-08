class Solution {
    public $count = 0;

    function uniquePathsIII($grid) {
        $blocks = 1;
        foreach ($grid as $arr)
            foreach ($arr as $a)
                if ($a == 0)
                    $blocks++;
        
        foreach ($grid as $i => $row)
            foreach ($row as $j => $cell)
                if ($cell == 1)
                    $this->dfs($grid, $i, $j, $blocks);

        return $this->count;
    }

    function dfs(&$grid, $i, $j, $blocks) {
        if ($i < 0 || $j < 0 || $i >= count($grid) || $j >= count($grid[0]) || $grid[$i][$j] == -1 || $grid[$i][$j] == -2)
            return;

        if ($grid[$i][$j] == 2 && $blocks == 0) {
            $this->count++;
            return;
        }

        if ($grid[$i][$j] == 2)
            return;

        $grid[$i][$j] = -2;
        $this->dfs($grid, $i - 1, $j, $blocks - 1);
        $this->dfs($grid, $i, $j + 1, $blocks - 1);
        $this->dfs($grid, $i + 1, $j, $blocks - 1);
        $this->dfs($grid, $i, $j - 1, $blocks - 1);
        $grid[$i][$j] = 0;
    }
}
