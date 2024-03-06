<?php

declare(strict_types=1);

namespace void\FakePlayers;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\level\Position;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info("§aPlugin enabled!");

        $this->saveDefaultConfig();
        $this->reloadConfig();

        $players = $this->getConfig()->getAll();

        foreach ($players as $playerName) {
            $this->spawnFakePlayer($playerName);
        }
    }

    private function spawnFakePlayer(string $playerName): void {
        $server = $this->getServer();
        $world = $server->getLevelByName("world");
        $position = new Position(0, $world->getHighestBlockAt(0, 0) + 1, 0, $world);

        $fakePlayer = $server->getPlayerByRawUUID(Player::createPlayerUniqueId());
        $fakePlayer->setNameTag($playerName);
        $fakePlayer->setDisplayName($playerName);
        $fakePlayer->setX($position->getX());
        $fakePlayer->setY($position->getY());
        $fakePlayer->setZ($position->getZ());

        $position->getLevel()->addPlayer($fakePlayer);
    }
}
