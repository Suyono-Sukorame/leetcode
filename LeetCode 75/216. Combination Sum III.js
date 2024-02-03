/**
 * @param {number} k
 * @param {number} n
 * @return {number[][]}
 */
var combinationSum3 = function (k, n) {
  const result = [];

  const backtrack = (start, target, path) => {
    if (target === 0 && path.length === k) {
      result.push([...path]);
      return;
    }

    for (let i = start; i <= 9; i++) {
      path.push(i);
      backtrack(i + 1, target - i, path);
      path.pop();
    }
  };

  backtrack(1, n, []);

  return result;
};
