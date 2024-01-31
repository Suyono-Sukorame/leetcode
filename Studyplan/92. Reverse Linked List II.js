/**
 * Definition for singly-linked list.
 * function ListNode(val, next) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.next = (next===undefined ? null : next)
 * }
 */
/**
 * @param {ListNode} head
 * @param {number} left
 * @param {number} right
 * @return {ListNode}
 */
var reverseBetween = function (head, left, right) {
  if (!head || left === right) {
    return head;
  }

  let dummy = new ListNode(0);
  dummy.next = head;
  let pre = dummy;

  for (let i = 0; i < left - 1; i++) {
    pre = pre.next;
  }

  let current = pre.next;
  let next = null;

  for (let i = 0; i < right - left + 1; i++) {
    let temp = current.next;
    current.next = next;
    next = current;
    current = temp;
  }

  pre.next.next = current;
  pre.next = next;

  return dummy.next;
};

function ListNode(val, next) {
  this.val = val === undefined ? 0 : val;
  this.next = next === undefined ? null : next;
}

const head = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(5)))));

const left = 2,
  right = 4;
const reversedList = reverseBetween(head, left, right);

let current = reversedList;
while (current !== null) {
  console.log(current.val);
  current = current.next;
}
