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
 * @return {void} Do not return anything, modify root in-place instead.
 */
var flatten = function (root) {
  // Base case: if the root is null, return
  if (!root) {
    return;
  }

  // Helper function to flatten the binary tree
  const flattenTree = (node) => {
    if (!node) {
      return;
    }

    // Recursively flatten the left and right subtrees
    flattenTree(node.left);
    flattenTree(node.right);

    // Store the right subtree in a temporary variable
    const tempRight = node.right;

    // Attach the left subtree to the right of the current node
    node.right = node.left;
    node.left = null;

    // Move to the end of the current right subtree
    let current = node;
    while (current.right !== null) {
      current = current.right;
    }

    // Attach the original right subtree to the end of the modified right subtree
    current.right = tempRight;
  };

  // Start the flattening process from the root
  flattenTree(root);
};
