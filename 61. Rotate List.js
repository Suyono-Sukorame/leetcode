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
        return head;
    }

    let length = 1;
    let current = head;
    while (current.next) {
        length++;
        current = current.next;
    }

    k %= length;
    if (k === 0) {
        return head;
    }

    let newTailIndex = length - k - 1;
    current.next = head;

    current = head;
    for (let i = 0; i < newTailIndex; i++) {
        current = current.next;
    }

    const newHead = current.next;
    current.next = null;

    return newHead;
};
