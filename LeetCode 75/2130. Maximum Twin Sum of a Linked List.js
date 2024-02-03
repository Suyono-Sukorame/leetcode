/**
 * Definition for singly-linked list.
 * function ListNode(val, next) {
 *     this.val = (val === undefined ? 0 : val);
 *     this.next = (next === undefined ? null : next);
 * }
 */

/**
 * @param {ListNode} head
 * @return {number}
 */
var pairSum = function (head) {
  const values = [];

  // Extract values from the linked list
  while (head !== null) {
    values.push(head.val);
    head = head.next;
  }

  const n = values.length;
  let maxTwinSum = 0;

  // Calculate twin sum for each pair of nodes
  for (let i = 0; i < n / 2; i++) {
    const twinSum = values[i] + values[n - 1 - i];
    maxTwinSum = Math.max(maxTwinSum, twinSum);
  }

  return maxTwinSum;
};
