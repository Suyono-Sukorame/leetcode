/**
 * @param {string} s1
 * @param {string} s2
 * @param {string} s3
 * @return {boolean}
 */
var isInterleave = function (s1, s2, s3) {
    if (s1.length + s2.length !== s3.length) {
        return false;
    }

    const memo = new Map();

    function dfs(i, j, k) {
        if (i === s1.length && j === s2.length && k === s3.length) {
            return true;
        }

        if (memo.has(`${i}-${j}-${k}`)) {
            return memo.get(`${i}-${j}-${k}`);
        }

        let result = false;

        if (i < s1.length && s1[i] === s3[k]) {
            result = result || dfs(i + 1, j, k + 1);
        }

        if (j < s2.length && s2[j] === s3[k]) {
            result = result || dfs(i, j + 1, k + 1);
        }

        memo.set(`${i}-${j}-${k}`, result);
        return result;
    }

    return dfs(0, 0, 0);
};

// Test cases
console.log(isInterleave("aabcc", "dbbca", "aadbbcbcac")); // Output: true
console.log(isInterleave("aabcc", "dbbca", "aadbbbaccc")); // Output: false
console.log(isInterleave("", "", "")); // Output: true
