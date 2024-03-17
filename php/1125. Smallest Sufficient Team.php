class Solution {
    private $mainTeam = [];

    /**
     * @param String[] $req_skills
     * @param String[][] $people
     * @return Integer[]
     */
    function smallestSufficientTeam($req_skills, $people) {
        $map = [];
        $i = 0;
        foreach ($req_skills as $skill) {
            $map[$skill] = $i++;
        }

        $reqSkills = (1 << $i) - 1;
        $skills = $this->getPeopleSkillsMask($people, $map);
        $localTeam = [];
        $this->findTeam($reqSkills, $skills, 0, 0, $localTeam);
        return $this->convertListToArray();
    }

    private function getPeopleSkillsMask($people, $map) {
        $len = count($people);
        $skills = [];
        for ($i = 0; $i < $len; $i++) {
            $mask = 0;
            foreach ($people[$i] as $skill) {
                $mask |= (1 << $map[$skill]);
            }
            $skills[] = $mask;
        }
        return $skills;
    }

    private function findTeam($reqSkills, $skills, $teamSkills, $person, &$localTeam) {
        if (!empty($this->mainTeam) && count($localTeam) >= count($this->mainTeam) - 1 || $person == count($skills)) {
            return;
        }

        //taking current person into team
        $localTeam[] = $person;

        if (($teamSkills | $skills[$person]) == $reqSkills) {
            $this->mainTeam = $localTeam;
            array_pop($localTeam);
            return;
        } elseif (($teamSkills | $skills[$person]) > $teamSkills) {
            $this->findTeam($reqSkills, $skills, $teamSkills | $skills[$person], $person + 1, $localTeam);
        }

        array_pop($localTeam);

        $this->findTeam($reqSkills, $skills, $teamSkills, $person + 1, $localTeam);
    }

    private function convertListToArray() {
        return $this->mainTeam;
    }
}
