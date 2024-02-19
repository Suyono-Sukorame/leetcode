class Solution {
    private $cache;
    private $stickers = [];

    function minStickers($stickers, $target) {
        foreach($stickers as $sticker){
            $this->stickers[]=count_chars($sticker,1);
        }
        $result  = $this->rec(count_chars($target,1),0);
        return $result == PHP_INT_MAX ? -1 : $result;
    }

    function rec($target, $stickerId){
        if(!$target){
            return 0;
        }
        if ($stickerId == count($this->stickers)){
            return PHP_INT_MAX;
        }
        $key = json_encode($target).$stickerId;
        if(isset($this->cache[$key])){
            return $this->cache[$key];
        }
        $result = $this->rec($target, $stickerId + 1);
        $newTarget = $this->useSticker($target, $stickerId);
        if($newTarget != $target){
            $result = min($result, 1 + $this->rec($newTarget, $stickerId));
        }
        $this->cache[$key] = $result;
        return $this->cache[$key];
    }

    function useSticker($target, $stickerId){
        foreach($this->stickers[$stickerId] as $char => $num){
            if(isset($target[$char])){
                $target[$char] -= $num;
            }
            if($target[$char] <= 0){
                unset($target[$char]);
            }
        }
        return $target;
    }
}
