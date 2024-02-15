/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

class Codec {
    
    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root) {
        if ($root === null) return '';
        return $root->val . ',' . $this->serialize($root->left) . ',' . $this->serialize($root->right);
    }
  
    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data) {
        if ($data === '') return null;
        $arr = explode(',', $data);
        return $this->buildTree($arr);
    }
    
    function buildTree(&$arr) {
        if (empty($arr)) return null;
        $val = array_shift($arr);
        if ($val === '') return null;
        $root = new TreeNode(intval($val));
        $root->left = $this->buildTree($arr);
        $root->right = $this->buildTree($arr);
        return $root;
    }
}
