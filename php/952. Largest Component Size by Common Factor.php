class Solution {

public $arr = [];
public $visit = [];
public $member = [];

function __construct() {
    for ($i = 0; $i < 100005; $i++) {
        $this->arr[$i] = $i;
        $this->visit[$i] = 0;
        $this->member[$i] = 0;
    }
}

function build(&$primes, &$sp, $N) {
    if (empty($primes)) {
        $this->visit[0] = $this->visit[1] = 1;
        $sp[1] = [1, 1];
        for ($i = 2; $i <= 100000; $i++) {
            if (!$this->visit[$i]) {
                $primes[] = $i;
                $sp[$i] = [$i, $i];
            }
            foreach ($primes as $prime) {
                if ($i * $prime > 100000) break;
                $this->visit[$i * $prime] = 1;
                $sp[$i * $prime] = [$prime, $sp[$i][0] == $prime ? $sp[$i][1] : $i];
                if ($i % $prime == 0) break;
            }
        }
    }
}

function find($x) {
    while ($this->arr[$x] != $x) {
        $x = $this->arr[$x];
    }
    return $x;
}

function uni($x, $y) {
    $x = $this->find($x);
    $y = $this->find($y);
    if ($x == $y) return;
    $this->member[$y] += $this->member[$x];
    $this->member[$x] = 0;
    $this->arr[$x] = $y;
}

function largestComponentSize($nums) {
    $primes = [];
    $sp = [];
    $this->build($primes, $sp, max($nums));
    $ans = 1;
    foreach ($nums as &$it) {
        $pre = $sp[$it][0];
        $it = $sp[$it][1];
        while ($it != $sp[$it][0]) {
            $this->uni($sp[$it][0], $pre);
            $pre = $sp[$it][0];
            $it = $sp[$it][1];
        }
        $this->uni($sp[$it][0], $pre);
        $this->member[$this->find($pre)]++;
        $ans = max($this->member[$this->find($pre)], $ans);
    }
    return $ans;
}
}
