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
    function increasingBST($root) {
        $dummy = new TreeNode(0);
        $current = $dummy;
        
        $stack = [];
        $node = $root;
        
        while ($node !== null || !empty($stack)) {
            while ($node !== null) {
                array_push($stack, $node);
                $node = $node->left;
            }
            $node = array_pop($stack);
            $current->right = new TreeNode($node->val);
            $current = $current->right;
            $node = $node->right;
        }
        
        return $dummy->right;
    }
}
