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
var maxPathSum = function (root) {
    let maxSum = Number.MIN_SAFE_INTEGER;

    // Helper function to calculate the maximum path sum at a node
    const maxPathSumAtNode = function (node) {
        if (node === null) {
            return 0;
        }

        // Calculate the maximum path sum in the left and right subtrees
        const leftSum = Math.max(maxPathSumAtNode(node.left), 0);
        const rightSum = Math.max(maxPathSumAtNode(node.right), 0);

        // Update the maximum path sum including the current node
        const currentSum = node.val + leftSum + rightSum;
        maxSum = Math.max(maxSum, currentSum);

        // Return the maximum path sum that can be extended from the current node
        return node.val + Math.max(leftSum, rightSum);
    };

    // Start the recursive calculation
    maxPathSumAtNode(root);

    return maxSum;
};
