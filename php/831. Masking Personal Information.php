class Solution {
    function maskPII($S) {
        if (strpos($S, "@") !== false) { // email
            list($sub1, $sub2) = explode("@", strtolower($S), 2);
            $sub1 = $sub1[0] . "*****" . substr($sub1, -1);
            return $sub1 . "@" . $sub2;
        } else { // number
            $symbols = array("(", ")", "-", "+", " ");
            $S = str_replace($symbols, "", $S);
            $rv = "***-***-" . substr($S, -4);
            $digits = preg_match_all("/\d/", $S);
            if ($digits == 10) return $rv;
            return "+" . str_repeat("*", $digits - 10) . "-" . $rv;
        }
    }
}