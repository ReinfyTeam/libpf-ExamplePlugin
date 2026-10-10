<?php

declare(strict_types=1);

namespace ReinfyTeam\ExamplePlugin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerChatEvent;
use ReinfyTeam\libpf\libpf;

class Main extends PluginBase implements Listener{
    
    public function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->notice("Successfully enabled the ProfanityFilter example plugin.");
    }
    
    public function onChat(PlayerChatEvent $event) : void{
        if(libpf::detectProfanity($event->getMessage(), libpf::defaultProfanity())){
			$event->cancel();
            $event->getPlayer()->sendMessage(TextFormat::RED . "Please watch your language!");
        } else {
			$event->setMessage(libpf::removeUnicode(libpf::removeProfanity($event->getMessage(), libpf::defaultProfanity(), "*"), true));
        }
    }
}
