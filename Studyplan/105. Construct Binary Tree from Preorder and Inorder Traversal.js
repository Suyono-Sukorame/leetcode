/**
 * Definition for a binary tree node.
 * function TreeNode(val, left, right) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.left = (left===undefined ? null : left)
 *     this.right = (right===undefined ? null : right)
 * }
 */

/**
 * @param {number[]} preorder
 * @param {number[]} inorder
 * @return {TreeNode}
 */
var buildTree = function (preorder, inorder) {
  if (preorder.length === 0 || inorder.length === 0) {
    return null;
  }

  const rootValue = preorder[0];
  const root = new TreeNode(rootValue);

  const rootIndexInorder = inorder.indexOf(rootValue);

  const leftInorder = inorder.slice(0, rootIndexInorder);
  const rightInorder = inorder.slice(rootIndexInorder + 1);

  const leftPreorder = preorder.slice(1, 1 + leftInorder.length);
  const rightPreorder = preorder.slice(1 + leftInorder.length);

  root.left = buildTree(leftPreorder, leftInorder);
  root.right = buildTree(rightPreorder, rightInorder);

  return root;
};
