/**
 * @param {number[][]} board
 * @return {void} Do not return anything, modify board in-place instead.
 */
var gameOfLife = function (board) {
  const m = board.length;
  const n = board[0].length;

  const countLiveNeighbors = (row, col) => {
    let count = 0;
    const directions = [
      [-1, 0],
      [1, 0],
      [0, -1],
      [0, 1],
      [-1, -1],
      [-1, 1],
      [1, -1],
      [1, 1],
    ];

    for (const [dx, dy] of directions) {
      const newRow = row + dx;
      const newCol = col + dy;

      if (newRow >= 0 && newRow < m && newCol >= 0 && newCol < n) {
        count += board[newRow][newCol] & 1;
      }
    }

    return count;
  };

  for (let i = 0; i < m; i++) {
    for (let j = 0; j < n; j++) {
      const liveNeighbors = countLiveNeighbors(i, j);

      if (board[i][j] === 1 && (liveNeighbors === 2 || liveNeighbors === 3)) {
        board[i][j] = 3; // 0b11
      }

      if (board[i][j] === 0 && liveNeighbors === 3) {
        board[i][j] = 2; // 0b10
      }
    }
  }

  for (let i = 0; i < m; i++) {
    for (let j = 0; j < n; j++) {
      board[i][j] >>= 1; // Update the cell state
    }
  }
};

const board1 = [
  [0, 1, 0],
  [0, 0, 1],
  [1, 1, 1],
  [0, 0, 0],
];
gameOfLife(board1);
console.log(board1); // Output: [[0,0,0],[1,0,1],[0,1,1],[0,1,0]]

const board2 = [
  [1, 1],
  [1, 0],
];
gameOfLife(board2);
console.log(board2); // Output: [[1,1],[1,1]]
