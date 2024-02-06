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

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root) {
        if ($root === null) return 0;
        
        $leftDepth = $this->minDepth($root->left);
        $rightDepth = $this->minDepth($root->right);
        
        if ($leftDepth === 0 || $rightDepth === 0) {
            return max($leftDepth, $rightDepth) + 1;
        }
        
        return min($leftDepth, $rightDepth) + 1;
    }
}
