class Solution {
    private $MOD = 1000000007;
    private $nodesSum;
    private $ans;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxProduct($root) {
        $this->nodesSum = $this->sum($root); 
        $this->ans = 0;
        $this->maxProductHelper($root);
        return (int)($this->ans % $this->MOD);
    }

    function sum($node) {
        if ($node == null) return 0;
        return $this->sum($node->left) + $this->sum($node->right) + $node->val;
    }

    function maxProductHelper($node) {
        if ($node == null) return 0;
        $subtree1Sum = $this->maxProductHelper($node->left) + $this->maxProductHelper($node->right) + $node->val;
        $subtree2Sum = $this->nodesSum - $subtree1Sum;
        $this->ans = max($this->ans, $subtree1Sum * $subtree2Sum);
        return $subtree1Sum;
    }
}
