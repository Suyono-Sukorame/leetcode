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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $l1 = $this->reverseList($l1);
        $l2 = $this->reverseList($l2);
        
        $carry = 0;
        $dummy = new ListNode(0);
        $current = $dummy;
        
        while ($l1 !== null || $l2 !== null || $carry > 0) {
            $sum = $carry;
            if ($l1 !== null) {
                $sum += $l1->val;
                $l1 = $l1->next;
            }
            if ($l2 !== null) {
                $sum += $l2->val;
                $l2 = $l2->next;
            }
            
            $carry = intval($sum / 10);
            $sum %= 10;
            $current->next = new ListNode($sum);
            $current = $current->next;
        }
        
        return $this->reverseList($dummy->next);
    }
    
    function reverseList($head) {
        $prev = null;
        $current = $head;
        
        while ($current !== null) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }
        
        return $prev;
    }
}
