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

    private $index = 0;
    private $flipped = [];

    /**
     * @param TreeNode $root
     * @param Integer[] $voyage
     * @return Integer[]
     */
    function flipMatchVoyage($root, $voyage) {
        if ($this->preOrderTraversal($root, $voyage) === false) {
            return [-1];
        }
        
        return $this->flipped;
    }
    
    function preOrderTraversal($node, $voyage) {
        if (!$node) {
            return true;
        }
        
        if ($node->val !== $voyage[$this->index]) {
            return false;
        }
        
        $this->index++;
        
        if ($node->left && $node->left->val !== $voyage[$this->index]) {
            $this->flipped[] = $node->val;
            return $this->preOrderTraversal($node->right, $voyage) && $this->preOrderTraversal($node->left, $voyage);
        }
        
        return $this->preOrderTraversal($node->left, $voyage) && $this->preOrderTraversal($node->right, $voyage);
    }
}
