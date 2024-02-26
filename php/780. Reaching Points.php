var reachingPoints = function(sx, sy, tx, ty) {
    if (sx === tx && sy === ty) {
        return true;
    }
    if (tx < sx || ty < sy) {
        return false;
    }
    return tx < ty ?
        reachingPoints(sx, sy, tx, Math.min(ty % tx + Math.floor(sy / tx) * tx, ty - tx))
        : reachingPoints(sx, sy, Math.min(tx % ty + Math.floor(sx / ty) * ty, tx - ty), ty);
};
