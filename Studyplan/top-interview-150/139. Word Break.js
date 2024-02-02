/**
 * @param {string} s
 * @param {string[]} wordDict
 * @return {boolean}
 */
var wordBreak = function (s, wordDict) {
    const wordSet = new Set(wordDict);
    const memo = new Map();

    return canWordBreak(s, wordSet, memo);
};

function canWordBreak(s, wordSet, memo) {
    if (s === "") {
        return true;
    }

    if (memo.has(s)) {
        return memo.get(s);
    }

    for (let end = 1; end <= s.length; end++) {
        const prefix = s.substring(0, end);
        if (wordSet.has(prefix) && canWordBreak(s.substring(end), wordSet, memo)) {
            memo.set(s, true);
            return true;
        }
    }

    memo.set(s, false);
    return false;
}

// Test cases
console.log(wordBreak("leetcode", ["leet", "code"])); // Output: true
console.log(wordBreak("applepenapple", ["apple", "pen"])); // Output: true
console.log(wordBreak("catsandog", ["cats", "dog", "sand", "and", "cat"])); // Output: false
