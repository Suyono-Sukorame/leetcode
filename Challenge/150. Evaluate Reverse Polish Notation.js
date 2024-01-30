/**
 * @param {string[]} tokens
 * @return {number}
 */
var evalRPN = function (tokens) {
  const stack = [];

  for (const token of tokens) {
    if (isOperator(token)) {
      const operand2 = stack.pop();
      const operand1 = stack.pop();
      const result = performOperation(operand1, operand2, token);
      stack.push(result);
    } else {
      stack.push(parseInt(token));
    }
  }

  return stack.pop();
};

function isOperator(token) {
  return token === "+" || token === "-" || token === "*" || token === "/";
}

function performOperation(operand1, operand2, operator) {
  switch (operator) {
    case "+":
      return operand1 + operand2;
    case "-":
      return operand1 - operand2;
    case "*":
      return operand1 * operand2;
    case "/":
      return Math.trunc(operand1 / operand2);
  }
}

const tokens1 = ["2", "1", "+", "3", "*"];
console.log(evalRPN(tokens1)); // Output: 9

const tokens2 = ["4", "13", "5", "/", "+"];
console.log(evalRPN(tokens2)); // Output: 6

const tokens3 = ["10", "6", "9", "3", "+", "-11", "*", "/", "*", "17", "+", "5", "+"];
console.log(evalRPN(tokens3)); // Output: 22
