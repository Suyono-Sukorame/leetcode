/**
 * @param {integer} init
 * @return {Object}
 */
var createCounter = function (init) {
    let currentValue = init;

    return {
        increment: function () {
            currentValue++;
            return currentValue;
        },
        decrement: function () {
            currentValue--;
            return currentValue;
        },
        reset: function () {
            currentValue = init;
            return currentValue;
        }
    };
};

/**
 * Examples:
 */
const counter1 = createCounter(5);
console.log(counter1.increment()); // 6
console.log(counter1.reset());      // 5
console.log(counter1.decrement());  // 4

const counter2 = createCounter(0);
console.log(counter2.increment()); // 1
console.log(counter2.increment()); // 2
console.log(counter2.decrement()); // 1
console.log(counter2.reset());      // 0
console.log(counter2.reset());      // 0
