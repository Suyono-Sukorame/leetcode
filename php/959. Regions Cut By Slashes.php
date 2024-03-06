class Solution {

private $rank;
private $p;

function regionsBySlashes($grid) {
    $n = count($grid);
    $m = $n + 1;
    $this->rank = array_fill(0, $m * $m, 1);
    $this->p = range(0, $m * $m - 1);
    $ans = 1;
    
    for ($i = 0; $i < $m; $i++) {
        $this->union(0, $i);
        $this->union(0, $m * $m - 1 - $i);
        $this->union(0, $m * $i);
        $this->union(0, $m - 1 + $m * $i);
    }
    
    for ($i = 0; $i < $n; $i++) {
        $arr = str_split($grid[$i]);
        for ($j = 0; $j < $n; $j++) {
            if ($arr[$j] == '/') {
                $p1 = $m * ($i + 1) + $j;
                $p2 = $m * $i + $j + 1;
                if ($this->union($p1, $p2)) $ans++;
            } elseif ($arr[$j] == '\\') {
                $p1 = $m * $i + $j;
                $p2 = $m * ($i + 1) + $j + 1;
                if ($this->union($p1, $p2)) $ans++;
            }
        }
    }
    
    return $ans;
}

function find($x) {
    if ($this->p[$x] == $x) return $x;
    $temp = $this->find($this->p[$x]);
    $this->p[$x] = $temp;
    return $temp;
}

function union($x, $y) {
    $px = $this->find($x);
    $py = $this->find($y);
    
    if ($px != $py) {
        if ($this->rank[$px] > $this->rank[$py]) {
            $this->p[$py] = $px;
        } elseif ($this->rank[$px] < $this->rank[$py]) {
            $this->p[$px] = $py;
        } else {
            $this->p[$px] = $py;
            $this->rank[$py]++;
        }
        return false;
    }
    return true;
}
}
