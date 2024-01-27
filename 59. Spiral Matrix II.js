/**
 * @param {number} n
 * @return {number[][]}
 */
var generateMatrix = function (n) {
    const matrix = new Array(n).fill().map(() => new Array(n).fill(0));

    let top = 0, bottom = n - 1, left = 0, right = n - 1;
    let num = 1;

    while (num <= n * n) {
        for (let i = left; i <= right; i++) {
            matrix[top][i] = num++;
        }
        top++;

        for (let i = top; i <= bottom; i++) {
            matrix[i][right] = num++;
        }
        right--;

        for (let i = right; i >= left; i--) {
            matrix[bottom][i] = num++;
        }
        bottom--;

        for (let i = bottom; i >= top; i--) {
            matrix[i][left] = num++;
        }
        left++;
    }

    return matrix;
};

console.log(generateMatrix(3));
console.log(generateMatrix(1));
