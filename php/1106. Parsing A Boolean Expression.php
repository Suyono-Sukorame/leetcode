class Solution {

/**
 * @param String $expression
 * @return Boolean
 */
function parseBoolExpr($expression) {
    return $this->evaluateExpression($expression);
}

function evaluateExpression($expr) {
    if ($expr === 't') {
        return true;
    } elseif ($expr === 'f') {
        return false;
    } elseif ($expr[0] === '!') {
        return !$this->evaluateExpression(substr($expr, 2, strlen($expr) - 3));
    } elseif ($expr[0] === '&') {
        $subExprs = $this->splitExpression(substr($expr, 2, strlen($expr) - 3));
        foreach ($subExprs as $subExpr) {
            if (!$this->evaluateExpression($subExpr)) {
                return false;
            }
        }
        return true;
    } elseif ($expr[0] === '|') {
        $subExprs = $this->splitExpression(substr($expr, 2, strlen($expr) - 3));
        foreach ($subExprs as $subExpr) {
            if ($this->evaluateExpression($subExpr)) {
                return true;
            }
        }
        return false;
    }
    return false;
}

function splitExpression($expr) {
    $result = [];
    $level = 0;
    $start = 0;
    for ($i = 0; $i < strlen($expr); $i++) {
        if ($expr[$i] === ',' && $level === 0) {
            $result[] = substr($expr, $start, $i - $start);
            $start = $i + 1;
        } elseif ($expr[$i] === '(') {
            $level++;
        } elseif ($expr[$i] === ')') {
            $level--;
        }
    }
    $result[] = substr($expr, $start);
    return $result;
}
}
