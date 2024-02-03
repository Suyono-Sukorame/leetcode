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
 * @return {number}
 */
var goodNodes = function (root) {
  if (!root) {
    return 0;
  }

  // Helper function to perform depth-first traversal and count good nodes
  function countGoodNodes(node, maxValue) {
    if (!node) {
      return 0;
    }

    // Check if the current node is a good node
    const isGoodNode = node.val >= maxValue;

    // Update the maximum value encountered so far
    maxValue = Math.max(maxValue, node.val);

    // Recursively count good nodes in the left and right subtrees
    const leftCount = countGoodNodes(node.left, maxValue);
    const rightCount = countGoodNodes(node.right, maxValue);

    // Return the total count of good nodes
    return isGoodNode ? 1 + leftCount + rightCount : leftCount + rightCount;
  }

  return countGoodNodes(root, root.val);
};

// Test cases
const root1 = { val: 3, left: { val: 1, left: { val: 3 }, right: { val: 4 } }, right: { val: 4, right: { val: 5 } } };
const root2 = { val: 3, left: { val: 3, right: { val: 4, left: { val: 2 } } } };

console.log(goodNodes(root1)); // Output: 4
console.log(goodNodes(root2)); // Output: 3
