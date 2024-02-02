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
var reverseKGroup = function (head, k) {
    // Helper function to reverse a linked list
    const reverseList = (start, end) => {
        let prev = null;
        let curr = start;
        while (curr !== end) {
            const next = curr.next;
            curr.next = prev;
            prev = curr;
            curr = next;
        }
        return prev;
    };

    // Helper function to count the number of nodes
    const countNodes = (node) => {
        let count = 0;
        while (node !== null) {
            count++;
            node = node.next;
        }
        return count;
    };

    // Calculate the number of groups
    const numGroups = Math.floor(countNodes(head) / k);

    // Create a dummy node to simplify the logic
    const dummy = new ListNode(0);
    dummy.next = head;
    let prevGroupEnd = dummy;

    for (let i = 0; i < numGroups; i++) {
        // Find the start and end of the current group
        const groupStart = prevGroupEnd.next;
        let groupEnd = prevGroupEnd.next;
        for (let j = 0; j < k; j++) {
            groupEnd = groupEnd.next;
        }

        // Reverse the current group and connect it to the previous group
        prevGroupEnd.next = reverseList(groupStart, groupEnd);
        groupStart.next = groupEnd;

        // Update the pointers for the next iteration
        prevGroupEnd = groupStart;
    }

    return dummy.next;
};
