<?php

namespace App\Services;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\Http;

class SoccerService
{

    /**
     * @var Team
     */
    private $team;
    /**
     * @var Player
     */
    private $player;

    public function __construct(Team $team, Player $player)
    {
        $this->team = $team;
        $this->player = $player;
    }

    private function saveTeams($teams)
    {
        foreach ($teams as $teamIndex) {
            $result = $this->getLogo($teamIndex['team_id']);

            $this->team::create([
                'id' => $teamIndex['team_id'],
                'position' => $teamIndex['position'],
                'name' => $teamIndex['team_name'],
                'team' => $result['short_code'] ?? strtoupper(substr($teamIndex['team_name'], 0, 3)),
                'played' => $teamIndex['overall']['games_played'],
                'won' => $teamIndex['overall']['won'],
                'lost' => $teamIndex['overall']['lost'],
                'drawn' => $teamIndex['overall']['draw'],
                'points' => $teamIndex['overall']['points'],
                'goal' => $teamIndex['overall']['goals_scored'],
                'difference' => $teamIndex['overall']['goals_scored'] - $teamIndex['overall']['goals_against'],
                'logo_path' => $result['logo_path']
            ]);

        }

    }

    public function savePlayers($squad, $id): void
    {
        foreach ($squad['data'] as $s) {
            $this->player::create([
                'id' => $s['player_id'],
                'number' => $s['number'],
                'team_id' => $id
            ]);
        }
    }

    public function getLogo($id): array
    {
        $teamsLogo = Http::get('https://soccer.sportmonks.com/api/v2.0/teams/' . $id . '?api_token=HOLCAStI6Z0OfdoPbjdSg5b41Q17w2W5P4WuoIBdC66Z54kUEvGWPIe33UYC&include=squad')->json();
        $this->savePlayers($teamsLogo['data']['squad'], $teamsLogo['data']['id']);

        $aux['logo_path'] = $teamsLogo['data']['logo_path'];
        $aux['short_code'] = $teamsLogo['data']['short_code'];
        return $aux;
    }

    public function getStandings()
    {
        $season = Http::get('https://soccer.sportmonks.com/api/v2.0/standings/season/825?api_token=HOLCAStI6Z0OfdoPbjdSg5b41Q17w2W5P4WuoIBdC66Z54kUEvGWPIe33UYC')->json();
        foreach ($season as $seasonIndex) {
            foreach ($seasonIndex as $t) {
                foreach ($t['standings'] as $r) {
                    try {
                        $this->saveTeams($r[0]['standings']['data']);
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                }
            }
        }
    }
}
