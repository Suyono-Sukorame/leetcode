class NumArray {
    private $nums;
    private $tree;
    private $n;

    /**
     * @param Integer[] $nums
     */
    function __construct($nums) {
        $this->nums = $nums;
        $this->n = count($nums);
        $this->tree = array_fill(0, 4 * $this->n, 0);
        $this->buildTree(0, 0, $this->n - 1);
    }

    function buildTree($index, $left, $right) {
        if ($left == $right) {
            $this->tree[$index] = $this->nums[$left];
        } else {
            $mid = $left + intval(($right - $left) / 2);
            $this->buildTree(2 * $index + 1, $left, $mid);
            $this->buildTree(2 * $index + 2, $mid + 1, $right);
            $this->tree[$index] = $this->tree[2 * $index + 1] + $this->tree[2 * $index + 2];
        }
    }
  
    /**
     * @param Integer $index
     * @param Integer $val
     * @return NULL
     */
    function update($index, $val) {
        $diff = $val - $this->nums[$index];
        $this->nums[$index] = $val;
        $this->updateTree(0, 0, $this->n - 1, $index, $diff);
    }

    function updateTree($treeIndex, $left, $right, $index, $diff) {
        if ($index < $left || $index > $right) return;
        $this->tree[$treeIndex] += $diff;
        if ($left != $right) {
            $mid = $left + intval(($right - $left) / 2);
            $this->updateTree(2 * $treeIndex + 1, $left, $mid, $index, $diff);
            $this->updateTree(2 * $treeIndex + 2, $mid + 1, $right, $index, $diff);
        }
    }
  
    /**
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function sumRange($left, $right) {
        return $this->queryTree(0, 0, $this->n - 1, $left, $right);
    }

    function queryTree($treeIndex, $left, $right, $qLeft, $qRight) {
        if ($qLeft > $right || $qRight < $left) return 0;
        if ($qLeft <= $left && $qRight >= $right) return $this->tree[$treeIndex];
        $mid = $left + intval(($right - $left) / 2);
        $leftSum = $this->queryTree(2 * $treeIndex + 1, $left, $mid, $qLeft, $qRight);
        $rightSum = $this->queryTree(2 * $treeIndex + 2, $mid + 1, $right, $qLeft, $qRight);
        return $leftSum + $rightSum;
    }
}
