var slidingPuzzle = function(board) {
    const target = "123450";
    
    const visited = new Set();
    const queue = [];
    
    const start = board.flat().join("");
    
    const moves = [
        [1, 3],
        [0, 2, 4],
        [1, 5],
        [0, 4],
        [1, 3, 5],
        [2, 4]
    ];
    
    queue.push([start, 0]);
    visited.add(start);
    
    while (queue.length > 0) {
        const [state, steps] = queue.shift();
        
        if (state === target) {
            return steps;
        }
        
        const zeroIndex = state.indexOf("0");
        
        for (const move of moves[zeroIndex]) {
            const newState = swap(state, zeroIndex, move);
            if (!visited.has(newState)) {
                visited.add(newState);
                queue.push([newState, steps + 1]);
            }
        }
    }
    
    return -1;
};

function swap(str, i, j) {
    const chars = str.split("");
    [chars[i], chars[j]] = [chars[j], chars[i]];
    return chars.join("");
}
