class Solution {
    /**
     * @param Integer $n
     * @return Integer
     */
    function numDupDigitsAtMostN($n) {
        $digits = $this->toDigits($n);
        $len = count($digits);
        $d = 0;

        // 1 to 10^{len-1}-1
        for ($r = 1; $r < $len; $r++) {
            $dr = $this->countDiff($r);
            $d += $dr;
        }

        // 10^len to N-1
        for ($i = 0; $i < $len; $i++) {
            $di = $this->countDiff1($digits, $i);
            $d += $di;
        }

        // N
        if (!$this->isDuplicated($digits, $len)) {
            $d++;
        }

        return $n - $d;
    }

    function countDiff($r) {
        $d = 9 * $this->permutation($r - 1, 9);
        return $d;
    }

    function countDiff1($digits, $i) {
        if ($i == 0) {
            $start = [1];
        } else {
            $start = array_merge(array_slice($digits, 0, $i + 1), array_fill(0, count($digits) - ($i + 1), 0));
        }
        
        $end = array_merge(array_slice($digits, 0, $i + 1), array_fill(0, count($digits) - ($i + 1), 9));

        if ($start[$i] > $end[$i]) {
            return 0;
        }

        if ($this->isDuplicated($digits, $i)) {
            return 0;
        }

        $remainingDigits = $this->getRemainingDigits($digits, $i);

        $r = count($digits) - 1 - $i; // remaining len
        $n = 10 - $i - 1; // remaining digits 0-9
        $d = $remainingDigits * $this->permutation($r, $n);
        return $d;
    }

    function getRemainingDigits($digits, $i) {
        $used = $this->getUsedDigits($digits, $i);

        $start = ($i == 0) ? 1 : 0;
        $end = $digits[$i] - 1;

        $x = [];
        for ($j = $start; $j <= $end; $j++) {
            if (!isset($used[$j])) {
                $x[] = $j;
            }
        }

        return count($x);
    }

    function getUsedDigits($digits, $i) {
        $map = [];

        for ($j = 0; $j < $i; $j++) {
            $d = $digits[$j];

            if (!isset($map[$d])) {
                $map[$d] = 1;
            }
        }

        return $map;
    }

    function isDuplicated($digits, $i) {
        $map = [];

        for ($j = 0; $j < $i; $j++) {
            $d = $digits[$j];

            if (isset($map[$d])) {
                return true;
            }

            $map[$d] = 1;
        }

        return false;
    }

    function toDigits($n) {
        $a = [];

        while ($n > 0) {
            $d = $n % 10;
            $a[] = $d;

            $n = (int)($n / 10);
        }

        return array_reverse($a);
    }

    function permutation($r, $n) {
        if ($r == 0) {
            return 1;
        }

        $p = 1;
        for ($i = 0; $i < $r; $i++) {
            $p *= $n - $i;
        }

        return $p;
    }
}
