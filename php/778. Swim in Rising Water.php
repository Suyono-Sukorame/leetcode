var swimInWater = function(grid) {
    const n = grid.length;
    const directions = [[0, 1], [0, -1], [1, 0], [-1, 0]];
    
    const canReach = (time) => {
        const visited = new Array(n).fill(0).map(() => new Array(n).fill(false));
        const queue = [[0, 0]];
        visited[0][0] = true;
        
        while (queue.length > 0) {
            const [x, y] = queue.shift();
            
            if (x === n - 1 && y === n - 1) {
                return true;
            }
            
            for (const [dx, dy] of directions) {
                const nx = x + dx;
                const ny = y + dy;
                
                if (nx >= 0 && nx < n && ny >= 0 && ny < n && !visited[nx][ny] && grid[nx][ny] <= time) {
                    visited[nx][ny] = true;
                    queue.push([nx, ny]);
                }
            }
        }
        
        return false;
    };
    
    let left = grid[0][0];
    let right = n * n - 1;
    let ans = 0;
    
    while (left <= right) {
        const mid = Math.floor((left + right) / 2);
        if (canReach(mid)) {
            ans = mid;
            right = mid - 1;
        } else {
            left = mid + 1;
        }
    }
    
    return ans;
};
