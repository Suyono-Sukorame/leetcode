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
     * @param Integer $k
     * @return ListNode[]
     */
    function splitListToParts($head, $k) {
        $length = 0;
        $current = $head;
        
        while ($current !== null) {
            $length++;
            $current = $current->next;
        }
        
        $partSize = floor($length / $k);
        $extraNodes = $length % $k;
        
        $result = [];
        $current = $head;
        
        for ($i = 0; $i < $k; $i++) {
            $partHead = $current;
            $partLength = $partSize + ($i < $extraNodes ? 1 : 0);
            
            for ($j = 0; $j < $partLength - 1 && $current !== null; $j++) {
                $current = $current->next;
            }
            
            if ($current !== null) {
                $nextNode = $current->next;
                $current->next = null;
                $current = $nextNode;
            }
            
            $result[] = $partHead;
        }
        
        return $result;
    }
}
