/**
 * @param {number[]} nums
 * @return {number[][]}
 */
var subsetsWithDup = function (nums) {
  nums.sort((a, b) => a - b);
  const result = [];
  generateSubsets(nums, 0, [], result);
  return result;
};

function generateSubsets(nums, index, currentSubset, result) {
  result.push([...currentSubset]);

  for (let i = index; i < nums.length; i++) {
    if (i > index && nums[i] === nums[i - 1]) {
      continue;
    }

    currentSubset.push(nums[i]);
    generateSubsets(nums, i + 1, currentSubset, result);
    currentSubset.pop();
  }
}

const nums1 = [1, 2, 2];
console.log(subsetsWithDup(nums1));

const nums2 = [0];
console.log(subsetsWithDup(nums2));
