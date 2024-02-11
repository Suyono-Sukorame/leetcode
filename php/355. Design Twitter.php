class Twitter {
    private $tweets;
    private $followers;
    private $serial = 0;

    function __construct() {
        $this->tweets = [];
        $this->followers = [];
    }

    function postTweet($userId, $tweetId) {
        if (!isset($this->tweets[$userId])) {
            $this->tweets[$userId] = [];
        }
        $this->tweets[$userId][$tweetId] = $this->serial++;
    }

    function getNewsFeed($userId) {
        $twits = $this->tweets[$userId] ?: [];
        if (isset($this->followers[$userId])) {
            $follows = array_keys($this->followers[$userId]);
            foreach ($follows as $uid) {
                $twits += $this->tweets[$uid] ?: [];
            }
        }
        arsort($twits, SORT_NUMERIC);
        return array_keys(array_slice($twits, 0, 10, true));
    }

    function follow($followerId, $followeeId) {
        if (!isset($this->followers[$followerId])) {
            $this->followers[$followerId] = [];
        }
        $this->followers[$followerId][$followeeId] = true;
    }

    function unfollow($followerId, $followeeId) {
        if (isset($this->followers[$followerId])) {
            unset($this->followers[$followerId][$followeeId]);
        }
    }
}
