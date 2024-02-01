/**
 * Definition for singly-linked list.
 * function ListNode(val, next) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.next = (next===undefined ? null : next)
 * }
 */

/**
 * @param {ListNode} head
 * @return {ListNode}
 */
var sortList = function (head) {
  const merge = (left, right) => {
    const dummy = new ListNode();
    let current = dummy;

    while (left && right) {
      if (left.val < right.val) {
        current.next = left;
        left = left.next;
      } else {
        current.next = right;
        right = right.next;
      }
      current = current.next;
    }

    current.next = left || right;

    return dummy.next;
  };

  const split = (start) => {
    if (!start || !start.next) {
      return start;
    }

    let slow = start;
    let fast = start.next;

    while (fast && fast.next) {
      slow = slow.next;
      fast = fast.next.next;
    }

    const mid = slow.next;
    slow.next = null;

    return mid;
  };

  const mergeSort = (head) => {
    if (!head || !head.next) {
      return head;
    }

    const mid = split(head);
    const left = mergeSort(head);
    const right = mergeSort(mid);

    return merge(left, right);
  };

  return mergeSort(head);
};

const list1 = { val: 4, next: { val: 2, next: { val: 1, next: { val: 3, next: null } } } };
console.log(sortList(list1));

const list2 = { val: -1, next: { val: 5, next: { val: 3, next: { val: 4, next: { val: 0, next: null } } } } };
console.log(sortList(list2));

const list3 = null;
console.log(sortList(list3));
