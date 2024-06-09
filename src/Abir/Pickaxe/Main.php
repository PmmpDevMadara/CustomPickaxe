<?php

namespace Abir\Pickaxe;

use pocketmine\network\mcpe\protocol\types\entity\PropertySyncData;
use pocketmine\world\particle\EnchantmentTableParticle;
use pocketmine\math\AxisAlignedBB;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\world\format\Chunk;
use pocketmine\network\mcpe\NetworkBroadcastUtils;
use pocketmine\event\player\PlayerItemUseEvent;
use pocketmine\Server;
use pocketmine\player\Player;
use customiesdevs\customies\item\CustomiesItemFactory;
use pocketmine\item\VanillaItems;
use pocketmine\entity\effect\VanillaEffects;

use pocketmine\block\VanillaBlocks;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\data\bedrock\EnchantmentIdMap;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\enchantment\ItemFlags;
use pocketmine\item\enchantment\Enchantment;
use DaPigGuy\PiggyCustomEnchants\PiggyCustomEnchants;
use DaPigGuy\PiggyCustomEnchants\CustomEnchantManager;
use pocketmine\item\enchantment\StringToEnchantmentParser;
use pocketmine\item\enchantment\VanillaEnchantments;
use pocketmine\world\World;
use pocketmine\world\Position;
use pocketmine\world\Explosion;
use pocketmine\math\VoxelRayTrace;
use pocketmine\math\Vector3;
use pocketmine\entity\Entity;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;
use pocketmine\network\mcpe\protocol\AddActorPacket;
use jojoe77777\FormAPI;
use jojoe77777\FormAPI\SimpleForm;
use Abir\Pickaxe\command\CustomPickaxeCommand;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Event;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat;

use Abir\Pickaxe\item\pickaxe_leviathan;
use Abir\Pickaxe\item\pickaxe_dragon;
use Abir\Pickaxe\item\pickaxe_joker;
use Abir\Pickaxe\item\pickaxe_rock;

class main extends PluginBase implements Listener {
    const CUSTOM = "Powerfull";
    public const FAKE_ENCH_ID = -1;
     
	public function onEnable() : void {

        $this->getLogger()->info("§l§cPickaxe Loading.....");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getCommandMap()->register("pickaxe", new CustomPickaxeCommand($this, "pickaxe", "Opens Custom pickaxe Menu"));
        @mkdir($this->getDataFolder());
        $this->fakeEnchant = new EnchantmentInstance(EnchantmentIdMap::getInstance()->fromId(self::FAKE_ENCH_ID));
        $this->saveResource('config.yml', true);
        $this->getResource("config.yml");
        
    CustomiesItemFactory::getInstance()->registerItem(pickaxe_rock::class, "pickaxe:pickaxe_rock", "pickaxe_rock");
    CustomiesItemFactory::getInstance()->registerItem(pickaxe_joker::class, "pickaxe:pickaxe_joker", "pickaxe_joker");
    CustomiesItemFactory::getInstance()->registerItem(pickaxe_leviathan::class, "pickaxe:pickaxe_leviathan", "pickaxe_leviathan");
    CustomiesItemFactory::getInstance()->registerItem(pickaxe_dragon::class, "pickaxe:pickaxe_dragon", "pickaxe_dragon");
     $this->saveDefaultConfig(); 
           
           EnchantmentIdMap::getInstance()->register(self::FAKE_ENCH_ID, new Enchantment("Glow", 1, ItemFlags::ALL, ItemFlags::NONE, 1));
           
            		}
          

        
    public function form(Player $player) {
        $form = new SimpleForm(function (Player $player, int $data = null){
            if ($data === null) {
                return true;
            }
            switch ($data) {
                    
           case 0:
                    $tool1 = CustomiesItemFactory::getInstance()->get("pickaxe:pickaxe_rock");
                    $tool1->addEnchantment($this->fakeEnchant);
                    $tool1->setCustomName("§l§6PICKAXE ROCK");
                    $tool1->setLore([
    "§7A daring pickaxe it so powerfull",
    "§7It Can Break Block faster than a Normal
    Pickaxe",
    "",
    "§7The power of is Unbelievable So Use carefully!",
    "",
    "§l§bRARE",
]);
 $player->getInventory()->addItem($tool1);
              break;
              case 1:
                    $tool2 = CustomiesItemFactory::getInstance()->get("pickaxe:pickaxe_joker");
                    $tool2->addEnchantment($this->fakeEnchant);
                    $tool2->setCustomName("§l§6PICKAXE JOKER");
                    $tool2->setLore([
                "§7A Pickaxe Which Act like joker,",
                "",
                "§7This pickaxe can break Anything",
                "",
                "§7It is A Mysterious Pickaxe",
                "",
                "§l§2EPIC"
]); 

   $player->getInventory()->addItem($tool2);
          break;
             case 2:
                    $tool3 = CustomiesItemFactory::getInstance()->get("pickaxe:pickaxe_leviathan");
                    $tool3->addEnchantment($this->fakeEnchant);
                    $tool3->setCustomName("§l§6PICKAXE LEVIATHAN");
                    $tool3->setLore([
                "§7A Pickaxe Which came from The Deadly Monster Name Leviathan,",
                "",
                "§7This pickaxe is So Powerfull",
                "",
                "§7It is Sea King pickaxe",
                "",
                "§l§9LEGENDARY",
]); 

   $player->getInventory()->addItem($tool3);
          break;
          case 3:
                    $tool4 = CustomiesItemFactory::getInstance()->get("pickaxe:pickaxe_dragon");
                    $tool4->addEnchantment($this->fakeEnchant);
                    $tool4->setCustomName("§l§6PICKAXE DRAGON");
                    $tool4->setLore([
                "§7A Pickaxe Which is powefull like dragon,",
                "",
                "§7This pickaxe can Break Everything",
                "",
                "§7It is A pickaxe of god",
                "",
                "§l§4MYTHICAL",
]); 

   $player->getInventory()->addItem($tool4);
          break;
       }
   });
        $form->setTitle("§l§6Custom Pickaxe");
        $form->addButton("§r§l§bPICKAXE ROCK\n§9»» §r§6Tap To Get", 0, "textures/ui/pickaxe_rock");
        $form->addButton("§r§l§bPICKAXE JOKER\n§9»» §r§6Tap To Get", 0, "textures/ui/pickaxe_joker");
        $form->addButton("§r§l§bPICKAXE LEVIATHAN\n§9»» §r§6Tap To Get", 0, "textures/ui/pickaxe_leviathan");
        $form->addButton("§r§lPICKAXE DRAGON\n§9»» §r§6Tap To Get", 0, "textures/ui/pickaxe_dragon");
             $form->sendToPlayer($player);
        return $form;
    }
}
