class Solution {
    private $len;
    private $dp; //dp[start][k]
    private $sum;

    function largestSumOfAverages($nums, $k) {
        $this->len = count($nums);
        $this->dp = array_fill(0, $this->len, array_fill(0, $k + 1, 0));
        $this->sum = array_fill(0, $this->len + 1, 0);

        for ($i = 1; $i <= $this->len; $i++) {
            $this->sum[$i] = $this->sum[$i - 1] + $nums[$i - 1];
        }

        $res = $this->dfs(0, $k);
        return $res;
    }

    private function dfs($start, $k) {
        if ($k == 1) {
            $this->dp[$start][$k] = ($this->sum[$this->len] - $this->sum[$start]) / ($this->len - $start);
            return $this->dp[$start][$k];
        }

        if ($this->dp[$start][$k] != 0.0) {
            return $this->dp[$start][$k];
        }

        $res = 0;

        for ($i = $start; $i <= $this->len - $k; $i++) {
            $curAvg = ($this->sum[$i + 1] - $this->sum[$start]) / ($i + 1 - $start);
            $nextAvg = $this->dfs($i + 1, $k - 1);
            $res = max($res, $curAvg + $nextAvg);
        }

        return $this->dp[$start][$k] = $res;
    }
}