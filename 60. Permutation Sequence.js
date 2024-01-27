/**
 * @param {number} n
 * @param {number} k
 * @return {string}
 */
var getPermutation = function (n, k) {
    const numbers = Array.from({ length: n }, (_, index) => index + 1);

    const factorials = [1];
    for (let i = 1; i <= n; i++) {
        factorials[i] = factorials[i - 1] * i;
    }

    k--;

    let result = '';
    for (let i = 1; i <= n; i++) {
        const index = Math.floor(k / factorials[n - i]);
        result += numbers.splice(index, 1)[0].toString();
        k %= factorials[n - i];
    }

    return result;
};

console.log(getPermutation(3, 3));
console.log(getPermutation(4, 9));
console.log(getPermutation(3, 1));
