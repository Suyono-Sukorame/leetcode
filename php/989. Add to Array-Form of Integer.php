var addToArrayForm = function(num, k) {
    let carry = k;
    const result = [];
    let i = num.length - 1;

    while (i >= 0 || carry > 0) {
        if (i >= 0) {
            carry += num[i];
        }
        result.unshift(carry % 10);
        carry = Math.floor(carry / 10);
        i--;
    }

    return result;
};
