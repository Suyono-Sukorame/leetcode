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
     * @return Integer[]
     */
    function postorderTraversal($root) {
        $result = [];
        if ($root == null) {
            return $result;
        }
        
        $stack1 = [];
        $stack2 = [];
        array_push($stack1, $root);
        
        while (!empty($stack1)) {
            $node = array_pop($stack1);
            array_push($stack2, $node);
            
            if ($node->left != null) {
                array_push($stack1, $node->left);
            }
            if ($node->right != null) {
                array_push($stack1, $node->right);
            }
        }
        
        while (!empty($stack2)) {
            $node = array_pop($stack2);
            $result[] = $node->val;
        }
        
        return $result;
    }
}
