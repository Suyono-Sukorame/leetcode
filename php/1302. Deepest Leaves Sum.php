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
    function deepestLeavesSum($root) {
        if ($root == null) return 0;
        
        $queue = [$root];
        $sum = 0;
        
        while (!empty($queue)) {
            $size = count($queue);
            $sum = 0;
            
            for ($i = 0; $i < $size; $i++) {
                $node = array_shift($queue);
                $sum += $node->val;
                
                if ($node->left != null) {
                    array_push($queue, $node->left);
                }
                
                if ($node->right != null) {
                    array_push($queue, $node->right);
                }
            }
        }
        
        return $sum;
    }
}
