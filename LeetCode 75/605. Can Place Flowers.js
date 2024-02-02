/**
 * @param {number[]} flowerbed
 * @param {number} n
 * @return {boolean}
 */
var canPlaceFlowers = function (flowerbed, n) {
    let count = 0;
    const length = flowerbed.length;

    for (let i = 0; i < length; i++) {
        if (flowerbed[i] === 0) {
            // Check if the current plot and its adjacent plots are empty
            const prevEmpty = i === 0 || flowerbed[i - 1] === 0;
            const nextEmpty = i === length - 1 || flowerbed[i + 1] === 0;

            if (prevEmpty && nextEmpty) {
                flowerbed[i] = 1; // Plant a flower
                count++;

                // Skip the next plot since it cannot have a flower
                i++;
            }
        }
    }

    return count >= n;
};

// Example usage:
const example1 = canPlaceFlowers([1, 0, 0, 0, 1], 1);
console.log(example1); // Output: true

const example2 = canPlaceFlowers([1, 0, 0, 0, 1], 2);
console.log(example2); // Output: false
