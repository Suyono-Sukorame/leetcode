/**
 * @param {Function} fn
 * @param {number} t
 * @return {Function}
 */
var timeLimit = function (fn, t) {
  return async function (...args) {
    return new Promise(async (resolve, reject) => {
      const timeout = setTimeout(() => {
        reject("Time Limit Exceeded");
      }, t);

      try {
        const result = await fn(...args);
        clearTimeout(timeout);
        resolve(result);
      } catch (error) {
        clearTimeout(timeout);
        reject(error);
      }
    });
  };
};

const limited = timeLimit(async (t) => {
  await new Promise((res) => setTimeout(res, t));
}, 100);

limited(150)
  .then((result) => console.log(result)) // Output: "Time Limit Exceeded" at t=100ms
  .catch((error) => console.error(error));
