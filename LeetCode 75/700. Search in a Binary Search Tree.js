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
 * @param {number} val
 * @return {TreeNode}
 */
var searchBST = function (root, val) {
  // Base case: if the root is null or the current node's value is equal to the target value
  if (root === null || root.val === val) {
    return root;
  }

  // If the target value is less than the current node's value, search in the left subtree
  if (val < root.val) {
    return searchBST(root.left, val);
  }

  // If the target value is greater than the current node's value, search in the right subtree
  return searchBST(root.right, val);
};

// Example usage:
// var root = new TreeNode(4, new TreeNode(2, new TreeNode(1), new TreeNode(3)), new TreeNode(7));
// var result = searchBST(root, 2);
// console.log(result);
