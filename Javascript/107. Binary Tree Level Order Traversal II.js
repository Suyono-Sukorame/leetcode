// Definition for a binary tree node.
class TreeNode {
  constructor(val) {
    this.val = val;
    this.left = this.right = null;
  }
}

/**
 * Returns the bottom-up level order traversal of binary tree nodes' values.
 * @param {TreeNode} root - Binary tree root.
 * @return {number[][]} - The bottom-up level order traversal of nodes' values.
 */
var levelOrderBottom = function (root) {
  if (!root) {
    return [];
  }

  let ans = [];
  let queue = [root];

  while (queue.length > 0) {
    let level = [];
    const levelSize = queue.length;

    for (let i = 0; i < levelSize; i++) {
      const node = queue.shift();
      level.push(node.val);

      if (node.left) {
        queue.push(node.left);
      }

      if (node.right) {
        queue.push(node.right);
      }
    }

    ans.unshift(level);
  }

  return ans;
};

// Example usage:
const root1 = new TreeNode(3);
root1.left = new TreeNode(9);
root1.right = new TreeNode(20);
root1.right.left = new TreeNode(15);
root1.right.right = new TreeNode(7);

console.log(levelOrderBottom(root1));
// Output: [[15,7],[9,20],[3]]

const root2 = new TreeNode(1);
console.log(levelOrderBottom(root2));
// Output: [[1]]

const root3 = null;
console.log(levelOrderBottom(root3));
// Output: []
