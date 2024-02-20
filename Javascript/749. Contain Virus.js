class Solution {
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function containVirus($grid) {
        if (empty($grid) || empty($grid[0])) return 0;
        
        $BLOCKED = -1;
        $HEALTHY = 0;
        $UNGROUPED = 1;
        $g = $grid;
        $walls = 0;
        
        while (true) {
            [$grouped, $groupIds] = $this->group($g);
            [$max, $id, $wallt] = $this->findDangerGroup($groupIds);
            
            if ($max == 0) return $walls;
            
            $walls += $wallt;
            $g = $this->nextDay($grouped, $id, $groupIds);
        }
    }
    
    function nextDay($grouped, $id, $groupIds) {
        foreach ($grouped as $i => $row) {
            foreach ($row as $j => $val) {
                $grouped[$i][$j] = $val == $id ? -1 : ($val > 0 ? 1 : $val);
            }
        }
        
        foreach ($groupIds as $groupId => $groupData) {
            if ($id == $groupId) continue;
            $cells = $groupData[0];
            $this->loopCells($cells, function($i, $j) use (&$grouped) {
                $grouped[$i][$j] = 1;
            });
        }
        
        return $grouped;
    }
    
    function findDangerGroup($groupIds) {
        $max = 0;
        $id = 0;
        $wallt = 0;
        
        foreach ($groupIds as $groupId => $groupData) {
            [$cells, $countWalls, $countCells] = $groupData;
            
            if ($countCells > $max) {
                $max = $countCells;
                $id = $groupId;
                $wallt = $countWalls;
            }
        }
        
        return [$max, $id, $wallt];
    }
    
    function group($grid) {
        $idIterator = $this->getGroupId();
        $groupIds = [];
        
        foreach ($grid as $i => $row) {
            foreach ($row as $j => $val) {
                if ($val == 1) {
                    $groupId = $idIterator->current();
                    $this->setGroup($i, $j, $groupId, $grid, $groupIds);
                }
            }
        }
        
        return [$grid, $groupIds];
    }
    
    function setGroup($i, $j, $groupId, &$grid, &$groupIds) {
        if ($i < 0 || $j < 0 || $i >= count($grid) || $j >= count($grid[$i])) return;
        if ($grid[$i][$j] == -1) return;
        if ($grid[$i][$j] == 0) {
            if (!isset($groupIds[$groupId])) $groupIds[$groupId] = [[], 0, 0];
            [$cells, $countWalls, $countCells] = $groupIds[$groupId];
            if (!isset($cells[$i])) $cells[$i] = [];
            if (!isset($cells[$i][$j])) {
                $countCells++;
                $countWalls++;
                $cells[$i][$j] = true;
            }
            $groupIds[$groupId] = [$cells, $countWalls, $countCells];
            return;
        }
        if ($grid[$i][$j] > 1) return;
        $grid[$i][$j] = $groupId;
        $this->setGroup($i + 1, $j, $groupId, $grid, $groupIds);
        $this->setGroup($i - 1, $j, $groupId, $grid, $groupIds);
        $this->setGroup($i, $j + 1, $groupId, $grid, $groupIds);
        $this->setGroup($i, $j - 1, $groupId, $grid, $groupIds);
    }
    
    function loopCells($cells, $cb) {
        foreach ($cells as $i => $row) {
            foreach ($row as $j => $_) {
                $cb($i, $j);
            }
        }
    }
    
    function getGroupId() {
        $i = 2;
        while (true) {
            yield $i++;
        }
    }
}
