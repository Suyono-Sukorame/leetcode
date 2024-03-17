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

    private $result = [];
    private $set = [];

    /**
     * @param TreeNode $root
     * @param Integer[] $to_delete
     * @return TreeNode[]
     */
    function delNodes($root, $to_delete) {
        foreach ($to_delete as $val) {
            $this->set[$val] = true;
        }
        
        $root = $this->dfs($root);
        
        if ($root !== null) {
            $this->result[] = $root;
        }
        
        return $this->result;
    }
    
    function dfs($node) {
        if ($node === null) return null;
        
        $node->left = $this->dfs($node->left);
        $node->right = $this->dfs($node->right);
        
        if (isset($this->set[$node->val])) {
            if ($node->left !== null) {
                $this->result[] = $node->left;
            }
            if ($node->right !== null) {
                $this->result[] = $node->right;
            }
            return null;
        }
        
        return $node;
    }
}
