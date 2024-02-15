class Solution
{
    private $memo = [];

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function findTargetSumWays($nums, $target, $idx = 0)
    {
        if ($idx == count($nums))
            return $target == 0 ? 1 : 0;

        if (isset($this->memo[$idx][$target]))
            return $this->memo[$idx][$target];

        $res = $this->findTargetSumWays($nums, $target - $nums[$idx], $idx+1)
            +  $this->findTargetSumWays($nums, $target + $nums[$idx], $idx+1);

        return $this->memo[$idx][$target] = $res;
    }
}