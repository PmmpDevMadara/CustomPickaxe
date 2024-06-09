<?php

namespace Abir\Pickaxe\command;

use pocketmine\player\Player;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use Abir\Pickaxe\Main;

class CustomPickaxeCommand extends Command {
    public $plugin;
    public function __construct(Main $plugin, $name, $description) {
        $this->plugin = $plugin;
        parent::__construct($name, $description);
        $this->setAliases(["pickaxe"]);
        $this->setPermission("pickaxe.cmd");
    }
    public function execute(CommandSender $sender, string $label, array $args) : bool {
        if(!$sender->hasPermission("pickaxe.cmd")) {
            $sender->sendMessage("§cYou Don't Have Permission To Use This Command!");
        }
        if($sender instanceof Player) {
            $this->plugin->form($sender);
        }else{
            $sender->sendMessage("Please Use This Command In Game");
        }
        return true;
    }
}
