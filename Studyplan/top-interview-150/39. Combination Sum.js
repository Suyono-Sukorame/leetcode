/**
 * @param {number[]} candidates
 * @param {number} target
 * @return {number[][]}
 */
var combinationSum = function (candidates, target) {
  const result = [];

  const backtrack = (currentCombination, remainingTarget, start) => {
    if (remainingTarget === 0) {
      result.push([...currentCombination]);
      return;
    }

    for (let i = start; i < candidates.length; i++) {
      if (candidates[i] <= remainingTarget) {
        currentCombination.push(candidates[i]);
        backtrack(currentCombination, remainingTarget - candidates[i], i);
        currentCombination.pop();
      }
    }
  };

  backtrack([], target, 0);

  return result;
};

// Example usage:
console.log(combinationSum([2, 3, 6, 7], 7)); // Output: [[2, 2, 3], [7]]
console.log(combinationSum([2, 3, 5], 8)); // Output: [[2, 2, 2, 2], [2, 3, 3], [3, 5]]
console.log(combinationSum([2], 1)); // Output: []
