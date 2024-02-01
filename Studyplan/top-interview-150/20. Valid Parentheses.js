/**
 * @param {string} s
 * @return {boolean}
 */
var isValid = function (s) {
  const stack = [];
  const parenthesesMap = {
    ")": "(",
    "}": "{",
    "]": "[",
  };

  for (let i = 0; i < s.length; i++) {
    const currentChar = s[i];

    if (parenthesesMap[currentChar]) {
      // Closing bracket
      const topElement = stack.length === 0 ? "#" : stack.pop();

      if (topElement !== parenthesesMap[currentChar]) {
        return false; // Mismatched brackets
      }
    } else {
      // Opening bracket
      stack.push(currentChar);
    }
  }

  return stack.length === 0; // True if all brackets are closed properly
};

// Example usage:
console.log(isValid("()")); // Output: true
console.log(isValid("()[]{}")); // Output: true
console.log(isValid("(]")); // Output: false
