/**
 * @param {character[][]} grid
 * @return {number}
 */
var numIslands = function (grid) {
  if (!grid || grid.length === 0) {
    return 0;
  }

  const numRows = grid.length;
  const numCols = grid[0].length;

  const dfs = function (row, col) {
    if (row < 0 || row >= numRows || col < 0 || col >= numCols || grid[row][col] === "0") {
      return;
    }

    // Mark the current cell as visited
    grid[row][col] = "0";

    // Explore adjacent cells
    dfs(row - 1, col); // Up
    dfs(row + 1, col); // Down
    dfs(row, col - 1); // Left
    dfs(row, col + 1); // Right
  };

  let islandCount = 0;

  // Iterate through each cell in the grid
  for (let row = 0; row < numRows; row++) {
    for (let col = 0; col < numCols; col++) {
      if (grid[row][col] === "1") {
        // Found a new island, perform DFS to explore it
        islandCount++;
        dfs(row, col);
      }
    }
  }

  return islandCount;
};

// Example usage:
const example1 = numIslands([
  ["1", "1", "1", "1", "0"],
  ["1", "1", "0", "1", "0"],
  ["1", "1", "0", "0", "0"],
  ["0", "0", "0", "0", "0"],
]);
console.log(example1); // Output: 1

const example2 = numIslands([
  ["1", "1", "0", "0", "0"],
  ["1", "1", "0", "0", "0"],
  ["0", "0", "1", "0", "0"],
  ["0", "0", "0", "1", "1"],
]);
console.log(example2); // Output: 3
