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
     * @return String
     */
    function smallestFromLeaf($root) {
        return $this->helper($root);
    }
    
    function helper($root, $smallest = null, $current = "") {
        if (!$root) return;
        $current = chr($root->val + 97) . $current;
        if (!$root->left && !$root->right) {
            if (!$smallest) {
                return $current;
            } else if ($smallest > $current) {
                $smallest = $current;
            }
        }
        $first = $this->helper($root->left, $smallest, $current);
        $second = $this->helper($root->right, $smallest, $current);
        if ($first && $second) {
            return $first > $second ? $second : $first;
        } else {
            return $first ?: $second;
        }
    }
}
