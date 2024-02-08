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
class Solution {

    /**
     * @param ListNode $head
     * @return Boolean
     */
    function isPalindrome($head) {
        $slow = $head;
        $fast = $head;
        
        while ($fast !== null && $fast->next !== null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        
        $prev = null;
        while ($slow !== null) {
            $nextNode = $slow->next;
            $slow->next = $prev;
            $prev = $slow;
            $slow = $nextNode;
        }
        
        $left = $head;
        $right = $prev;
        while ($right !== null) {
            if ($left->val !== $right->val) {
                return false;
            }
            $left = $left->next;
            $right = $right->next;
        }
        
        return true;
    }
}
