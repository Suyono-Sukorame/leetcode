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
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function constructFromPrePost($preorder, $postorder) {
        return $this->constructFromPrePostHelper($preorder, $postorder, 0, count($preorder) - 1, 0, count($postorder) - 1);
    }
    
    function constructFromPrePostHelper($preorder, $postorder, $preStart, $preEnd, $postStart, $postEnd) {
        if ($preStart > $preEnd || $postStart > $postEnd) return null;
        
        $root = new TreeNode($preorder[$preStart]);
        
        if ($preStart == $preEnd) return $root;
        
        $leftValue = $preorder[$preStart + 1];
        $leftIndexPost = array_search($leftValue, $postorder);
        $leftLength = $leftIndexPost - $postStart + 1;
        
        $root->left = $this->constructFromPrePostHelper($preorder, $postorder, $preStart + 1, $preStart + $leftLength, $postStart, $leftIndexPost);
        $root->right = $this->constructFromPrePostHelper($preorder, $postorder, $preStart + $leftLength + 1, $preEnd, $leftIndexPost + 1, $postEnd - 1);
        
        return $root;
    }
}
