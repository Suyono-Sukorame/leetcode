class Codec {
    private $urlMap = [];
    private $counter = 0;

    /**
     * Encodes a URL to a shortened URL.
     * @param String $longUrl
     * @return String
     */
    function encode($longUrl) {
        $shortUrl = 'http://tinyurl.com/' . $this->counter++;
        $this->urlMap[$shortUrl] = $longUrl;
        return $shortUrl;
    }

    /**
     * Decodes a shortened URL to its original URL.
     * @param String $shortUrl
     * @return String
     */
    function decode($shortUrl) {
        return $this->urlMap[$shortUrl];
    }
}
