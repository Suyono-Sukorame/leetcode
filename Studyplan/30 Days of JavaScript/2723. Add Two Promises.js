/**
 * @param {Promise} promise1
 * @param {Promise} promise2
 * @return {Promise}
 */
var addTwoPromises = async function (promise1, promise2) {
    const value1 = await promise1;
    const value2 = await promise2;

    return value1 + value2;
};

/**
 * Example:
 * 
 * addTwoPromises(
 *   new Promise(resolve => setTimeout(() => resolve(2), 20)),
 *   new Promise(resolve => setTimeout(() => resolve(5), 60))
 * ).then(console.log); // 7
 */
