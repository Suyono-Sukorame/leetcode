/**
 * Definition for singly-linked list.
 * function ListNode(val, next) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.next = (next===undefined ? null : next)
 * }
 */
/**
 * @param {ListNode} head
 * @param {number} k
 * @return {ListNode}
 */
var rotateRight = function (head, k) {
  if (!head || k === 0) {
    return head; // No rotation needed
  }

  // Calculate the length of the linked list
  let length = 1;
  let tail = head;
  while (tail.next) {
    length++;
    tail = tail.next;
  }

  // Calculate the effective rotation amount
  k = k % length;

  // If k is zero after the modulo operation, no rotation is needed
  if (k === 0) {
    return head;
  }

  // Find the new head and tail after rotation
  let newHead = head;
  let newTail = head;
  for (let i = 0; i < length - k - 1; i++) {
    newTail = newTail.next;
  }
  newHead = newTail.next;
  newTail.next = null;
  tail.next = head;

  return newHead;
};
