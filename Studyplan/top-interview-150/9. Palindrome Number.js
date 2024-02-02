/**
 * @param {number} x
 * @return {boolean}
 */
var isPalindrome = function (x) {
    if (x < 0) {
        return false;
    }

    let reversed = 0;
    let original = x;

    while (x !== 0) {
        const digit = x % 10;
        x = Math.trunc(x / 10);

        if (reversed > Math.floor((2 ** 31 - 1 - digit) / 10)) {
            return false;
        }

        reversed = reversed * 10 + digit;
    }

    return original === reversed;
};

console.log(isPalindrome(121));
console.log(isPalindrome(-121));
console.log(isPalindrome(10));
