class Calculator {
  /**
   * @param {number} value
   */
  constructor(value) {
    this.result = value;
  }

  /**
   * @param {number} value
   * @return {Calculator}
   */
  add(value) {
    this.result += value;
    return this;
  }

  /**
   * @param {number} value
   * @return {Calculator}
   */
  subtract(value) {
    this.result -= value;
    return this;
  }

  /**
   * @param {number} value
   * @return {Calculator}
   */
  multiply(value) {
    this.result *= value;
    return this;
  }

  /**
   * @param {number} value
   * @return {Calculator}
   */
  divide(value) {
    if (value === 0) {
      throw "Division by zero is not allowed";
    }
    this.result /= value;
    return this;
  }

  /**
   * @param {number} value
   * @return {Calculator}
   */
  power(value) {
    this.result = Math.pow(this.result, value);
    return this;
  }

  /**
   * @return {number}
   */
  getResult() {
    return this.result;
  }
}

const calculator = new Calculator(10);
const result = calculator.add(5).subtract(7).getResult();
console.log(result); // Output: 8

const calculator2 = new Calculator(2);
const result2 = calculator2.multiply(5).power(2).getResult();
console.log(result2); // Output: 100

try {
  const calculator3 = new Calculator(20);
  const result3 = calculator3.divide(0).getResult();
  console.log(result3);
} catch (error) {
  console.log(error); // Output: "Division by zero is not allowed"
}
