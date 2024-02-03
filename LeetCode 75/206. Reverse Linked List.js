/**
 * Definition for singly-linked list.
 * function ListNode(val, next) {
 *     this.val = (val === undefined ? 0 : val);
 *     this.next = (next === undefined ? null : next);
 * }
 */

/**
 * Iterative Solution
 * @param {ListNode} head
 * @return {ListNode}
 */
var reverseList = function (head) {
  let prev = null;
  let current = head;

  while (current !== null) {
    let nextNode = current.next;
    current.next = prev;
    prev = current;
    current = nextNode;
  }

  return prev;
};

/**
 * Recursive Solution
 * @param {ListNode} head
 * @return {ListNode}
 */
var reverseListRecursive = function (head) {
  if (head === null || head.next === null) {
    return head;
  }

  let reversedList = reverseListRecursive(head.next);
  head.next.next = head;
  head.next = null;

  return reversedList;
};
