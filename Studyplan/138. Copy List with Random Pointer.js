/**
 * Definition for a Node.
 */
function Node(val, next, random) {
  this.val = val;
  this.next = next || null;
  this.random = random || null;
}

/**
 * @param {Node} head
 * @return {Node}
 */
var copyRandomList = function (head) {
  if (!head) {
    return null;
  }

  // Step 1: Duplicate each node and insert it after the original node
  let current = head;
  while (current) {
    const copyNode = new Node(current.val);
    copyNode.next = current.next;
    current.next = copyNode;
    current = copyNode.next;
  }

  // Step 2: Update the random pointers of the copied nodes
  current = head;
  while (current) {
    if (current.random) {
      current.next.random = current.random.next;
    }
    current = current.next.next;
  }

  // Step 3: Separate the original and copied linked lists
  let newHead = head.next;
  let original = head;
  let copied = newHead;

  while (original) {
    original.next = original.next ? original.next.next : null;
    copied.next = copied.next ? copied.next.next : null;
    original = original.next;
    copied = copied.next;
  }

  return newHead;
};

// Example usage:
// Constructing linked list for the example
const node1 = new Node(7);
const node2 = new Node(13);
const node3 = new Node(11);
const node4 = new Node(10);
const node5 = new Node(1);

node1.next = node2;
node2.next = node3;
node3.next = node4;
node4.next = node5;

node1.random = null;
node2.random = node1;
node3.random = node5;
node4.random = node3;
node5.random = node1;

console.log(copyRandomList(node1));
