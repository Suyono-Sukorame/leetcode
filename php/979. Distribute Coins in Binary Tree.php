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
    function distributeCoins($root) {
        $moves = 0;
        $this->balanceCoins($root, $moves);
        return $moves;
    }
    
    function balanceCoins($node, &$moves) {
        if ($node === null) {
            return 0;
        }
        
        $leftCoins = $this->balanceCoins($node->left, $moves);
        $rightCoins = $this->balanceCoins($node->right, $moves);
        
        $excessCoins = $node->val + $leftCoins + $rightCoins - 1;
        
        $moves += abs($excessCoins);
        
        return $excessCoins;
    }
}
