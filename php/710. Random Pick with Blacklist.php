class Solution {
    private $mapping = [];
    private $newsize;

    function __construct($n, $blacklist) {
        $m = count($blacklist);
        $this->newsize = $n - $m;
        $last = $n - 1;
        $black = array_flip($blacklist);
        
        for ($i = 0; $i < $m; $i++) {
            $num = $blacklist[$i];
            if ($num >= $this->newsize) {
                continue;
            }
            while (isset($black[$last])) {
                $last--;
            }
            $this->mapping[$num] = $last;
            $last--;
        }
    }

    function pick() {
        $rand = rand(0, $this->newsize - 1);
        return isset($this->mapping[$rand]) ? $this->mapping[$rand] : $rand;
    }
}
