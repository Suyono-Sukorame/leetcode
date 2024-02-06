/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) {
        if ($root === null || $root->left === null) {
            return $root;
        }
        
        $this->connectTwoNodes($root->left, $root->right);
        return $root;
    }
    
    public function connectTwoNodes($node1, $node2) {
        if ($node1 === null || $node2 === null) {
            return;
        }
        
        // Connect the nodes at the same level
        $node1->next = $node2;
        
        // Recursively connect the nodes in the left and right subtrees
        $this->connectTwoNodes($node1->left, $node1->right);
        $this->connectTwoNodes($node2->left, $node2->right);
        
        // Connect nodes between the left and right subtrees
        $this->connectTwoNodes($node1->right, $node2->left);
    }
}
