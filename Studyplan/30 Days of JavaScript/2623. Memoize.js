/**
 * @param {Function} fn
 * @return {Function}
 */
function memoize(fn) {
    const cache = new Map();

    // Move callCount inside the memoized function
    let callCount = 0;

    return function (...args) {
        const key = JSON.stringify(args);

        if (cache.has(key)) {
            return cache.get(key);
        } else {
            callCount += 1;

            const result = fn(...args);
            cache.set(key, result);

            return result;
        }
    };
}

/**
 * Example:
 */
let fnName = "sum";
let actions = ["call", "call", "getCallCount", "call", "getCallCount"];
let values = [[2, 2], [2, 2], [], [1, 2], []];

const sum = (a, b) => a + b;
const memoizedSum = memoize(sum);

let output = [];

for (let i = 0; i < actions.length; i++) {
    if (actions[i] === "call") {
        output.push(memoizedSum(...values[i]));
    } else if (actions[i] === "getCallCount") {
        output.push(memoizedSum.callCount);
    }
}

console.log(output); // [4, 4, 1, 3, 2]
