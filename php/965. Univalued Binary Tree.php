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
     * @return Boolean
     */
    function isUnivalTree($root) {
        if ($root === null) {
            return true;
        }
        return $this->isUnival($root, $root->val);
    }
    
    function isUnival($node, $value) {
        if ($node === null) {
            return true;
        }
        if ($node->val !== $value) {
            return false;
        }
        return $this->isUnival($node->left, $value) && $this->isUnival($node->right, $value);
    }
}
