class UnionFind {
    constructor(size) {
        this.parent = new Array(size);
        for (let i = 0; i < size; i++) {
            this.parent[i] = i;
        }
    }

    find(x) {
        if (this.parent[x] !== x) {
            this.parent[x] = this.find(this.parent[x]);
        }
        return this.parent[x];
    }

    union(x, y) {
        const rootX = this.find(x);
        const rootY = this.find(y);
        if (rootX === rootY) {
            return;
        }
        this.parent[rootX] = rootY;
    }
}

var equationsPossible = function(equations) {
    const uf = new UnionFind(26);

    for (const equation of equations) {
        if (equation[1] === '=') {
            const x = equation.charCodeAt(0) - 97;
            const y = equation.charCodeAt(3) - 97;
            uf.union(x, y);
        }
    }

    for (const equation of equations) {
        if (equation[1] === '!') {
            const x = equation.charCodeAt(0) - 97;
            const y = equation.charCodeAt(3) - 97;
            if (uf.find(x) === uf.find(y)) {
                return false;
            }
        }
    }

    return true;
};
