/**
 * Definition for a binary tree node.
 * function TreeNode(val, left, right) {
 *     this.val = (val === undefined ? 0 : val);
 *     this.left = (left === undefined ? null : left);
 *     this.right = (right === undefined ? null : right);
 * }
 */

/**
 * @param {TreeNode} root
 * @return {boolean}
 */
var isValidBST = function (root) {
  // Initialize previous value as negative infinity
  let prev = -Infinity;

  // Helper function for in-order traversal
  const inOrderTraversal = function (node) {
    if (!node) {
      return true;
    }

    // Visit left subtree
    if (!inOrderTraversal(node.left)) {
      return false;
    }

    // Check current node's value
    if (node.val <= prev) {
      return false;
    }
    prev = node.val;

    // Visit right subtree
    return inOrderTraversal(node.right);
  };

  // Start in-order traversal from the root
  return inOrderTraversal(root);
};

// Example usage:
const example1 = isValidBST({
  val: 2,
  left: { val: 1 },
  right: { val: 3 },
});
console.log(example1); // Output: true

const example2 = isValidBST({
  val: 5,
  left: { val: 1 },
  right: { val: 4, left: { val: 3 }, right: { val: 6 } },
});
console.log(example2); // Output: false
