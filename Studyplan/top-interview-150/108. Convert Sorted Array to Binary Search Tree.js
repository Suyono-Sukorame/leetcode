/**
 * Definition for a binary tree node.
 * function TreeNode(val, left, right) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.left = (left===undefined ? null : left)
 *     this.right = (right===undefined ? null : right)
 * }
 */

/**
 * @param {number[]} nums
 * @return {TreeNode}
 */
var sortedArrayToBST = function (nums) {
  const buildBST = (left, right) => {
    if (left > right) {
      return null;
    }

    const mid = Math.floor((left + right) / 2);
    const root = new TreeNode(nums[mid]);

    root.left = buildBST(left, mid - 1);
    root.right = buildBST(mid + 1, right);

    return root;
  };

  return buildBST(0, nums.length - 1);
};

const nums1 = [-10, -3, 0, 5, 9];
console.log(sortedArrayToBST(nums1));

const nums2 = [1, 3];
console.log(sortedArrayToBST(nums2));
