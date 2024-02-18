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
     * @param TreeNode $subRoot
     * @return Boolean
     */
    function isSubtree($root, $subRoot) {
        if ($root === null) {
            return false;
        }
        if ($this->isSameTree($root, $subRoot)) {
            return true;
        }
        return $this->isSubtree($root->left, $subRoot) || $this->isSubtree($root->right, $subRoot);
    }
    
    function isSameTree($p, $q) {
        if ($p === null && $q === null) {
            return true;
        }
        if ($p === null || $q === null) {
            return false;
        }
        return $p->val === $q->val && $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
    }
}
