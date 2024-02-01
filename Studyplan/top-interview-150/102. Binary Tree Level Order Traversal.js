/**
 * Definition for a binary tree node.
 * function TreeNode(val, left, right) {
 *     this.val = (val === undefined ? 0 : val)
 *     this.left = (left === undefined ? null : left)
 *     this.right = (right === undefined ? null : right)
 * }
 */

/**
 * @param {TreeNode} root
 * @return {number[][]}
 */
var levelOrder = function (root) {
  if (!root) {
    return [];
  }

  const result = [];
  const queue = [root];

  while (queue.length > 0) {
    const levelSize = queue.length;
    const currentLevel = [];

    for (let i = 0; i < levelSize; i++) {
      const node = queue.shift();
      currentLevel.push(node.val);

      if (node.left) {
        queue.push(node.left);
      }

      if (node.right) {
        queue.push(node.right);
      }
    }

    result.push(currentLevel);
  }

  return result;
};

// Example usage:
const example1 = levelOrder({
  val: 3,
  left: { val: 9 },
  right: { val: 20, left: { val: 15 }, right: { val: 7 } },
});
console.log(example1); // Output: [[3],[9,20],[15,7]]

const example2 = levelOrder({
  val: 1,
  left: null,
  right: null,
});
console.log(example2); // Output: [[1]]

const example3 = levelOrder(null);
console.log(example3); // Output: []
