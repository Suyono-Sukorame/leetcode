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
    function maxAncestorDiff($root) {
        return $this->helper($root, $root->val, $root->val);
    }
    
    function helper($node, $min, $max) {
        if ($node === null) return 0;
        
        $diff = max(abs($min - $node->val), abs($max - $node->val));
        
        $min = min($min, $node->val);
        $max = max($max, $node->val);
        
        $leftDiff = $this->helper($node->left, $min, $max);
        $rightDiff = $this->helper($node->right, $min, $max);
        
        return max($diff, $leftDiff, $rightDiff);
    }
}
