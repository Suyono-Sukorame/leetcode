/**
 * @param {number[][]} points
 * @return {number}
 */
var maxPoints = function (points) {
    if (points.length <= 2) {
        return points.length;
    }

    let maxPoints = 2;

    for (let i = 0; i < points.length - 1; i++) {
        let slopeCount = new Map();
        let duplicatePoints = 0;
        let localMax = 1;

        for (let j = i + 1; j < points.length; j++) {
            if (points[i][0] === points[j][0] && points[i][1] === points[j][1]) {
                duplicatePoints++;
            } else {
                let slope = getSlope(points[i], points[j]);
                slopeCount.set(slope, (slopeCount.get(slope) || 1) + 1);
                localMax = Math.max(localMax, slopeCount.get(slope));
            }
        }

        maxPoints = Math.max(maxPoints, localMax + duplicatePoints);
    }

    return maxPoints;
};

// Function to calculate slope between two points
function getSlope(point1, point2) {
    if (point1[0] === point2[0]) {
        return Infinity;
    }
    return (point2[1] - point1[1]) / (point2[0] - point1[0]);
}

// Test cases
console.log(maxPoints([[1, 1], [2, 2], [3, 3]])); // Output: 3
console.log(maxPoints([[1, 1], [3, 2], [5, 3], [4, 1], [2, 3], [1, 4]])); // Output: 4
