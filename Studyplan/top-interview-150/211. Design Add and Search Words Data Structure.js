class TrieNode {
  constructor() {
    this.children = {};
    this.isEndOfWord = false;
  }
}

var WordDictionary = function () {
  this.root = new TrieNode();
};

/**
 * @param {string} word
 * @return {void}
 */
WordDictionary.prototype.addWord = function (word) {
  let node = this.root;
  for (let char of word) {
    if (!node.children[char]) {
      node.children[char] = new TrieNode();
    }
    node = node.children[char];
  }
  node.isEndOfWord = true;
};

/**
 * @param {string} word
 * @return {boolean}
 */
WordDictionary.prototype.search = function (word) {
  return this.searchWord(this.root, word, 0);
};

WordDictionary.prototype.searchWord = function (node, word, index) {
  if (index === word.length) {
    return node.isEndOfWord;
  }

  const char = word[index];
  if (char === ".") {
    for (let key in node.children) {
      if (this.searchWord(node.children[key], word, index + 1)) {
        return true;
      }
    }
  } else {
    if (node.children[char] && this.searchWord(node.children[char], word, index + 1)) {
      return true;
    }
  }

  return false;
};

/**
 * Your WordDictionary object will be instantiated and called as such:
 * var obj = new WordDictionary()
 * obj.addWord(word)
 * var param_2 = obj.search(word)
 */
