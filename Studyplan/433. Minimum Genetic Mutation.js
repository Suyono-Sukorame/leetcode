/**
 * @param {string} startGene
 * @param {string} endGene
 * @param {string[]} bank
 * @return {number}
 */
var minMutation = function (startGene, endGene, bank) {
  if (!bank.includes(endGene)) {
    return -1; // endGene is not in the bank
  }

  const mutations = ["A", "C", "G", "T"];
  const visited = new Set();
  const queue = [[startGene, 0]];

  while (queue.length > 0) {
    const [currentGene, mutationsCount] = queue.shift();

    if (currentGene === endGene) {
      return mutationsCount;
    }

    for (let i = 0; i < currentGene.length; i++) {
      for (const mutation of mutations) {
        if (mutation !== currentGene[i]) {
          const nextGene = currentGene.slice(0, i) + mutation + currentGene.slice(i + 1);

          if (bank.includes(nextGene) && !visited.has(nextGene)) {
            queue.push([nextGene, mutationsCount + 1]);
            visited.add(nextGene); // Mark the gene as visited
          }
        }
      }
    }
  }

  return -1; // No mutation sequence found
};
