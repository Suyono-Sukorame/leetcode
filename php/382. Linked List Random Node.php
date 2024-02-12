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
    private $head;
    /**
     * @param ListNode $head
     */
    function __construct($head) {
        $this->head = $head;
    }
  
    /**
     * @return Integer
     */
    function getRandom() {
        $count = 0;
        $result = null;
        $current = $this->head;
        
        while ($current != null) {
            $count++;
            if (rand(1, $count) == 1) {
                $result = $current->val;
            }
            $current = $current->next;
        }
        
        return $result;
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($head);
 * $ret_1 = $obj->getRandom();
 */
