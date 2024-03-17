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
    function lcaDeepestLeaves($root) {
        if ($root == null) return null;
        $lh = $this->height($root->left);
        $rh = $this->height($root->right);
        if ($lh == $rh) return $root;
        elseif ($lh > $rh) return $this->lcaDeepestLeaves($root->left);
        else return $this->lcaDeepestLeaves($root->right);
    }
    
    function height($root) {
        if ($root == null) return 0;
        return max($this->height($root->left), $this->height($root->right)) + 1;
    }
}
