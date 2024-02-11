class Solution {
    /**
     * @param Integer[][] $envelopes
     * @return Integer
     */
    function maxEnvelopes($envelopes) {
        if (empty($envelopes)) return 0;

        usort($envelopes, function($a, $b) {
            if ($a[0] != $b[0]) {
                return $a[0] - $b[0];
            } else {
                return $b[1] - $a[1];
            }
        });

        $n = count($envelopes);
        $dp = []; // Dynamic programming array

        foreach ($envelopes as $envelope) {
            $index = $this->binarySearch($dp, $envelope[1]);
            if ($index === false) {
                $dp[] = $envelope[1];
            } else {
                $dp[$index] = $envelope[1];
            }
        }

        return count($dp);
    }

    function binarySearch($arr, $target) {
        $left = 0;
        $right = count($arr) - 1;
        while ($left <= $right) {
            $mid = $left + intval(($right - $left) / 2);
            if ($arr[$mid] === $target) {
                return $mid;
            } elseif ($arr[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }
        return $left < count($arr) ? $left : false;
    }
}
