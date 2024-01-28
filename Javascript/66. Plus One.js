/**
 * @param {number[]} digits
 * @return {number[]}
 */
var plusOne = function (digits) {
    const n = digits.length;

    for (let i = n - 1; i >= 0; i--) {
        digits[i]++;

        if (digits[i] > 9) {
            digits[i] = 0;
        } else {
            break;
        }
    }

    if (digits[0] === 0) {
        digits.unshift(1);
    }

    return digits;
};

console.log(plusOne([1, 2, 3]));
console.log(plusOne([4, 3, 2, 1]));
console.log(plusOne([9]));
