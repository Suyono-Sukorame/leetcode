/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
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
     * @param ListNode $head
     * @return TreeNode
     */
    function sortedListToBST($head) {
        if ($head == null) return null;
        
        return $this->toBST($head, null);
    }
    
    function toBST($head, $tail) {
        $slow = $head;
        $fast = $head;
        
        if ($head === $tail) return null;
        
        while ($fast !== $tail && $fast->next !== $tail) {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        
        $node = new TreeNode($slow->val);
        $node->left = $this->toBST($head, $slow);
        $node->right = $this->toBST($slow->next, $tail);
        
        return $node;
    }
}
