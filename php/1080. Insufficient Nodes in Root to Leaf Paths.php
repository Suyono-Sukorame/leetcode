class Solution {
    function sufficientSubset($root, $limit) {
        if ($root == null) {
            return null;
        }
        
        if ($root->left == null && $root->right == null) {
            if ($root->val < $limit) {
                return null;
            }
            return $root;
        }
        
        $root->left = $this->sufficientSubset($root->left, $limit - $root->val);
        $root->right = $this->sufficientSubset($root->right, $limit - $root->val);
        
        if ($root->left == null && $root->right == null) {
            return null;
        }
        
        return $root;
    }
}
