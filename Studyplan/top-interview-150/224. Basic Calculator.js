/**
 * @param {string} s
 * @return {number}
 */
var calculate = function (s) {
  const stack = [];
  let currentNumber = 0;
  let result = 0;
  let sign = 1; // 1 represents '+', -1 represents '-'

  for (let i = 0; i < s.length; i++) {
    const char = s[i];

    if (char >= "0" && char <= "9") {
      currentNumber = currentNumber * 10 + parseInt(char);
    } else if (char === "+") {
      result += sign * currentNumber;
      currentNumber = 0;
      sign = 1;
    } else if (char === "-") {
      result += sign * currentNumber;
      currentNumber = 0;
      sign = -1;
    } else if (char === "(") {
      stack.push(result);
      stack.push(sign);
      result = 0;
      sign = 1;
    } else if (char === ")") {
      result += sign * currentNumber;
      currentNumber = 0;
      result *= stack.pop(); // Previous sign
      result += stack.pop(); // Previous result
    }
  }

  result += sign * currentNumber;

  return result;
};

// Example usage:
console.log(calculate("1 + 1")); // Output: 2
console.log(calculate(" 2-1 + 2 ")); // Output: 3
console.log(calculate("(1+(4+5+2)-3)+(6+8)")); // Output: 23
