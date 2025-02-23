<?php
interface TeamInterface {
    public function getTeamGroups($lang);
    public function getTeamMembers($lang, $group);
    public function getTeamMember($lang, $slug);
}

