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
 * @return {number}
 */
var countNodes = function (root) {
  if (!root) {
    return 0;
  }

  // Helper function to calculate the height of a binary tree
  const getHeight = function (node) {
    let height = 0;
    while (node) {
      height++;
      node = node.left;
    }
    return height;
  };

  const leftHeight = getHeight(root.left);
  const rightHeight = getHeight(root.right);

  if (leftHeight === rightHeight) {
    // The left subtree is a perfect binary tree
    // The number of nodes is 2^leftHeight - 1 + 1 (root node)
    return (1 << leftHeight) + countNodes(root.right);
  } else {
    // The right subtree is a perfect binary tree
    // The number of nodes is 2^rightHeight - 1 + 1 (root node)
    return (1 << rightHeight) + countNodes(root.left);
  }
};

// Example usage:
const example1 = countNodes({
  val: 1,
  left: { val: 2, left: { val: 4 }, right: { val: 5 } },
  right: { val: 3, left: { val: 6 } },
});
console.log(example1); // Output: 6

const example2 = countNodes(null);
console.log(example2); // Output: 0

const example3 = countNodes({ val: 1 });
console.log(example3); // Output: 1
