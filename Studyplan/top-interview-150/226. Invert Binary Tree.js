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
 * @return {TreeNode}
 */
var invertTree = function (root) {
  // Base case: if the root is null, return null
  if (root === null) {
    return null;
  }

  // Swap the left and right subtrees
  const temp = root.left;
  root.left = root.right;
  root.right = temp;

  // Invert the left and right subtrees recursively
  invertTree(root.left);
  invertTree(root.right);

  // Return the inverted root
  return root;
};
