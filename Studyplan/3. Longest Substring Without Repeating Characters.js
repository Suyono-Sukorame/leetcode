/**
 * @param {string} s
 * @return {number}
 */
var lengthOfLongestSubstring = function (s) {
  let maxLength = 0;
  let start = 0;
  let charIndexMap = {};

  for (let end = 0; end < s.length; end++) {
    const currentChar = s[end];

    if (charIndexMap[currentChar] !== undefined && charIndexMap[currentChar] >= start) {
      start = charIndexMap[currentChar] + 1;
    }

    charIndexMap[currentChar] = end;

    const currentLength = end - start + 1;

    maxLength = Math.max(maxLength, currentLength);
  }

  return maxLength;
};
