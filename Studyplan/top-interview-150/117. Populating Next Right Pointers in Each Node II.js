/**
 * // Definition for a Node.
 * function Node(val, left, right, next) {
 *    this.val = val === undefined ? null : val;
 *    this.left = left === undefined ? null : left;
 *    this.right = right === undefined ? null : right;
 *    this.next = next === undefined ? null : next;
 * };
 */

/**
 * @param {Node} root
 * @return {Node}
 */
var connect = function (root) {
  if (!root) {
    return root;
  }

  // Helper function to connect two nodes at the same level
  const connectTwoNodes = (node1, node2) => {
    if (!node1 || !node2) {
      return;
    }
    node1.next = node2;
    connectTwoNodes(node1.right, node2.left);
  };

  // Helper function to connect nodes at the next level
  const connectNextLevel = (startNode) => {
    let current = startNode;
    let nextLevelStart = null;

    while (current) {
      if (current.left) {
        if (!nextLevelStart) {
          nextLevelStart = current.left;
        }
        if (current.right) {
          current.left.next = current.right;
        } else {
          current.left.next = findNextNode(current.next);
        }
      }
      if (current.right) {
        if (!nextLevelStart) {
          nextLevelStart = current.right;
        }
        current.right.next = findNextNode(current.next);
      }
      current = current.next;
    }

    return nextLevelStart;
  };

  // Helper function to find the next node in the same level
  const findNextNode = (node) => {
    while (node) {
      if (node.left) {
        return node.left;
      }
      if (node.right) {
        return node.right;
      }
      node = node.next;
    }
    return null;
  };

  // Connect nodes level by level starting from the root
  let startNode = root;
  while (startNode) {
    startNode = connectNextLevel(startNode);
  }

  return root;
};
