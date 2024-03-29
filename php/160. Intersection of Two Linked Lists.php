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
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    function getIntersectionNode($headA, $headB) {
        $currA = $headA;
        $currB = $headB;
        
        while ($currA !== $currB) {
            if ($currA === null) {
                $currA = $headB;
            } else {
                $currA = $currA->next;
            }
            
            if ($currB === null) {
                $currB = $headA;
            } else {
                $currB = $currB->next;
            }
        }
        
        return $currA;
    }
}
