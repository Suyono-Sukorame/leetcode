/**
 * @param {Function} fn
 * @param {Array} args
 * @param {number} t
 * @return {Function}
 */
var cancellable = function (fn, args, t) {
    const result = [];

    // Initial call
    const initialTime = 0;
    const initialReturned = fn(...args);
    result.push({ time: initialTime, returned: initialReturned });

    const intervalId = setInterval(() => {
        const time = Math.floor(performance.now() - start);
        const returned = fn(...args);
        result.push({ time, returned });
    }, t);

    const start = performance.now();

    const cancelFn = function () {
        clearInterval(intervalId);
    };

    return cancelFn;
};

/**
 * Example:
 * const result = [];
 *
 * const fn = (x) => x * 2;
 * const args = [4], t = 35, cancelTimeMs = 190;
 *
 * const cancel = cancellable(fn, args, t);
 *
 * setTimeout(() => {
 *     cancel(); // Cancel at 190ms
 * }, cancelTimeMs);
 *
 * setTimeout(() => {
 *     console.log(result); // The collected results
 * }, cancelTimeMs + 15);
 */
