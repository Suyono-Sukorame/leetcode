/**
 * @param {number[]} nums
 * @return {number[][]}
 */
var permute = function (nums) {
  const generatePermutations = (currentPermutation, remainingNumbers, result) => {
    if (remainingNumbers.length === 0) {
      result.push([...currentPermutation]);
      return;
    }

    for (let i = 0; i < remainingNumbers.length; i++) {
      const currentNumber = remainingNumbers[i];

      currentPermutation.push(currentNumber);
      const remaining = remainingNumbers.slice(0, i).concat(remainingNumbers.slice(i + 1));

      generatePermutations(currentPermutation, remaining, result);

      currentPermutation.pop();
    }
  };

  const result = [];

  generatePermutations([], nums, result);

  return result;
};

const nums1 = [1, 2, 3];
console.log(permute(nums1));

const nums2 = [0, 1];
console.log(permute(nums2));

const nums3 = [1];
console.log(permute(nums3));
