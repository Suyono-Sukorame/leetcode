/**
 * Definition for a binary tree node.
 * function TreeNode(val) {
 *     this.val = val;
 *     this.left = this.right = null;
 * }
 */
/**
 * @param {TreeNode} root
 * @param {TreeNode} p
 * @param {TreeNode} q
 * @return {TreeNode}
 */
var lowestCommonAncestor = function (root, p, q) {
  // Base case: if the current node is null or equal to p or q, return the current node
  if (!root || root === p || root === q) {
    return root;
  }

  // Recursively search for the LCA in the left and right subtrees
  const leftLCA = lowestCommonAncestor(root.left, p, q);
  const rightLCA = lowestCommonAncestor(root.right, p, q);

  // If both left and right subtrees have an LCA, then the current node is the LCA
  if (leftLCA && rightLCA) {
    return root;
  }

  // If only one subtree has an LCA, return that LCA
  return leftLCA || rightLCA;
};

// Example usage:
const example1 = lowestCommonAncestor(
  {
    val: 3,
    left: { val: 5, left: { val: 6 }, right: { val: 2, left: { val: 7 }, right: { val: 4 } } },
    right: { val: 1, left: { val: 0 }, right: { val: 8 } },
  },
  { val: 5 },
  { val: 1 }
);
console.log(example1); // Output: { val: 3, ... }

const example2 = lowestCommonAncestor(
  {
    val: 3,
    left: { val: 5, left: { val: 6 }, right: { val: 2, left: { val: 7 }, right: { val: 4 } } },
    right: { val: 1, left: { val: 0 }, right: { val: 8 } },
  },
  { val: 5 },
  { val: 4 }
);
console.log(example2); // Output: { val: 5, ... }

const example3 = lowestCommonAncestor(
  {
    val: 1,
    left: { val: 2 },
    right: null,
  },
  { val: 1 },
  { val: 2 }
);
console.log(example3); // Output: { val: 1, ... }
