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
    function minCameraCover($root) {
        $this->result = 0;
        $status = $this->dfs($root);
        if ($status == 0) {
            $this->result++;
        }
        return $this->result;
    }
    
    function dfs($node) {
        if ($node == null) {
            return 2;
        }
        
        $left = $this->dfs($node->left);
        $right = $this->dfs($node->right);
        
        if ($left == 0 || $right == 0) {
            $this->result++;
            return 1;
        }
        
        if ($left == 1 || $right == 1) {
            return 2;
        }
        
        return 0;
    }
}
