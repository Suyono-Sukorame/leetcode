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
 * @param {number} k
 * @return {number}
 */
var kthSmallest = function (root, k) {
  let count = 0;
  let result = null;

  const inOrderTraversal = function (node) {
    if (!node || count >= k) {
      return;
    }

    inOrderTraversal(node.left);

    count++;
    if (count === k) {
      result = node.val;
      return;
    }

    inOrderTraversal(node.right);
  };

  inOrderTraversal(root);

  return result;
};

// Example usage:
const example1 = kthSmallest(
  {
    val: 3,
    left: { val: 1, right: { val: 2 } },
    right: { val: 4 },
  },
  1
);
console.log(example1); // Output: 1

const example2 = kthSmallest(
  {
    val: 5,
    left: { val: 3, left: { val: 2, left: { val: 1 } }, right: { val: 4 } },
    right: { val: 6 },
  },
  3
);
console.log(example2); // Output: 3
