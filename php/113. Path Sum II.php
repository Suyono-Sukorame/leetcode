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
     * @param Integer $targetSum
     * @return Integer[][]
     */
    function pathSum($root, $targetSum) {
        $result = [];
        $currentPath = [];
        $this->dfs($root, $targetSum, $currentPath, $result);
        return $result;
    }
    
    function dfs($node, $remainingSum, $currentPath, &$result) {
        if ($node === null) return;
        
        // Add the current node to the current path
        $currentPath[] = $node->val;
        
        // Check if the current node is a leaf and if the remaining sum equals its value
        if ($node->left === null && $node->right === null && $remainingSum === $node->val) {
            $result[] = $currentPath;
            return;
        }
        
        // Recursively explore left and right subtrees
        $this->dfs($node->left, $remainingSum - $node->val, $currentPath, $result);
        $this->dfs($node->right, $remainingSum - $node->val, $currentPath, $result);
        
        // Remove the current node from the current path
        array_pop($currentPath);
    }
}
