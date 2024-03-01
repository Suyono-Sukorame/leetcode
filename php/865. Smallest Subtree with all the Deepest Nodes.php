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
     * @return TreeNode
     */
    function subtreeWithAllDeepest($root) {
        return $this->dfs($root)[0];
    }

    function dfs($node) {
        if ($node === null) {
            return [null, 0];
        }
        
        [$leftSubtree, $leftDepth] = $this->dfs($node->left);
        [$rightSubtree, $rightDepth] = $this->dfs($node->right);
        
        if ($leftDepth > $rightDepth) {
            return [$leftSubtree, $leftDepth + 1];
        } elseif ($leftDepth < $rightDepth) {
            return [$rightSubtree, $rightDepth + 1];
        } else {
            return [$node, $leftDepth + 1];
        }
    }
}
