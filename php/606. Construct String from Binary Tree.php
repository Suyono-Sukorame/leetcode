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
    function tree2str($root) {
        if ($root === null) {
            return '';
        }
        $result = (string)$root->val;
        if ($root->left !== null) {
            $result .= '(' . $this->tree2str($root->left) . ')';
        }
        if ($root->right !== null) {
            if ($root->left === null) {
                $result .= '()';
            }
            $result .= '(' . $this->tree2str($root->right) . ')';
        }
        return $result;
    }
}
