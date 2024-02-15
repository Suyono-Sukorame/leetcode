/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {
    
    private $currentVal = null;
    private $currentCount = 0;
    private $maxCount = 0;
    private $modes = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function findMode($root) {
        $this->currentVal = null;
        $this->currentCount = 0;
        $this->maxCount = 0;
        $this->modes = [];

        $this->inOrderTraversal($root);

        return $this->modes;
    }

    private function inOrderTraversal($node) {
        if ($node == null) return;

        $this->inOrderTraversal($node->left);

        $this->currentCount = ($node->val === $this->currentVal) ? $this->currentCount + 1 : 1;
        if ($this->currentCount === $this->maxCount) {
            $this->modes[] = $node->val;
        } elseif ($this->currentCount > $this->maxCount) {
            $this->maxCount = $this->currentCount;
            $this->modes = [$node->val];
        }
        $this->currentVal = $node->val;

        $this->inOrderTraversal($node->right);
    }
}
