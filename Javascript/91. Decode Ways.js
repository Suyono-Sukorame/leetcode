/**
 * @param {string} s
 * @return {number}
 */
var numDecodings = function (s) {
  const memo = new Map();
  return decodeWays(s, 0, memo);
};

function decodeWays(s, index, memo) {
  if (memo.has(index)) {
    return memo.get(index);
  }

  if (index === s.length) {
    return 1;
  }

  if (s[index] === "0") {
    return 0;
  }

  let ways = decodeWays(s, index + 1, memo);

  if (index < s.length - 1 && isValidTwoDigit(s, index)) {
    ways += decodeWays(s, index + 2, memo);
  }

  memo.set(index, ways);

  return ways;
}

function isValidTwoDigit(s, index) {
  const twoDigit = parseInt(s.substring(index, index + 2));
  return twoDigit >= 10 && twoDigit <= 26;
}

const s1 = "12";
console.log(numDecodings(s1)); // Output: 2

const s2 = "226";
console.log(numDecodings(s2)); // Output: 3

const s3 = "06";
console.log(numDecodings(s3)); // Output: 0
