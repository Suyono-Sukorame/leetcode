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
 * @param {number} targetSum
 * @return {boolean}
 */
var hasPathSum = function (root, targetSum) {
  // Base case: if the root is null, return false
  if (!root) {
    return false;
  }

  // If the current node is a leaf and its value matches the targetSum, return true
  if (!root.left && !root.right && root.val === targetSum) {
    return true;
  }

  // Recursively check the left and right subtrees
  return hasPathSum(root.left, targetSum - root.val) || hasPathSum(root.right, targetSum - root.val);
};
