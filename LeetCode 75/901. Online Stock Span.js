var StockSpanner = function () {
  this.prices = [];
  this.spans = [];
};

/**
 * @param {number} price
 * @return {number}
 */
StockSpanner.prototype.next = function (price) {
  let span = 1;

  while (this.prices.length > 0 && price >= this.prices[this.prices.length - 1]) {
    span += this.spans.pop();
    this.prices.pop();
  }

  this.prices.push(price);
  this.spans.push(span);

  return span;
};

const stockSpanner = new StockSpanner();
console.log(stockSpanner.next(100)); // Output: 1
console.log(stockSpanner.next(80)); // Output: 1
console.log(stockSpanner.next(60)); // Output: 1
console.log(stockSpanner.next(70)); // Output: 2
console.log(stockSpanner.next(60)); // Output: 1
console.log(stockSpanner.next(75)); // Output: 4
console.log(stockSpanner.next(85)); // Output: 6
