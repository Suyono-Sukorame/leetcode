/**
 * @param {number} n
 * @return {boolean}
 */
var isHappy = function (n) {
  const seen = new Set();

  while (n !== 1 && !seen.has(n)) {
    seen.add(n);
    n = getNext(n);
  }

  return n === 1;
};

/**
 * Helper function to get the sum of squares of digits
 * @param {number} n
 * @return {number}
 */
function getNext(n) {
  let sum = 0;
  while (n > 0) {
    const digit = n % 10;
    sum += digit * digit;
    n = Math.floor(n / 10);
  }
  return sum;
}

const n1 = 19;
console.log(isHappy(n1)); // Output: true

const n2 = 2;
console.log(isHappy(n2)); // Output: false
