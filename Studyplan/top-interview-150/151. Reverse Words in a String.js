/**
 * @param {string} s
 * @return {string}
 */
var reverseWords = function (s) {
  const words = s.trim().split(/\s+/);

  const reversedString = words.reverse().join(" ");

  return reversedString;
};

// Example usage:
console.log(reverseWords("the sky is blue")); // Output: "blue is sky the"
console.log(reverseWords("  hello world  ")); // Output: "world hello"
console.log(reverseWords("a good   example")); // Output: "example good a"
