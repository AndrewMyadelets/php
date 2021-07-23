<?php

class Group
{
    private $name;
    private $teams = [];

    public function __construct($name, $group = '')
    {
        if($group) {
            $this->teams = $group->teams;
        }
        $this->name = $name;
    }

    public function addTeam($team)
    {
        $this->teams[count($this->teams)] = $team;
        return $this;
    }

    public function getTeams()
    {
        return $this->teams;
    }

    function generateCalendar()
    {
        foreach ($this->teams as $team){
            $teams[] = $team->getName() . '(' . $team->getCountry() . ')';
        }
        if (count($teams) % 2 != 0)
            $teams[] = "additional";

        echo '<table style="margin-bottom: 50px;">';
        echo '<tr><th style="padding-bottom: 10px">' . ($this->name) . '</th></tr>';
        for($round = 1 ; $round < count($teams); $round++){
            echo '<tr><th>Round ' . ($round) . '</th></tr>';
            for($i = 0 ; $i < count($teams)/2 ; $i++){
                $opponent = count($teams) - 1 - $i ;

                if ($teams[$i] != 'additional' && $teams[$opponent] != 'additional'){
                    echo '<tr><td>' . $teams[$i] . ' - ' . $teams[$opponent] . '</td></tr>';
                }
            }


            $tmp = $teams[count($teams) - 1];//5
            for ($i = count($teams) - 1; $i > 1; $i--){//не затрагивая нулевую и первую позицию
                $teams[$i] = $teams[$i - 1];
            }
            $teams[1] = $tmp;//последний элемент на первую позицию
        }
        echo '</table>';
        //echo '<hr>';
    }

}