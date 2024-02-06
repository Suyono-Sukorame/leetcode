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
     * @return ListNode
     */
    function insertionSortList($head) {
        if ($head === null || $head->next === null) {
            return $head;
        }
        
        $dummy = new ListNode();
        $dummy->next = $head;
        $lastSorted = $head;
        $current = $head->next;
        
        while ($current !== null) {
            if ($lastSorted->val <= $current->val) {
                $lastSorted = $lastSorted->next;
            } else {
                $prev = $dummy;
                while ($prev->next->val <= $current->val) {
                    $prev = $prev->next;
                }
                $lastSorted->next = $current->next;
                $current->next = $prev->next;
                $prev->next = $current;
            }
            $current = $lastSorted->next;
        }
        
        return $dummy->next;
    }
}
