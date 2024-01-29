/**
 * @param {number[]} nums
 * @return {number[][]}
 */
var subsets = function (nums) {
  var result = [];

  var generateSubsets = function (index, currentSubset) {
    result.push([...currentSubset]);

    for (var i = index; i < nums.length; i++) {
      currentSubset.push(nums[i]);

      generateSubsets(i + 1, currentSubset);

      currentSubset.pop();
    }
  };

  generateSubsets(0, []);

  return result;
};

var nums1 = [1, 2, 3];
console.log(subsets(nums1)); // Output: [[],[1],[2],[1,2],[3],[1,3],[2,3],[1,2,3]]

var nums2 = [0];
console.log(subsets(nums2)); // Output: [[],[0]]
