/**
 * @param {number} dividend
 * @param {number} divisor
 * @return {number}
 */
var divide = function (dividend, divisor) {
  const isNegative = (dividend < 0 && divisor > 0) || (dividend > 0 && divisor < 0);
  const absDividend = Math.abs(dividend);
  const absDivisor = Math.abs(divisor);

  let tmp = absDivisor;
  let rem = absDividend;
  let res = 0;

  while (rem >= tmp) {
    let count = 0;
    while (rem >= tmp) {
      count += 1;
      tmp *= 10;
    }
    tmp = absDivisor;
    rem = rem - Math.pow(10, count - 1) * tmp;
    if (rem >= 0) {
      res += Math.pow(10, count - 1);
    }
  }

  if (isNegative && res >= 2147483648) {
    res = 2147483648;
  }
  if (!isNegative && res >= 2147483647) {
    res = 2147483647;
  }

  return isNegative ? -1 * res : res;
};

// Example usage:
const result1 = divide(10, 3);
console.log(result1); // Output: 3

const result2 = divide(7, -3);
console.log(result2); // Output: -2

const result3 = divide(0, 1);
console.log(result3); // Output: 0

const result4 = divide(1, 1);
console.log(result4); // Output: 1
