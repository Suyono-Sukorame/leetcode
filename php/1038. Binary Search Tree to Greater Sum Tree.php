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
    function bstToGst($root) {
        $this->sum = 0;
        $this->traverse($root);
        return $root;
    }
    
    function traverse($node) {
        if ($node === null) return;
        
        $this->traverse($node->right);
        
        $node->val += $this->sum;
        $this->sum = $node->val;
        
        $this->traverse($node->left);
    }
}
