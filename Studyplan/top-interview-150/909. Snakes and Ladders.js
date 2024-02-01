/**
 * @param {number[][]} board
 * @return {number}
 */
var snakesAndLadders = function (board) {
  const n = board.length;

  const getCoordinates = (num) => {
    const row = n - Math.floor((num - 1) / n) - 1;
    const col = (n - row) % 2 === 0 ? (num - 1) % n : n - 1 - ((num - 1) % n);
    return [row, col];
  };

  const flatBoard = [];
  let isLeftToRight = true;
  for (let i = n - 1; i >= 0; i--) {
    if (isLeftToRight) {
      flatBoard.push(...board[i]);
    } else {
      flatBoard.push(...board[i].reverse());
    }
    isLeftToRight = !isLeftToRight;
  }

  const queue = [];
  queue.push(1);
  const visited = new Set();
  visited.add(1);

  let moves = 0;
  while (queue.length > 0) {
    const size = queue.length;

    for (let i = 0; i < size; i++) {
      const curr = queue.shift();

      if (curr === n * n) {
        return moves;
      }

      for (let next = curr + 1; next <= Math.min(curr + 6, n * n); next++) {
        const [row, col] = getCoordinates(next);
        const destination = flatBoard[next - 1] === -1 ? next : flatBoard[next - 1];

        if (!visited.has(destination)) {
          visited.add(destination);
          queue.push(destination);
        }
      }
    }

    moves++;
  }

  return -1;
};
