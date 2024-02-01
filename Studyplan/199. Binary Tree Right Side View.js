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
 * @return {number[]}
 */
var rightSideView = function (root) {
  if (!root) {
    return [];
  }

  const result = [];
  const queue = [root];

  while (queue.length > 0) {
    const levelSize = queue.length;

    for (let i = 0; i < levelSize; i++) {
      const node = queue.shift();

      // The last element encountered at each level is the rightmost node
      if (i === levelSize - 1) {
        result.push(node.val);
      }

      if (node.left) {
        queue.push(node.left);
      }

      if (node.right) {
        queue.push(node.right);
      }
    }
  }

  return result;
};

// Example usage:
const example1 = rightSideView({
  val: 1,
  left: { val: 2, right: { val: 5 } },
  right: { val: 3, right: { val: 4 } },
});
console.log(example1); // Output: [1, 3, 4]

const example2 = rightSideView({
  val: 1,
  right: { val: 3 },
});
console.log(example2); // Output: [1, 3]

const example3 = rightSideView(null);
console.log(example3); // Output: []
