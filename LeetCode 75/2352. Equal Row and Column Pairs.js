/**
 * @param {number[][]} grid
 * @return {number}
 */
var equalPairs = function (grid) {
  // Store the first row of the grid
  const columnStartsWith = grid[0];

  // Initialize a list to store the columns of the grid
  const columns = Array.from({ length: columnStartsWith.length }, () => []);

  // Iterate through each row of the grid
  for (const row of grid) {
    // Iterate through each element in the row and append it to the corresponding column
    row.forEach((element, j) => {
      columns[j].push(element);
    });
  }

  // Initialize a variable to count the equal pairs
  let equalPairsCount = 0;

  // Iterate through each row of the grid
  for (const row of grid) {
    // Iterate through each element in the first row
    columnStartsWith.forEach((element, j) => {
      // Check if the first element of the row is equal to the element in the corresponding column
      if (row[0] === element) {
        // Check if the entire row is equal to the column
        if (JSON.stringify(row) === JSON.stringify(columns[j])) {
          equalPairsCount += 1;
        }
      }
    });
  }

  return equalPairsCount;
};
