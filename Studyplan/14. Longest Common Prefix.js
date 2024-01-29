/**
 * @param {string[]} strs
 * @return {string}
 */
var longestCommonPrefix = function (strs) {
  if (strs.length === 0) {
    return "";
  }

  let prefix = "";
  const minLength = Math.min(...strs.map((str) => str.length));

  for (let i = 0; i < minLength; i++) {
    const currentChar = strs[0][i];

    if (strs.every((str) => str[i] === currentChar)) {
      prefix += currentChar;
    } else {
      break;
    }
  }

  return prefix;
};

console.log(longestCommonPrefix(["flower", "flow", "flight"])); // Output: "fl"
console.log(longestCommonPrefix(["dog", "racecar", "car"])); // Output: ""
