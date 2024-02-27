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
    function pruneTree($root) {
        if ($root === null) return null;
        
        $root->left = $this->pruneTree($root->left);
        $root->right = $this->pruneTree($root->right);
        
        if ($root->val === 0 && $root->left === null && $root->right === null) {
            return null;
        }
        
        return $root;
    }
}
