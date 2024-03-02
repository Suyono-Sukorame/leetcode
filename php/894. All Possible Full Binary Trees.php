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
     * @param Integer $N
     * @return TreeNode[]
     */
    function allPossibleFBT($N) {
        $ans = array();
        if ($N % 2 == 0) {
            return $ans;
        }
        if ($N == 1) {
            $root = new TreeNode(0);
            $ans[] = $root;
        }
        for ($i = 1; $i < $N; $i += 2) {
            foreach ($this->allPossibleFBT($i) as $left) {
                foreach ($this->allPossibleFBT($N - $i - 1) as $right) {
                    $root = new TreeNode(0);
                    $root->left = $left;
                    $root->right = $right;
                    $ans[] = $root;
                }
            }
        }
        return $ans;
    }
}
