class Solution {

/**
 * @param TreeNode $root
 * @param Integer $k
 * @return Boolean
 */
function findTarget($root, $k) {
    $visited = [];
    $queue = [$root];
    
    while (!empty($queue)) {
        $node = array_shift($queue);
        $target = $k - $node->val;
        
        if (isset($visited[$target])) {
            return true;
        }
        
        $visited[$node->val] = true;
        
        if ($node->left) {
            $queue[] = $node->left;
        }
        if ($node->right) {
            $queue[] = $node->right;
        }
    }
    
    return false;
}
}
