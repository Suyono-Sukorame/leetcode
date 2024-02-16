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
    function findBottomLeftValue($root) {
        $queue = array($root);

        while (!empty($queue)) {
            $node = array_shift($queue);
            $leftmost = $node->val;
            if ($node->right) array_push($queue, $node->right);
            if ($node->left) array_push($queue, $node->left);
        }

        return $leftmost;
    }
}
