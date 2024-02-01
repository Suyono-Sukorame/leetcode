/**
 * @param {character[][]} board
 * @param {string[]} words
 * @return {string[]}
 */

class TrieNode {
  constructor() {
    this.children = new Map();
    this.isEndOfWord = false;
  }
}

class Trie {
  constructor() {
    this.root = new TrieNode();
  }

  insert(word) {
    let node = this.root;
    for (const char of word) {
      if (!node.children.has(char)) {
        node.children.set(char, new TrieNode());
      }
      node = node.children.get(char);
    }
    node.isEndOfWord = true;
  }
}

var findWords = function (board, words) {
  const result = [];
  const trie = new Trie();

  // Insert all words into the trie
  for (const word of words) {
    trie.insert(word);
  }

  const dfs = (node, i, j, path) => {
    const char = board[i][j];
    const currentNode = node.children.get(char);

    if (!currentNode) return;

    // Mark the visited cell
    board[i][j] = "#";

    // Check if it's the end of a word
    if (currentNode.isEndOfWord) {
      result.push(path);
      currentNode.isEndOfWord = false; // Mark it as visited
    }

    // Explore adjacent cells
    const directions = [
      [-1, 0],
      [1, 0],
      [0, -1],
      [0, 1],
    ];
    for (const [dx, dy] of directions) {
      const ni = i + dx;
      const nj = j + dy;

      if (ni >= 0 && ni < board.length && nj >= 0 && nj < board[0].length && board[ni][nj] !== "#") {
        dfs(currentNode, ni, nj, path + board[ni][nj]);
      }
    }

    // Restore the board cell
    board[i][j] = char;
  };

  // Iterate through each cell on the board
  for (let i = 0; i < board.length; i++) {
    for (let j = 0; j < board[0].length; j++) {
      dfs(trie.root, i, j, board[i][j]);
    }
  }

  return result;
};

// Example usage:
const board1 = [
  ["o", "a", "a", "n"],
  ["e", "t", "a", "e"],
  ["i", "h", "k", "r"],
  ["i", "f", "l", "v"],
];
const words1 = ["oath", "pea", "eat", "rain"];
console.log(findWords(board1, words1)); // Output: ["eat","oath"]

const board2 = [
  ["a", "b"],
  ["c", "d"],
];
const words2 = ["abcb"];
console.log(findWords(board2, words2)); // Output: []
