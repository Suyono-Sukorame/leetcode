/**
 * Definition for a binary tree node.
 * function TreeNode(val, left, right) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.left = (left===undefined ? null : left)
 *     this.right = (right===undefined ? null : right)
 * }
 */

/**
 * @param {number[]} inorder
 * @param {number[]} postorder
 * @return {TreeNode}
 */
var buildTree = function (inorder, postorder) {
  if (inorder.length === 0 || postorder.length === 0) {
    return null;
  }

  const rootValue = postorder.pop();
  const root = new TreeNode(rootValue);

  const rootIndexInorder = inorder.indexOf(rootValue);

  const leftInorder = inorder.slice(0, rootIndexInorder);
  const rightInorder = inorder.slice(rootIndexInorder + 1);

  root.right = buildTree(rightInorder, postorder);
  root.left = buildTree(leftInorder, postorder);

  return root;
};
