<?php
declare(strict_types=1);

namespace Abir\Pickaxe\item;

use customiesdevs\customies\item\component\HandEquippedComponent;
use customiesdevs\customies\item\CreativeInventoryInfo;
use customiesdevs\customies\item\ItemComponentsTrait;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ToolTier;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;

class pickaxe_joker extends \pocketmine\item\Pickaxe implements \customiesdevs\customies\item\ItemComponents{
	use ItemComponentsTrait {
		getComponents as _getComponents;
	}

	public function __construct(ItemIdentifier $identifier, string $name){
		parent::__construct($identifier, $name, ToolTier::DIAMOND());
		$this->initComponent("pickaxe_joker", new CreativeInventoryInfo(CreativeInventoryInfo::CATEGORY_EQUIPMENT, CreativeInventoryInfo::GROUP_PICKAXE));
		$this->addComponent(new HandEquippedComponent(true));
	}

	public function getMaxDurability() : int{
		return 2031;
	}

	protected function getBaseMiningEfficiency() : float{
		return 12;
	}

	public function getComponents() : CompoundTag{
		$itemData = $this->_getComponents();
		$digger = CompoundTag::create()
			->setByte("use_efficiency", 1);
		$destroy_speeds = new ListTag();
		foreach(
			[
				"minecraft:stone_slab",
				"minecraft:stone_slab2",
				"minecraft:stone_slab3",
				"minecraft:stone_slab4",
				"minecraft:gold_ore",
				"minecraft:blackstone_double_slab",
				"minecraft:double_cut_copper_slab",
				"minecraft:exposed_double_cut_copper_slab",
				"minecraft:weathered_double_cut_copper_slab",
				"minecraft:oxidized_double_cut_copper_slab",
				"minecraft:waxed_double_cut_copper_slab",
				"minecraft:waxed_exposed_double_cut_copper_slab",
				"minecraft:waxed_weathered_double_cut_copper_slab",
				"minecraft:waxed_oxidized_double_cut_copper_slab",
				"minecraft:lit_redstone_ore",
				"minecraft:deepslate_coal_ore",
				"minecraft:deepslate_copper_ore",
				"minecraft:deepslate_iron_ore",
				"minecraft:deepslate_gold_ore",
				"minecraft:lit_deepslate_redstone_ore",
				"minecraft:deepslate_diamond_ore",
				"minecraft:deepslate_emerald_ore",
				"minecraft:lit_redstone_ore",
				"minecraft:hardened_clay",
				"minecraft:stained_hardened_clay",
				"minecraft:hardened_clay",
				"minecraft:stained_hardened_clay",
				"minecraft:ice",
				"minecraft:sandstone",
				"minecraft:blackstone",
				"minecraft:polished_blackstone_bricks",
				"minecraft:polished_blackstone_brick_stairs",
				"minecraft:blackstone_stairs",
				"minecraft:blackstone_wall",
				"minecraft:polished_blackstone_brick_wall",
				"minecraft:chiseled_polished_blackstone",
				"minecraft:cracked_polished_blackstone_bricks",
				"minecraft:gilded_blackstone",
				"minecraft:blackstone_slab",
				"minecraft:blackstone_double_slab",
				"minecraft:polished_blackstone_brick_slab",
				"minecraft:polished_blackstone_brick_double_slab",
				"minecraft:polished_blackstone",
				"minecraft:polished_blackstone_stairs",
				"minecraft:polished_blackstone_slab",
				"minecraft:polished_blackstone_double_slab",
				"minecraft:polished_blackstone_pressure_plate",
				"minecraft:polished_blackstone_button",
				"minecraft:polished_blackstone_wall",
				"minecraft:crying_obsidian",
				"minecraft:obsidian",
				"minecraft:netherite_block",
				"minecraft:emerald_ore",
				"minecraft:quartz_ore",
				"minecraft:nether_gold_ore",
				"minecraft:diamond_block",
				"minecraft:emerald_block",
				"minecraft:coal_block",
				"minecraft:lapis_block",
				"minecraft:redstone_block",
				"minecraft:red_sandstone",
				"minecraft:stonebrick",
				"minecraft:end_bricks",
				"minecraft:prismarine",
				"minecraft:purpur_block",
				"minecraft:quartz_block",
				"minecraft:quartz_bricks",
				"minecraft:smooth_stone",
				"minecraft:nether_brick",
				"minecraft:red_nether_brick",
				"minecraft:chiseled_nether_bricks",
				"minecraft:cracked_nether_bricks",
				"minecraft:bone_block",
				"minecraft:concrete",
				"minecraft:honeycomb_block",
				"minecraft:packed_ice",
				"minecraft:blue_ice",
				"minecraft:ancient_debris",
				"minecraft:netherrack",
				"minecraft:magma",
				"minecraft:mob_spawner",
				"minecraft:end_stone",
				"minecraft:ender_chest",
				"minecraft:shulker_box",
				"minecraft:undyed_shulker_box",
				"minecraft:basalt",
				"minecraft:polished_basalt",
				"minecraft:crimson_nylium",
				"minecraft:warped_nylium",
				"minecraft:coral",
				"minecraft:coral_block",
				"minecraft:coral_fan",
				"minecraft:coral_fan_dead",
				"minecraft:coral_fan_hang",
				"minecraft:coral_fan_hang2",
				"minecraft:coral_fan_hang3",
				"minecraft:purple_glazed_terracotta",
				"minecraft:white_glazed_terracotta",
				"minecraft:orange_glazed_terracotta",
				"minecraft:magenta_glazed_terracotta",
				"minecraft:light_blue_glazed_terracotta",
				"minecraft:yellow_glazed_terracotta",
				"minecraft:lime_glazed_terracotta",
				"minecraft:pink_glazed_terracotta",
				"minecraft:gray_glazed_terracotta",
				"minecraft:silver_glazed_terracotta",
				"minecraft:cyan_glazed_terracotta",
				"minecraft:blue_glazed_terracotta",
				"minecraft:brown_glazed_terracotta",
				"minecraft:green_glazed_terracotta",
				"minecraft:red_glazed_terracotta",
				"minecraft:black_glazed_terracotta",
				"minecraft:lantern",
				"minecraft:soul_lantern",
				"minecraft:grindstone",
				"minecraft:anvil",
				"minecraft:respawn_anchor",
				"minecraft:smoker",
				"minecraft:lit_smoker",
				"minecraft:beacon",
				"minecraft:conduit",
				"minecraft:bell",
				"minecraft:stonecutter",
				"minecraft:enchanting_table",
				"minecraft:furnace",
				"minecraft:lit_furnace",
				"minecraft:blast_furnace",
				"minecraft:lit_blast_furnace",
				"minecraft:observer",
				"minecraft:chain",
				"minecraft:dispenser",
				"minecraft:dropper",
				"minecraft:hopper",
				"minecraft:stonecutter_block",
				"minecraft:stone_slab",
				"minecraft:stone_slab2",
				"minecraft:stone_slab3",
				"minecraft:double_stone_slab",
				"minecraft:stone_stairs",
				"minecraft:brick_stairs",
				"minecraft:stone_brick_stairs",
				"minecraft:nether_brick_stairs",
				"minecraft:sandstone_stairs",
				"minecraft:quartz_stairs",
				"minecraft:red_sandstone_stairs",
				"minecraft:purpur_stairs",
				"minecraft:prismarine_stairs",
				"minecraft:prismarine_bricks_stairs",
				"minecraft:dark_prismarine_stairs",
				"minecraft:granite_stairs",
				"minecraft:diorite_stairs",
				"minecraft:polished_granite_stairs",
				"minecraft:andesite_stairs",
				"minecraft:polished_diorite_stairs",
				"minecraft:mossy_stone_brick_stairs",
				"minecraft:smooth_red_sandstone_stairs",
				"minecraft:smooth_sandstone_stairs",
				"minecraft:end_brick_stairs",
				"minecraft:mossy_cobblestone_stairs",
				"minecraft:normal_stone_stairs",
				"minecraft:red_nether_brick_stairs",
				"minecraft:smooth_quartz_stairs",
				"minecraft:polished_andesite_stairs",
				"minecraft:brewing_stand",
				"minecraft:lodestone",
				"minecraft:iron_door",
				"minecraft:iron_bars",
				"minecraft:iron_trapdoor",
				"minecraft:golden_rail",
				"minecraft:detector_rail",
				"minecraft:rail",
				"minecraft:activator_rail",
				"minecraft:nether_brick_fence",
				"minecraft:respawn_anchor",
				"minecraft:smooth_basalt",
				"minecraft:calcite",
				"minecraft:tuff",
				"minecraft:amethyst_block",
				"minecraft:budding_amethyst",
				"minecraft:dripstone_block",
				"minecraft:waxed_copper",
				"minecraft:waxed_cut_copper",
				"minecraft:waxed_cut_copper_slab",
				"minecraft:waxed_cut_copper_stairs",
				"minecraft:waxed_exposed_copper",
				"minecraft:waxed_exposed_cut_copper",
				"minecraft:waxed_exposed_cut_copper_slab",
				"minecraft:waxed_exposed_cut_copper_stairs",
				"minecraft:waxed_oxidized_copper",
				"minecraft:waxed_oxidized_cut_copper",
				"minecraft:waxed_oxidized_cut_copper_slab",
				"minecraft:waxed_oxidized_cut_copper_stairs",
				"minecraft:waxed_weathered_copper",
				"minecraft:waxed_weathered_cut_copper",
				"minecraft:waxed_weathered_cut_copper_slab",
				"minecraft:waxed_weathered_cut_copper_stairs",
				"minecraft:copper_block",
				"minecraft:copper_ore",
				"minecraft:cut_copper",
				"minecraft:cut_copper_slab",
				"minecraft:cut_copper_stairs",
				"minecraft:deepslate_copper_ore",
				"minecraft:exposed_copper",
				"minecraft:exposed_cut_copper",
				"minecraft:exposed_cut_copper_slab",
				"minecraft:exposed_cut_copper_stairs",
				"minecraft:oxidized_copper",
				"minecraft:oxidized_cut_copper",
				"minecraft:oxidized_cut_copper_slab",
				"minecraft:oxidized_cut_copper_stairs",
				"minecraft:raw_copper_block",
				"minecraft:weathered_copper",
				"minecraft:weathered_cut_copper",
				"minecraft:weathered_cut_copper_slab",
				"minecraft:weathered_cut_copper_stairs",
				"minecraft:deepslate",
				"minecraft:deepslate_brick_slab",
				"minecraft:deepslate_brick_stairs",
				"minecraft:deepslate_brick_wall",
				"minecraft:deepslate_bricks",
				"minecraft:deepslate_lapis_ore",
				"minecraft:deepslate_tile_slab",
				"minecraft:deepslate_tile_stairs",
				"minecraft:deepslate_tile_wall",
				"minecraft:deepslate_tiles",
				"minecraft:chiseled_deepslate",
				"minecraft:cobbled_deepslate",
				"minecraft:cobbled_deepslate_slab",
				"minecraft:cobbled_deepslate_stairs",
				"minecraft:cobbled_deepslate_wall",
				"minecraft:cracked_deepslate_bricks",
				"minecraft:cracked_deepslate_tiles",
				"minecraft:polished_deepslate",
				"minecraft:polished_deepslate_slab",
				"minecraft:polished_deepslate_stairs",
				"minecraft:polished_deepslate_wall",
				"minecraft:diamond_ore",
				"minecraft:redstone_ore",
				"minecraft:iron_ore",
				"minecraft:lapis_ore",
				"minecraft:coal_ore"
			] as $block){
			$destroy_speeds->push(CompoundTag::create()
				->setString("block", $block)
				->setInt("speed", 12)
			);
		}
		$destroy_speeds->push(CompoundTag::create()
			->setTag("block", CompoundTag::create()
				->setString("tags", "(query.any_tag('stone', 'metal', 'cobblestone', 'bricks', 'iron_pick_diggable'))")
			)
			->setInt("speed", 12)
		);
		return $itemData->setTag("components", $itemData->getCompoundTag("components")
			->setTag("minecraft:digger", $digger->setTag("destroy_speeds", $destroy_speeds))
		);
	}
}
