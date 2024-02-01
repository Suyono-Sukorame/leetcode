/**
 * Definition for a binary tree node.
 * function TreeNode(val, left, right) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.left = (left===undefined ? null : left)
 *     this.right = (right===undefined ? null : right)
 * }
 */

/**
 * @param {TreeNode} root
 * @return {number}
 */
var sumNumbers = function (root) {
  // Helper function to calculate the sum of root-to-leaf numbers
  const calculateSum = (node, currentSum) => {
    if (!node) {
      return 0;
    }

    // Calculate the current sum for the current node
    const newSum = currentSum * 10 + node.val;

    // If the current node is a leaf, return its value
    if (!node.left && !node.right) {
      return newSum;
    }

    // Recursively calculate the sum for the left and right subtrees
    const leftSum = calculateSum(node.left, newSum);
    const rightSum = calculateSum(node.right, newSum);

    // Return the total sum for the current subtree
    return leftSum + rightSum;
  };

  // Start the calculation from the root
  return calculateSum(root, 0);
};
