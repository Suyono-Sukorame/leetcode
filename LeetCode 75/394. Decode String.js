/**
 * @param {string} s
 * @return {string}
 */
var decodeString = function (s) {
  const stack = [];
  let currentNum = 0;
  let currentStr = "";

  for (const char of s) {
    if (char === "[") {
      stack.push(currentStr);
      stack.push(currentNum);
      currentStr = "";
      currentNum = 0;
    } else if (char === "]") {
      const num = stack.pop();
      const prevStr = stack.pop();
      currentStr = prevStr + currentStr.repeat(num);
    } else if (isDigit(char)) {
      currentNum = currentNum * 10 + parseInt(char);
    } else {
      currentStr += char;
    }
  }

  return currentStr;
};

function isDigit(char) {
  return char >= "0" && char <= "9";
}

// Test cases
console.log(decodeString("3[a]2[bc]")); // Output: "aaabcbc"
console.log(decodeString("3[a2[c]]")); // Output: "accaccacc"
console.log(decodeString("2[abc]3[cd]ef")); // Output: "abcabccdcdcdef"
