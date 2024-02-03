/**
 * Definition for a binary tree node.
 * function TreeNode(val, left, right) {
 *     this.val = (val === undefined ? 0 : val);
 *     this.left = (left === undefined ? null : left);
 *     this.right = (right === undefined ? null : right);
 * }
 */

/**
 * @param {TreeNode} root
 * @return {number}
 */
var maxLevelSum = function (root) {
  if (!root) {
    return 0;
  }

  let maxLevel = 1;
  let maxSum = root.val;

  const queue = [root];
  let level = 1;

  while (queue.length > 0) {
    const size = queue.length;
    let currentSum = 0;

    for (let i = 0; i < size; i++) {
      const node = queue.shift();
      currentSum += node.val;

      if (node.left) {
        queue.push(node.left);
      }
      if (node.right) {
        queue.push(node.right);
      }
    }

    if (currentSum > maxSum) {
      maxSum = currentSum;
      maxLevel = level;
    }

    level++;
  }

  return maxLevel;
};
