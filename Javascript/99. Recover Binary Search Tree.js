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
 * @return {void}
 */
var recoverTree = function (root) {
  let firstNode = null;
  let secondNode = null;
  let prevNode = new TreeNode(-Infinity);

  const inorderTraversal = (node) => {
    if (!node) {
      return;
    }

    inorderTraversal(node.left);

    if (node.val <= prevNode.val) {
      if (!firstNode) {
        firstNode = prevNode;
      }
      secondNode = node;
    }

    prevNode = node;

    inorderTraversal(node.right);
  };

  inorderTraversal(root);

  const temp = firstNode.val;
  firstNode.val = secondNode.val;
  secondNode.val = temp;
};
