/**
 * @param {Function} fn
 * @return {Function}
 */
var once = function (fn) {
    let hasBeenCalled = false;
    let result;

    return function (...args) {
        if (!hasBeenCalled) {
            hasBeenCalled = true;
            result = fn(...args);
            return result;
        } else {
            return undefined;
        }
    };
};

/**
 * Example:
 */
let fn1 = (a, b, c) => (a + b + c);
let onceFn1 = once(fn1);

console.log(onceFn1(1, 2, 3)); // 6
console.log(onceFn1(2, 3, 6)); // undefined, fn1 was not called

let fn2 = (a, b, c) => (a * b * c);
let onceFn2 = once(fn2);

console.log(onceFn2(5, 7, 4)); // 140
console.log(onceFn2(2, 3, 6)); // undefined, fn2 was not called
console.log(onceFn2(4, 6, 8)); // undefined, fn2 was not called
