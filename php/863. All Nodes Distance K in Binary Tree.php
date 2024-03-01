/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {
    /**
     * @param TreeNode $root
     * @param TreeNode $target
     * @param Integer $k
     * @return Integer[]
     */
    function distanceK($root, $target, $k) {
        $res = [];
        $this->getNodes($root, $target, $k, $res);
        return $res;
    }

    function getNodes($root, $target, $k, &$res) {
        if ($root == null) {
            return -1;
        }
        if ($root == $target) {
            $this->getSub($root, 0, $k, $res);
            return 1;
        } else {
            $left = $this->getNodes($root->left, $target, $k, $res);
            $right = $this->getNodes($root->right, $target, $k, $res);

            if ($left == $k || $right == $k) {
                $res[] = $root->val;
                return -1;
            } else if ($left != -1) {
                $this->getSub($root->right, $left + 1, $k, $res);
                return $left + 1;
            } else if ($right != -1) {
                $this->getSub($root->left, $right + 1, $k, $res);
                return $right + 1;
            } else {
                return -1;
            }
        }
    }

    function getSub($root, $cur, $k, &$res) {
        if ($root == null) {
            return;
        }
        if ($k == $cur) {
            $res[] = $root->val;
            return;
        }
        $this->getSub($root->left, $cur + 1, $k, $res);
        $this->getSub($root->right, $cur + 1, $k, $res);
    }
}
