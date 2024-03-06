<?php

declare(strict_types=1);

namespace void\FakePlayers;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info("Plugin aktiviert!");
    }
}
