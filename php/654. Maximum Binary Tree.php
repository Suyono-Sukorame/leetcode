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
     * @param Integer[] $nums
     * @return TreeNode
     */
    function constructMaximumBinaryTree($nums) {
        if (empty($nums)) {
            return null;
        }
        
        $maxIndex = 0;
        $maxValue = $nums[0];
        $length = count($nums);
        for ($i = 1; $i < $length; $i++) {
            if ($nums[$i] > $maxValue) {
                $maxValue = $nums[$i];
                $maxIndex = $i;
            }
        }
        
        $root = new TreeNode($maxValue);
        
        $root->left = $this->constructMaximumBinaryTree(array_slice($nums, 0, $maxIndex));
        $root->right = $this->constructMaximumBinaryTree(array_slice($nums, $maxIndex + 1));
        
        return $root;
    }
}
