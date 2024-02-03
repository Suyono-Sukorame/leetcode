/**
 * @param {character[][]} maze
 * @param {number[]} entrance
 * @return {number}
 */
var nearestExit = function (maze, entrance) {
  const m = maze.length;
  const n = maze[0].length;
  const directions = [
    [0, 1],
    [1, 0],
    [0, -1],
    [-1, 0],
  ];
  const queue = [];

  queue.push({ row: entrance[0], col: entrance[1], steps: 0 });
  maze[entrance[0]][entrance[1]] = "+";

  while (queue.length > 0) {
    const { row, col, steps } = queue.shift();

    for (const [dr, dc] of directions) {
      const newRow = row + dr;
      const newCol = col + dc;

      if (newRow >= 0 && newRow < m && newCol >= 0 && newCol < n && maze[newRow][newCol] === ".") {
        if (newRow === 0 || newRow === m - 1 || newCol === 0 || newCol === n - 1) {
          return steps + 1; // Exit found
        }

        maze[newRow][newCol] = "+"; // Mark visited cell
        queue.push({ row: newRow, col: newCol, steps: steps + 1 });
      }
    }
  }

  return -1; // No exit found
};

// Example usage:
// var maze1 = [["+","+",".","+"],[".",".",".","+"],["+","+","+","."]];
// var entrance1 = [1, 2];
// console.log(nearestExit(maze1, entrance1)); // Output: 1

// var maze2 = [["+","+","+"],[".",".","."],["+","+","+"]];
// var entrance2 = [1, 0];
// console.log(nearestExit(maze2, entrance2)); // Output: 2

// var maze3 = [[".","+"]];
// var entrance3 = [0, 0];
// console.log(nearestExit(maze3, entrance3)); // Output: -1
