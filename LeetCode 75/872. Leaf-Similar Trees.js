/**
 * Definition for a binary tree node.
 * function TreeNode(val, left, right) {
 *     this.val = (val === undefined ? 0 : val);
 *     this.left = (left === undefined ? null : left);
 *     this.right = (right === undefined ? null : right);
 * }
 */

/**
 * @param {TreeNode} root1
 * @param {TreeNode} root2
 * @return {boolean}
 */
var leafSimilar = function (root1, root2) {
  const leafValues1 = [];
  const leafValues2 = [];

  // Helper function to perform depth-first traversal and collect leaf values
  function collectLeafValues(node, leafValues) {
    if (!node) {
      return;
    }

    if (!node.left && !node.right) {
      leafValues.push(node.val);
    }

    collectLeafValues(node.left, leafValues);
    collectLeafValues(node.right, leafValues);
  }

  collectLeafValues(root1, leafValues1);
  collectLeafValues(root2, leafValues2);

  // Compare the leaf value sequences
  return JSON.stringify(leafValues1) === JSON.stringify(leafValues2);
};

// Test cases
const root1 = { val: 3, left: { val: 5, left: { val: 6 }, right: { val: 2, left: { val: 7 }, right: { val: 4 } } }, right: { val: 1, left: { val: 9 }, right: { val: 8 } } };
const root2 = { val: 3, left: { val: 5, left: { val: 6 }, right: { val: 7 } }, right: { val: 1, right: { val: 4, left: { val: 9 }, right: { val: 8 } } } };

console.log(leafSimilar(root1, root2)); // Output: true
