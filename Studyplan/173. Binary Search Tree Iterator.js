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
 */
var BSTIterator = function (root) {
  this.stack = [];
  this._leftmostInorder(root);
};

/**
 * Helper function to push all leftmost nodes of the tree onto the stack.
 * @param {TreeNode} root
 * @private
 */
BSTIterator.prototype._leftmostInorder = function (root) {
  while (root !== null) {
    this.stack.push(root);
    root = root.left;
  }
};

/**
 * @return {number}
 */
BSTIterator.prototype.next = function () {
  // Pop the top node from the stack
  const topmostNode = this.stack.pop();

  // If the popped node has a right subtree, add its leftmost nodes to the stack
  if (topmostNode.right !== null) {
    this._leftmostInorder(topmostNode.right);
  }

  // Return the value of the popped node
  return topmostNode.val;
};

/**
 * @return {boolean}
 */
BSTIterator.prototype.hasNext = function () {
  // If the stack is not empty, there are more elements in the in-order traversal
  return this.stack.length > 0;
};

/**
 * Your BSTIterator object will be instantiated and called as such:
 * var obj = new BSTIterator(root)
 * var param_1 = obj.next()
 * var param_2 = obj.hasNext()
 */
