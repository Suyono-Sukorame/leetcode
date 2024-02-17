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

    private $maxDiameter = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root) {
        $this->depth($root);
        return $this->maxDiameter;
    }

    private function depth($node) {
        if ($node === null) {
            return 0;
        }

        $leftDepth = $this->depth($node->left);
        $rightDepth = $this->depth($node->right);

        $this->maxDiameter = max($this->maxDiameter, $leftDepth + $rightDepth);

        return 1 + max($leftDepth, $rightDepth);
    }
}
