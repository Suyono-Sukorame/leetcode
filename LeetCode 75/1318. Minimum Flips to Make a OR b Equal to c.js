/**
 * @param {number} a
 * @param {number} b
 * @param {number} c
 * @return {number}
 */
var minFlips = function (a, b, c) {
  let flips = 0;

  while (a > 0 || b > 0 || c > 0) {
    const bitA = a & 1;
    const bitB = b & 1;
    const bitC = c & 1;

    if ((bitA | bitB) !== bitC) {
      if (bitC === 1) {
        if (bitA === 0 && bitB === 0) {
          flips++;
        } else {
          flips += 2;
        }
      } else {
        flips += (bitA === 1) + (bitB === 1);
      }
    }

    a >>= 1; // Shift a to the right
    b >>= 1; // Shift b to the right
    c >>= 1; // Shift c to the right
  }

  return flips;
};

const result1 = minFlips(2, 6, 5);
console.log(result1); // Output: 3

const result2 = minFlips(4, 2, 7);
console.log(result2); // Output: 1

const result3 = minFlips(1, 2, 3);
console.log(result3); // Output: 0
