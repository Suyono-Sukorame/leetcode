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
     * @param Integer $val
     * @param Integer $depth
     * @return TreeNode
     */
    function addOneRow($root, $val, $depth) {
        if ($depth === 1) {
            $newRoot = new TreeNode($val);
            $newRoot->left = $root;
            return $newRoot;
        }
        
        $this->helper($root, $val, $depth, 1);
        return $root;
    }
    
    function helper($node, $val, $depth, $currentDepth) {
        if ($node === null) return;
        
        if ($currentDepth === $depth - 1) {
            $leftNode = new TreeNode($val);
            $leftNode->left = $node->left;
            $node->left = $leftNode;
            
            $rightNode = new TreeNode($val);
            $rightNode->right = $node->right;
            $node->right = $rightNode;
        } else {
            $this->helper($node->left, $val, $depth, $currentDepth + 1);
            $this->helper($node->right, $val, $depth, $currentDepth + 1);
        }
    }
}
