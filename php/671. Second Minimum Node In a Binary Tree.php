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
    function findSecondMinimumValue($root) {
        if ($root === null || ($root->left === null && $root->right === null)) return -1;
        
        $min1 = $root->val;
        $min2 = PHP_INT_MAX;
        
        $stack = [$root];
        
        while (!empty($stack)) {
            $node = array_pop($stack);
            
            if ($node->val > $min1 && $node->val < $min2) {
                $min2 = $node->val;
            }
            
            if ($node->left !== null) {
                $stack[] = $node->left;
                $stack[] = $node->right;
            }
        }
        
        return $min2 === PHP_INT_MAX ? -1 : $min2;
    }
}
