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
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Integer[]
     */
    function getAllElements($root1, $root2) {
        $result = [];
        $stack1 = [];
        $stack2 = [];
        
        $pushAll = function($root, &$stack) {
            while ($root != null) {
                array_push($stack, $root);
                $root = $root->left;
            }
        };
        
        $pushAll($root1, $stack1);
        $pushAll($root2, $stack2);
        
        while (!empty($stack1) || !empty($stack2)) {
            if (empty($stack1) || (!empty($stack2) && $stack2[count($stack2) - 1]->val < $stack1[count($stack1) - 1]->val)) {
                $node = array_pop($stack2);
                $result[] = $node->val;
                $pushAll($node->right, $stack2);
            } else {
                $node = array_pop($stack1);
                $result[] = $node->val;
                $pushAll($node->right, $stack1);
            }
        }
        
        return $result;
    }
}
