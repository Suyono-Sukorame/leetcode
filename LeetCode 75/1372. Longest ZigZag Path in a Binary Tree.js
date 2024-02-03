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
var longestZigZag = function (root) {
  const Direction = {
    left: "left",
    right: "right",
  };

  let longestLength = 0;

  function findLongest(node, direction, length) {
    if (!node) {
      return;
    }

    longestLength = Math.max(longestLength, length);

    if (direction === Direction.left) {
      findLongest(node.left, Direction.left, 1);
      findLongest(node.right, Direction.right, length + 1);
    } else {
      findLongest(node.left, Direction.left, length + 1);
      findLongest(node.right, Direction.right, 1);
    }
  }

  if (root) {
    findLongest(root.left, Direction.left, 1);
    findLongest(root.right, Direction.right, 1);
  }

  return longestLength;
};

// Test case
const root = {
  val: 1,
  left: null,
  right: {
    val: 1,
    left: {
      val: 1,
      left: null,
      right: {
        val: 1,
        left: null,
        right: {
          val: 1,
          left: null,
          right: null,
        },
      },
    },
    right: {
      val: 1,
      left: {
        val: 1,
        left: null,
        right: {
          val: 1,
          left: null,
          right: null,
        },
      },
      right: null,
    },
  },
};

console.log(longestZigZag(root)); // Output: 3
