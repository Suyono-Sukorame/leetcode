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
     * @param Integer $low
     * @param Integer $high
     * @return Integer
     */
    function rangeSumBST($root, $low, $high) {
        if ($root == null) return 0;
        if ($root->val < $low) {
            return $this->rangeSumBST($root->right, $low, $high);
        } elseif ($root->val > $high) {
            return $this->rangeSumBST($root->left, $low, $high);
        } else {
            return $root->val + $this->rangeSumBST($root->left, $low, $high) + $this->rangeSumBST($root->right, $low, $high);
        }
    }
}
