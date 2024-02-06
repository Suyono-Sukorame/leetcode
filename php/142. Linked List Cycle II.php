/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function detectCycle($head) {
        if ($head == null || $head->next == null) {
            return null;
        }
        
        $slow = $head;
        $fast = $head;
        $hasCycle = false;
        
        while ($fast != null && $fast->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
            if ($slow === $fast) {
                $hasCycle = true;
                break;
            }
        }
        
        if (!$hasCycle) {
            return null;
        }
        
        $slow = $head;
        while ($slow !== $fast) {
            $slow = $slow->next;
            $fast = $fast->next;
        }
        
        return $slow;
    }
}
