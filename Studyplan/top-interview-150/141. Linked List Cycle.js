/**
 * Definition for singly-linked list.
 * function ListNode(val) {
 *     this.val = val;
 *     this.next = null;
 * }
 */

/**
 * @param {ListNode} head
 * @return {boolean}
 */
var hasCycle = function (head) {
  if (!head || !head.next) {
    return false;
  }

  let slow = head;
  let fast = head.next;

  while (slow !== fast) {
    if (!fast || !fast.next) {
      return false;
    }

    slow = slow.next;
    fast = fast.next.next;
  }

  return true;
};

const node1 = { val: 3, next: null };
const node2 = { val: 2, next: null };
const node3 = { val: 0, next: null };
const node4 = { val: -4, next: null };

node1.next = node2;
node2.next = node3;
node3.next = node4;
node4.next = node2; // Creating a cycle

console.log(hasCycle(node1)); // Output: true
