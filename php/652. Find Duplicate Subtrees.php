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
     * @return TreeNode[]
     */
    function findDuplicateSubtrees($root) {
        $result = [];
        $map = [];
        $this->dfs($root, $map, $result);
        return $result;
    }
    
    function dfs($node, &$map, &$result) {
        if ($node == null) return "#";
        
        $left = $this->dfs($node->left, $map, $result);
        $right = $this->dfs($node->right, $map, $result);
        
        $subtree = $left . ',' . $right . ',' . $node->val;
        
        if (!isset($map[$subtree])) {
            $map[$subtree] = 1;
        } elseif ($map[$subtree] == 1) {
            $result[] = $node;
            $map[$subtree]++;
        }
        
        return $subtree;
    }
}
