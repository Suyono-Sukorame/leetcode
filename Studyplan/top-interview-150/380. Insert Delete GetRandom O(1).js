var RandomizedSet = function () {
  this.values = [];
  this.valueToIndex = new Map();
};

/**
 * @param {number} val
 * @return {boolean}
 */
RandomizedSet.prototype.insert = function (val) {
  if (this.valueToIndex.has(val)) {
    return false;
  }

  this.values.push(val);
  this.valueToIndex.set(val, this.values.length - 1);
  return true;
};

/**
 * @param {number} val
 * @return {boolean}
 */
RandomizedSet.prototype.remove = function (val) {
  if (!this.valueToIndex.has(val)) {
    return false;
  }

  const indexToRemove = this.valueToIndex.get(val);
  const lastValue = this.values[this.values.length - 1];

  this.values[indexToRemove] = lastValue;
  this.valueToIndex.set(lastValue, indexToRemove);

  this.values.pop();
  this.valueToIndex.delete(val);

  return true;
};

/**
 * @return {number}
 */
RandomizedSet.prototype.getRandom = function () {
  const randomIndex = Math.floor(Math.random() * this.values.length);
  return this.values[randomIndex];
};

/**
 * Your RandomizedSet object will be instantiated and called as such:
 * var obj = new RandomizedSet()
 * var param_1 = obj.insert(val)
 * var param_2 = obj.remove(val)
 * var param_3 = obj.getRandom()
 */

// Example usage:
var randomizedSet = new RandomizedSet();
console.log(randomizedSet.insert(1)); // Output: true
console.log(randomizedSet.remove(2)); // Output: false
console.log(randomizedSet.insert(2)); // Output: true
console.log(randomizedSet.getRandom()); // Output: Random element from [1, 2]
console.log(randomizedSet.remove(1)); // Output: true
console.log(randomizedSet.insert(2)); // Output: false
console.log(randomizedSet.getRandom()); // Output: 2
