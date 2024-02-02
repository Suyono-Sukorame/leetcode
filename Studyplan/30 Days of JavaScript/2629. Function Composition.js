/**
 * @param {Function[]} functions
 * @return {Function}
 */
var compose = function (functions) {
    return function (x) {
        return functions.reduceRight((result, fn) => fn(result), x);
    };
};

/**
 * Examples:
 */
const fn1 = compose([x => x + 1, x => x * x, x => 2 * x]);
console.log(fn1(4)); // 65

const fn2 = compose([x => 10 * x, x => 10 * x, x => 10 * x]);
console.log(fn2(1)); // 1000

const fn3 = compose([]);
console.log(fn3(42)); // 42
