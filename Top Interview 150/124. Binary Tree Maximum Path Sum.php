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
    function maxPathSum($root) {
        $maxSum = PHP_INT_MIN;
        $this->findMaxPathSum($root, $maxSum);
        return $maxSum;
    }

    function findMaxPathSum($node, &$maxSum) {
        if ($node == null) {
            return 0;
        }

        $leftSum = max(0, $this->findMaxPathSum($node->left, $maxSum));
        $rightSum = max(0, $this->findMaxPathSum($node->right, $maxSum));

        $maxSum = max($maxSum, $leftSum + $rightSum + $node->val);

        return max($leftSum, $rightSum) + $node->val;
    }
}
