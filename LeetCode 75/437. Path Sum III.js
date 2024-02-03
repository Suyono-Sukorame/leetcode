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
 * @param {number} targetSum
 * @return {number}
 */
var pathSum = function (root, targetSum) {
  // Helper function for depth-first traversal
  function dfs(node, runningSum, sumMap) {
    if (!node) {
      return 0;
    }

    // Update the running sum
    runningSum += node.val;

    // Check if there are paths ending at the current node that sum to targetSum
    let count = sumMap[runningSum - targetSum] || 0;

    // Update the hashmap with the current running sum
    sumMap[runningSum] = (sumMap[runningSum] || 0) + 1;

    // Recursively explore the left and right subtrees
    count += dfs(node.left, runningSum, sumMap);
    count += dfs(node.right, runningSum, sumMap);

    // Backtrack: remove the current running sum from the hashmap
    sumMap[runningSum] -= 1;

    return count;
  }

  // Initialize the hashmap with a dummy entry to handle the root node
  const sumMap = { 0: 1 };

  // Start the depth-first traversal
  return dfs(root, 0, sumMap);
};

// Test cases
const root1 = { val: 10, left: { val: 5, left: { val: 3, left: { val: 3 }, right: { val: 2 } }, right: { val: 2, right: { val: 1 } } }, right: { val: -3, right: { val: 11 } } };
const root2 = { val: 5, left: { val: 4, left: { val: 11, left: { val: 7 }, right: { val: 2 } } }, right: { val: 8, left: { val: 13 }, right: { val: 4, left: { val: 5 }, right: { val: 1 } } } };

console.log(pathSum(root1, 8)); // Output: 3
console.log(pathSum(root2, 22)); // Output: 3
