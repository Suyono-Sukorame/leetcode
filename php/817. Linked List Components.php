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
     * @param Integer[] $nums
     * @return Integer
     */
    function numComponents($head, $nums) {
        $numSet = array_flip($nums);
        $components = 0;
        $connected = false;

        while ($head != null) {
            if (isset($numSet[$head->val])) {
                if (!$connected) {
                    $components++;
                    $connected = true;
                }
            } else {
                $connected = false;
            }
            $head = $head->next;
        }

        return $components;
    }
}
