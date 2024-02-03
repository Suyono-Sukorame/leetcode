/**
 * @param {number[][]} grid
 * @return {number}
 */
var orangesRotting = function (grid) {
  const m = grid.length;
  const n = grid[0].length;
  const directions = [
    [0, 1],
    [1, 0],
    [0, -1],
    [-1, 0],
  ];
  const queue = [];
  let freshOranges = 0;
  let minutes = 0;

  // Enqueue the initial rotten oranges and count the fresh oranges
  for (let i = 0; i < m; i++) {
    for (let j = 0; j < n; j++) {
      if (grid[i][j] === 2) {
        queue.push([i, j]);
      } else if (grid[i][j] === 1) {
        freshOranges++;
      }
    }
  }

  // Perform BFS to rot adjacent fresh oranges
  while (queue.length > 0 && freshOranges > 0) {
    const size = queue.length;

    for (let i = 0; i < size; i++) {
      const [row, col] = queue.shift();

      for (const [dr, dc] of directions) {
        const newRow = row + dr;
        const newCol = col + dc;

        if (newRow >= 0 && newRow < m && newCol >= 0 && newCol < n && grid[newRow][newCol] === 1) {
          grid[newRow][newCol] = 2; // Rot adjacent fresh orange
          queue.push([newRow, newCol]);
          freshOranges--;
        }
      }
    }

    minutes++;
  }

  return freshOranges === 0 ? minutes : -1;
};

// Example usage:
// var grid1 = [[2,1,1],[1,1,0],[0,1,1]];
// console.log(orangesRotting(grid1)); // Output: 4

// var grid2 = [[2,1,1],[0,1,1],[1,0,1]];
// console.log(orangesRotting(grid2)); // Output: -1

// var grid3 = [[0,2]];
// console.log(orangesRotting(grid3)); // Output: 0
