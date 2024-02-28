class Solution {
    /**
     * @param Integer[] $hand
     * @param Integer $groupSize
     * @return Boolean
     */
    function isNStraightHand($hand, $groupSize) {
        $n = count($hand);

        if ($n % $groupSize != 0) {
            return false;
        }

        $mp = [];
        foreach ($hand as $h) {
            if (!isset($mp[$h])) {
                $mp[$h] = 0;
            }
            $mp[$h]++;
        }

        sort($hand);
        foreach ($hand as $h) {
            if ($mp[$h] > 0) {
                $canReduce = true;
                for ($i = $h; $i < $h + $groupSize; $i++) {
                    if (!isset($mp[$i]) || $mp[$i] === 0) {
                        $canReduce = false;
                        break;
                    }
                }
                if ($canReduce) {
                    for ($i = $h; $i < $h + $groupSize; $i++) {
                        $mp[$i]--;
                    }
                }
            }
        }

        foreach ($mp as $value) {
            if ($value > 0) {
                return false;
            }
        }

        return true;
    }
}
