/**
 * @param {number[]} gas
 * @param {number[]} cost
 * @return {number}
 */
var canCompleteCircuit = function (gas, cost) {
  let totalGas = 0;
  let currentGas = 0;
  let startingStation = 0;

  for (let i = 0; i < gas.length; i++) {
    totalGas += gas[i] - cost[i];
    currentGas += gas[i] - cost[i];

    if (currentGas < 0) {
      startingStation = i + 1;
      currentGas = 0;
    }
  }

  return totalGas >= 0 ? startingStation : -1;
};

console.log(canCompleteCircuit([1, 2, 3, 4, 5], [3, 4, 5, 1, 2])); // Output: 3
console.log(canCompleteCircuit([2, 3, 4], [3, 4, 3])); // Output: -1
