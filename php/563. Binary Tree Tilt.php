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
    function findTilt($root) {
        $res = 0;
        
        $traverse = function ($node) use (&$traverse, &$res) {
            if (!$node) return 0;
            $left = $traverse($node->left);
            $right = $traverse($node->right);
            $res += abs($left - $right);
            return $node->val + $left + $right;
        };
        
        $traverse($root);
        
        return $res;
    }
}
