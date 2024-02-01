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
 * @return {number}
 */
var getMinimumDifference = function (root) {
  let minDiff = Infinity;
  let prevValue = -1;

  const inOrderTraversal = function (node) {
    if (!node) {
      return;
    }

    inOrderTraversal(node.left);

    if (prevValue !== -1) {
      minDiff = Math.min(minDiff, node.val - prevValue);
    }

    prevValue = node.val;

    inOrderTraversal(node.right);
  };

  inOrderTraversal(root);

  return minDiff;
};

// Example usage:
const example1 = getMinimumDifference({
  val: 4,
  left: { val: 2, left: { val: 1 }, right: { val: 3 } },
  right: { val: 6 },
});
console.log(example1); // Output: 1

const example2 = getMinimumDifference({
  val: 1,
  left: { val: 0 },
  right: { val: 48, left: { val: 12 }, right: { val: 49 } },
});
console.log(example2); // Output: 1
