/**
 * @param {number[][]} isConnected
 * @return {number}
 */
var findCircleNum = function (isConnected) {
  const n = isConnected.length;
  const visited = new Set(); // Set to keep track of visited cities
  let provinces = 0;

  for (let i = 0; i < n; i++) {
    if (!visited.has(i)) {
      dfs(i);
      provinces++;
    }
  }

  return provinces;

  function dfs(city) {
    visited.add(city); // Mark the current city as visited
    for (let j = 0; j < n; j++) {
      if (isConnected[city][j] === 1 && !visited.has(j)) {
        dfs(j); // Recursively visit connected cities
      }
    }
  }
};

// Example usage:
// var isConnected1 = [[1,1,0],[1,1,0],[0,0,1]];
// console.log(findCircleNum(isConnected1)); // Output: 2

// var isConnected2 = [[1,0,0],[0,1,0],[0,0,1]];
// console.log(findCircleNum(isConnected2)); // Output: 3
