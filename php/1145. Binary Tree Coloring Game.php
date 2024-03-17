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
     * @param Integer $n
     * @param Integer $x
     * @return Boolean
     */
    function btreeGameWinningMove($root, $n, $x) {
        $nodeX = $this->findNode($root, $x);
        $leftCount = $this->countNodes($nodeX->left);
        $rightCount = $this->countNodes($nodeX->right);
        $parentCount = $n - $leftCount - $rightCount - 1;
        
        if ($leftCount > $n / 2 || $rightCount > $n / 2 || $parentCount > $n / 2) {
            return true;
        }
        
        return false;
    }
    
    function findNode($root, $x) {
        if ($root == null || $root->val == $x) {
            return $root;
        }
        
        $left = $this->findNode($root->left, $x);
        $right = $this->findNode($root->right, $x);
        
        return $left ?: $right;
    }
    
    function countNodes($root) {
        if ($root == null) {
            return 0;
        }
        
        return 1 + $this->countNodes($root->left) + $this->countNodes($root->right);
    }
}
