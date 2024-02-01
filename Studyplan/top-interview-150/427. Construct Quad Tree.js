/**
 * Definition for a QuadTree node.
 * function Node(val, isLeaf, topLeft, topRight, bottomLeft, bottomRight) {
 *    this.val = (val === undefined ? false : val);
 *    this.isLeaf = (isLeaf === undefined ? false : isLeaf);
 *    this.topLeft = (topLeft === undefined ? null : topLeft);
 *    this.topRight = (topRight === undefined ? null : topRight);
 *    this.bottomLeft = (bottomLeft === undefined ? null : bottomLeft);
 *    this.bottomRight = (bottomRight === undefined ? null : bottomRight);
 * };
 */

class Node {
  constructor(val, isLeaf, topLeft, topRight, bottomLeft, bottomRight) {
    this.val = val === undefined ? false : val;
    this.isLeaf = isLeaf === undefined ? false : isLeaf;
    this.topLeft = topLeft === undefined ? null : topLeft;
    this.topRight = topRight === undefined ? null : topRight;
    this.bottomLeft = bottomLeft === undefined ? null : bottomLeft;
    this.bottomRight = bottomRight === undefined ? null : bottomRight;
  }
}

/**
 * @param {number[][]} grid
 * @return {Node}
 */
var construct = function (grid) {
  const buildTree = (row, col, size) => {
    if (isLeaf(row, col, size)) {
      return new Node(grid[row][col], true);
    }

    const newSize = size / 2;
    const topLeft = buildTree(row, col, newSize);
    const topRight = buildTree(row, col + newSize, newSize);
    const bottomLeft = buildTree(row + newSize, col, newSize);
    const bottomRight = buildTree(row + newSize, col + newSize, newSize);

    return new Node(false, false, topLeft, topRight, bottomLeft, bottomRight);
  };

  const isLeaf = (row, col, size) => {
    const value = grid[row][col];
    for (let i = row; i < row + size; i++) {
      for (let j = col; j < col + size; j++) {
        if (grid[i][j] !== value) {
          return false;
        }
      }
    }
    return true;
  };

  return buildTree(0, 0, grid.length);
};

const grid1 = [
  [0, 1],
  [1, 0],
];
console.log(construct(grid1));

const grid2 = [
  [1, 1, 1, 1, 0, 0, 0, 0],
  [1, 1, 1, 1, 0, 0, 0, 0],
  [1, 1, 1, 1, 1, 1, 1, 1],
  [1, 1, 1, 1, 1, 1, 1, 1],
  [1, 1, 1, 1, 0, 0, 0, 0],
  [1, 1, 1, 1, 0, 0, 0, 0],
  [1, 1, 1, 1, 0, 0, 0, 0],
  [1, 1, 1, 1, 0, 0, 0, 0],
];
console.log(construct(grid2));
