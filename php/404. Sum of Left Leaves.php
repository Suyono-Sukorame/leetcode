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
    function sumOfLeftLeaves($root) {
        $sum = 0;
        
        $dfs = function($node, $isLeft) use (&$dfs, &$sum) {
            if ($node == null) return;
            
            if ($isLeft && $node->left == null && $node->right == null) {
                $sum += $node->val;
                return;
            }
            
            $dfs($node->left, true);
            $dfs($node->right, false);
        };
        
        $dfs($root, false);
        
        return $sum;
    }
}
