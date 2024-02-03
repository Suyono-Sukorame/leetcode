/**
 * Definition for singly-linked list.
 * function ListNode(val, next) {
 *     this.val = (val === undefined ? 0 : val);
 *     this.next = (next === undefined ? null : next);
 * }
 */
/**
 * @param {ListNode} head
 * @return {ListNode}
 */
var deleteMiddle = function (head) {
  if (!head || !head.next) {
    // If the list is empty or has only one node, no middle node to delete
    return null;
  }

  let slow = head;
  let fast = head;
  let prev = null;

  // Move fast pointer twice as fast as slow pointer
  while (fast && fast.next) {
    prev = slow;
    slow = slow.next;
    fast = fast.next.next;
  }

  // Delete the middle node
  prev.next = slow.next;

  return head;
};
