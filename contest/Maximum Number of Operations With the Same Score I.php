class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxOperations($nums) {
        sort($nums);
        $maxScore = 0;
        $operations = 0;

        while (count($nums) >= 2) {
            $first = array_shift($nums);
            $second = array_shift($nums);
            $score = $first + $second;

            if ($score == $maxScore || $maxScore == 0) {
                $operations++;
                $maxScore = $score;
            } else {
                break;
            }
        }

        return $operations;
    }
}