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
     * @return String[]
     */
    function binaryTreePaths($root) {
        $paths = [];
        $this->dfs($root, "", $paths);
        return $paths;
    }
    
    function dfs($node, $path, &$paths) {
        if ($node == null) return;
        
        $path .= strval($node->val);
        
        if ($node->left == null && $node->right == null) {
            $paths[] = $path;
        } else {
            $path .= "->";
            $this->dfs($node->left, $path, $paths);
            $this->dfs($node->right, $path, $paths);
        }
    }
}
