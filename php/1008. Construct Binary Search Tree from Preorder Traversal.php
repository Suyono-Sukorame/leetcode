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
     * @param Integer[] $preorder
     * @return TreeNode
     */
    function bstFromPreorder($preorder) {
        return $this->helper($preorder, PHP_INT_MIN, PHP_INT_MAX, 0, count($preorder));
    }
    
    function helper($preorder, $min, $max, $index, $size) {
        if ($index >= $size) return null;
        
        $val = $preorder[$index];
        if ($val < $min || $val > $max) return null;
        
        $node = new TreeNode($val);
        $node->left = $this->helper($preorder, $min, $val, $index + 1, $size);
        $rightIndex = $this->findFirstGreaterThan($preorder, $val, $index + 1, $size);
        $node->right = $this->helper($preorder, $val, $max, $rightIndex, $size);
        
        return $node;
    }
    
    function findFirstGreaterThan($preorder, $target, $start, $end) {
        for ($i = $start; $i < $end; $i++) {
            if ($preorder[$i] > $target) return $i;
        }
        return $end;
    }
}
