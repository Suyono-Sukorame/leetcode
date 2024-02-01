/**
 * Definition for singly-linked list.
 * function ListNode(val, next) {
 *     this.val = (val===undefined ? 0 : val);
 *     this.next = (next===undefined ? null : next);
 * }
 */
/**
 * @param {ListNode} head
 * @param {number} x
 * @return {ListNode}
 */
var partition = function (head, x) {
  const beforeDummy = new ListNode(0);
  const afterDummy = new ListNode(0);
  let before = beforeDummy;
  let after = afterDummy;

  let current = head;

  while (current) {
    if (current.val < x) {
      before.next = current;
      before = before.next;
    } else {
      after.next = current;
      after = after.next;
    }

    current = current.next;
  }

  before.next = afterDummy.next;
  after.next = null;

  return beforeDummy.next;
};
