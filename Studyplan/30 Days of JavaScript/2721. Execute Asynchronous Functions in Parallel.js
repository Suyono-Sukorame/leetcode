/**
 * @param {Array<Function>} functions
 * @return {Promise<any>}
 */
var promiseAll = function (functions) {
  return new Promise((resolve, reject) => {
    const results = [];
    let resolvedCount = 0;
    let rejected = false;

    const checkCompletion = () => {
      if (resolvedCount === functions.length) {
        resolve(results);
      }
    };

    functions.forEach((func, index) => {
      func().then(
        (result) => {
          if (!rejected) {
            results[index] = result;
            resolvedCount++;
            checkCompletion();
          }
        },
        (error) => {
          if (!rejected) {
            reject(error);
            rejected = true;
          }
        }
      );
    });
  });
};

const promise = promiseAll([() => new Promise((res) => setTimeout(() => res(42), 200)), () => new Promise((res) => setTimeout(() => res(10), 150)), () => new Promise((res, rej) => setTimeout(() => rej("Error"), 100))]);

promise.then(console.log).catch((error) => console.error("Error:", error));
