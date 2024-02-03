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
 * @param {number} key
 * @return {TreeNode}
 */
var deleteNode = function (root, key) {
  if (root === null) {
    return null; // Base case: key not found or empty tree
  }

  // If the key is smaller than the root's key, it lies in the left subtree
  if (key < root.val) {
    root.left = deleteNode(root.left, key);
  }
  // If the key is larger than the root's key, it lies in the right subtree
  else if (key > root.val) {
    root.right = deleteNode(root.right, key);
  }
  // If key is same as root's key, then this is the node to be deleted
  else {
    // Node with only one child or no child
    if (root.left === null) {
      return root.right;
    } else if (root.right === null) {
      return root.left;
    }

    // Node with two children: Get the inorder successor (smallest in the right subtree)
    root.val = minValue(root.right);

    // Delete the inorder successor
    root.right = deleteNode(root.right, root.val);
  }

  return root;
};

function minValue(root) {
  let minValue = root.val;
  while (root.left !== null) {
    minValue = root.left.val;
    root = root.left;
  }
  return minValue;
}

// Example usage:
// var root = new TreeNode(5, new TreeNode(3, new TreeNode(2), new TreeNode(4)), new TreeNode(6, null, new TreeNode(7)));
// var result = deleteNode(root, 3);
// console.log(result);
