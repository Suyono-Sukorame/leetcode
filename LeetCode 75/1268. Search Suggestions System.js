/**
 * @param {string[]} products
 * @param {string} searchWord
 * @return {string[][]}
 */
var suggestedProducts = function (products, searchWord) {
  products.sort();

  const result = [];
  let currentPrefix = "";

  for (let i = 0; i < searchWord.length; i++) {
    currentPrefix += searchWord[i];
    const suggestions = findMatchingProducts(products, currentPrefix);
    result.push(suggestions.slice(0, 3));
  }

  return result;
};

function findMatchingProducts(products, prefix) {
  const suggestions = [];
  let count = 0;

  for (const product of products) {
    if (product.startsWith(prefix)) {
      suggestions.push(product);
      count++;
    }

    if (count === 3) {
      break;
    }
  }

  return suggestions;
}

const example1 = suggestedProducts(["mobile", "mouse", "moneypot", "monitor", "mousepad"], "mouse");
console.log(example1);

const example2 = suggestedProducts(["havana"], "havana");
console.log(example2);
