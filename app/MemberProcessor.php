<?php
namespace App;


use Carbon\Carbon;
use Log;

class MemberProcessor
{

    public function processMembers($members, $squad)
    {
        /*
            "name" : "Lord Byron",
            "isOwner" : false,
            "isOfficer" : true,
            "joinDate" : 1431883988,
            "troopsDonated" : 5296,
            "troopsReceived" : 5163,
            "hqLevel" : 9,
            "reputationInvested" : 52,
            "xp" : 2336,
            "score" : 12626,
            "attacksWon" : 2093,
            "defensesWon" : 811,
            "lastLoginTime" : 1471768278,
            "lastUpdated" : 1471768288,
            "playerId" : "fe6138ab-8846-11e4-a398-06c322004ec3"
         */
        foreach ($members as $member) {
            try {
                Commander::findOrNew($member->playerId)
                    ->fill([
                        'playerId' => $member->playerId,
                        'name' => $member->name,
                        'isOwner' => $member->isOwner,
                        'isOfficer' => $member->isOfficer,
                        'joinDate' => Carbon::createFromTimestampUTC($member->joinDate),
                        'troopsDonated' => $member->troopsDonated,
                        'troopsReceived' => $member->troopsReceived,
                        'hqLevel' => $member->hqLevel,
                        'reputationInvested' => $member->reputationInvested,
                        'xp' => $member->xp,
                        'score' => $member->score,
                        'attacksWon' => $member->attacksWon,
                        'defensesWon' => $member->defensesWon,
                        'lastLoginTime' => Carbon::createFromTimestampUTC($member->lastLoginTime),
                        'lastUpdated' => Carbon::createFromTimestampUTC($member->lastUpdated),
                        'squadId' => $squad->id,
                        'faction' => $squad->faction,
                    ])
                    ->save();
            }
            catch (\Exception $e) {
                Log::error('Duplicate ID? ' . $member->playerId);
            }
        }

    }

}
