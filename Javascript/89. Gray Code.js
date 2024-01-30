/**
 * @param {number} n
 * @return {number[]}
 */
var grayCode = function (n) {
  if (n === 0) {
    return [0];
  }

  const result = [0];
  let currentBit = 1;

  for (let i = 0; i < n; i++) {
    const len = result.length;
    for (let j = len - 1; j >= 0; j--) {
      result.push(result[j] | currentBit);
    }
    currentBit <<= 1;
  }

  return result;
};

const n1 = 2;
console.log(grayCode(n1)); // Output: [0, 1, 3, 2] or [0, 2, 3, 1]

const n2 = 1;
console.log(grayCode(n2)); // Output: [0, 1]
