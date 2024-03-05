class Solution {
    function numUniqueEmails($emails) {
        $uniqueEmails = [];

        foreach ($emails as $email) {
            list($localName, $domainName) = explode('@', $email);
            $localName = preg_replace('/\+.*$/', '', $localName);
            $uniqueEmail = str_replace('.', '', $localName) . '@' . $domainName;
            $uniqueEmails[$uniqueEmail] = true;
        }

        return count($uniqueEmails);
    }
}