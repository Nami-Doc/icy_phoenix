<?php /*************************************************************************** *					adr_character_skills.php *				------------------------ *	begin 			: 03/02/2004 *	copyright			: Malicious Rabbit / Dr DLP * * ***************************************************************************//*************************************************************************** * *   This program is free software; you can redistribute it and/or modify *   it under the terms of the GNU General Public License as published by *   the Free Software Foundation; either version 2 of the License, or *   (at your option) any later version. * * ***************************************************************************/define('IN_ICYPHOENIX', true); define('IN_TOWNMAP_COPYRIGHT', true);define('IN_ADR_TOWNMAP', true);define('IN_ADR_CHARACTER', true);define('IN_ADR_SKILLS', true);define('IN_ADR_SHOPS', true);define('IP_ROOT_PATH', './'); if (!defined('PHP_EXT')) define('PHP_EXT', $phpEx = substr(strrchr(__FILE__, '.'), 1));include(IP_ROOT_PATH . 'common.' . $phpEx);$loc = 'character';$sub_loc = 'adr_character_skills';//// Start session management$user->session_begin();$auth->acl($user->data);$user->setup();// End session management//include(IP_ROOT_PATH . 'adr/includes/adr_global.'.$phpEx);// Sorry , only logged users ...if ( !$userdata['session_logged_in'] ){	$redirect = "adr_character.$phpEx";	$redirect .= ( isset($user_id) ) ? '&user_id=' . $user_id : '';	header('Location: ' . append_sid("login_ip.$phpEx?redirect=$redirect", true));}// Includes the tpl and the headeradr_template_file('adr_character_skills_body.tpl');// Define the points name , adds it if not defined ( Cash Mod compliance )$board_config['points_name'] = $board_config['points_name'] ? $board_config['points_name'] : $lang['Adr_default_points_name'] ;// Who is looking at this page ?$user_id = $userdata['user_id'];if ( (!( isset($_POST[POST_USERS_URL]) || isset($_GETS[POST_USERS_URL]))) || ( empty($_POST[POST_USERS_URL]) && empty($_GETS[POST_USERS_URL]))){ 	$view_userdata = $userdata; } else { 	$view_userdata = get_userdata(intval($_GETS[POST_USERS_URL])); } $searchid = $view_userdata['user_id'];// Get the general settings$adr_general = adr_get_general_config();adr_enable_check();adr_ban_check($user_id);adr_character_created_check($user_id);// See if the user has ever created a character or no$row = adr_get_user_infos($searchid);// If someone is looking at a character's user that doesn't exist , let's display an error messageif (  !( $row['character_class'] ) && ($searchid != $user_id) ) {	message_die(GENERAL_MESSAGE, $lang['Adr_character_lack']);}$skills = adr_get_skill_data('');list($mining_percent_width, $mining_percent_empty) = adr_make_bars($row['character_skill_mining_uses'], $skills[1]['skill_req'], '250');list($stone_percent_width, $stone_percent_empty) = adr_make_bars($row['character_skill_stone_uses'], $skills[2]['skill_req'], '250');list($forge_percent_width, $forge_percent_empty) = adr_make_bars($row['character_skill_forge_uses'], $skills[3]['skill_req'], '250');list($enchantment_percent_width, $enchantment_percent_empty) = adr_make_bars($row['character_skill_enchantment_uses'], $skills[4]['skill_req'], '250');list($thief_percent_width, $thief_percent_empty) = adr_make_bars($row['character_skill_thief_uses'], $skills[6]['skill_req'], '250');list($brewing_percent_width, $brewing_percent_empty) = adr_make_bars($row['character_skill_brewing_uses'], $skills[7]['skill_req'], '250');list($cooking_percent_width, $cooking_percent_empty) = adr_make_bars($row['character_skill_cooking_uses'], $skills[12]['skill_req'], '250');list($blacksmithing_percent_width, $blacksmithing_percent_empty) = adr_make_bars($row['character_skill_blacksmithing_uses'], $skills[13]['skill_req'], '250');list($fishing_percent_width, $fishing_percent_empty) = adr_make_bars($row['character_skill_fishing_uses'], $skills[15]['skill_req'], '100');list($lumberjack_percent_width, $lumberjack_percent_empty) = adr_make_bars($row['character_skill_lumberjack_uses'], $skills[8]['skill_req'], '100');list($tailoring_percent_width, $tailoring_percent_empty) = adr_make_bars($row['character_skill_tailoring_uses'], $skills[9]['skill_req'], '100');list($herbalism_percent_width, $herbalism_percent_empty) = adr_make_bars($row['character_skill_herbalism_uses'], $skills[10]['skill_req'], '100');	list($hunting_percent_width, $hunting_percent_empty) = adr_make_bars($row['character_skill_hunting_uses'], $skills[11]['skill_req'], '100');list($alchemy_percent_width, $alchemy_percent_empty) = adr_make_bars($row['character_skill_alchemy_uses'], $skills[14]['skill_req'], '100');list($fist_percent_width, $fist_percent_empty) = adr_make_bars($row['character_skill_fist_uses'], ($row['character_skill_fist_level'] * 500), '318');list($shield_percent_width, $shield_percent_empty) = adr_make_bars($row['character_skill_shield_uses'], ($row['character_skill_shield_level'] * $adr_general['weapon_prof']), '318');list($sword_percent_width, $sword_percent_empty) = adr_make_bars($row['character_skill_sword_uses'], ($row['character_skill_sword_level'] * 500), '318');list($dirk_percent_width, $dirk_percent_empty) = adr_make_bars($row['character_skill_dirk_uses'], ($row['character_skill_dirk_level'] * 500), '318');list($ranged_percent_width, $ranged_percent_empty) = adr_make_bars($row['character_skill_ranged_uses'], ($row['character_skill_ranged_level'] * 500), '318');list($magic_percent_width, $magic_percent_empty) = adr_make_bars($row['character_skill_magic_uses'], ($row['character_skill_magic_level'] * 500), '318');list($mace_percent_width, $mace_percent_empty) = adr_make_bars($row['character_skill_mace_uses'], ($row['character_skill_mace_level'] * 500), '318');list($staff_percent_width, $staff_percent_empty) = adr_make_bars($row['character_skill_staff_uses'], ($row['character_skill_staff_level'] * 500), '318');list($axe_percent_width, $axe_percent_empty) = adr_make_bars($row['character_skill_axe_uses'], ($row['character_skill_axe_level'] * 500), '318');list($spear_percent_width, $spear_percent_empty) = adr_make_bars($row['character_skill_spear_uses'], ($row['character_skill_spear_level'] * 500), '318');list($defmagic_percent_width, $defmagic_percent_empty) = adr_make_bars($row['character_skill_defmagic_uses'], ($row['character_skill_defmagic_level'] * $adr_general['weapon_prof']), '318');list($offmagic_percent_width, $offmagic_percent_empty) = adr_make_bars($row['character_skill_offmagic_uses'], ($row['character_skill_offmagic_level'] * $adr_general['weapon_prof']), '318');$template->assign_vars(array(	'MINING' => $row['character_skill_mining'],	'MINING_IMG' => $skills[1]['skill_img'],	'MINING_MIN' => $row['character_skill_mining_uses'],	'MINING_MAX' => $skills[1]['skill_req'],	'MINING_BAR' => $mining_percent_width,	'MINING_BAR_EMPTY' => $mining_percent_empty,	'BREWING' => $row['character_skill_brewing'],	'BREWING_IMG' => $skills[7]['skill_img'],	'BREWING_MIN' => $row['character_skill_brewing_uses'],	'BREWING_MAX' => $skills[7]['skill_req'],	'BREWING_BAR' => $brewing_percent_width,	'BREWING_BAR_EMPTY' => $brewing_percent_empty,	'COOKING' => $row['character_skill_cooking'],	'COOKING_IMG' => $skills[12]['skill_img'],	'COOKING_MIN' => $row['character_skill_cooking_uses'],	'COOKING_MAX' => $skills[12]['skill_req'],	'COOKING_BAR' => $cooking_percent_width,	'COOKING_BAR_EMPTY' => $cooking_percent_empty,	'BLACKSMITHING' => $row['character_skill_blacksmithing'],	'BLACKSMITHING_IMG' => $skills[13]['skill_img'],	'BLACKSMITHING_MIN' => $row['character_skill_blacksmithing_uses'],	'BLACKSMITHING_MAX' => $skills[13]['skill_req'],	'BLACKSMITHING_BAR' => $blacksmithing_percent_width,	'BLACKSMITHING_BAR_EMPTY' => $blacksmithing_percent_empty,	'SWORD' => $row['character_skill_sword_uses'],	'DIRK' => $row['character_skill_dirk_uses'],	'RANGED' => $row['character_skill_ranged_uses'],	'MAGIC' => $row['character_skill_magic_uses'],	'MACE' => $row['character_skill_mace_uses'],	'FIST' => $row['character_skill_fist_uses'],	'STAFF' => $row['character_skill_staff_uses'],	'SPEAR' => $row['character_skill_spear_uses'],	'SHIELD' => $row['character_skill_shield_uses'],	'DEFMAGIC' => $row['character_skill_defmagic_uses'],	'OFFMAGIC' => $row['character_skill_offmagic_uses'],	'DEFMAGIC_MAX' => ($row['character_skill_defmagic_level']* $adr_general['weapon_prof']),	'OFFMAGIC_MAX' => ($row['character_skill_offmagic_level']* $adr_general['weapon_prof']),	'AXE' => $row['character_skill_axe_uses'],	'SWORD_MAX' => ($row['character_skill_sword_level'] * 500),	'DIRK_MAX' => ($row['character_skill_dirk_level'] * 500),	'RANGED_MAX' => ($row['character_skill_ranged_level'] * 500),	'MAGIC_MAX' => ($row['character_skill_magic_level'] * 500),	'MACE_MAX' => ($row['character_skill_mace_level'] * 500),	'FIST_MAX' => ($row['character_skill_fist_level'] * 500),	'STAFF_MAX' => ($row['character_skill_staff_level'] * 500),	'DEFMAGIC_LEVEL' => $row['character_skill_defmagic_level'],	'OFFMAGIC_LEVEL' => $row['character_skill_offmagic_level'],	'DEFMAGIC_PERCENT_WIDTH' => $defmagic_percent_width,	'OFFMAGIC_PERCENT_WIDTH' => $offmagic_percent_width,	'DEFMAGIC_PERCENT_EMPTY' => $defmagic_percent_empty,	'OFFMAGIC_PERCENT_EMPTY' => $offmagic_percent_empty,	'L_DEFMAGIC' => $lang['Adr_items_type_magic_defend'],	'L_OFFMAGIC' => $lang['Adr_items_type_magic_attack'],	'SPEAR_MAX' => ($row['character_skill_spear_level']* 500),	'SHIELD_MAX' => ($row['character_skill_shield_level']* $adr_general['weapon_prof']),	'AXE_MAX' => ($row['character_skill_axe_level'] * 500),	'SWORD_LEVEL' => $row['character_skill_sword_level'],	'DIRK_LEVEL' => $row['character_skill_dirk_level'],	'RANGED_LEVEL' => $row['character_skill_ranged_level'],	'MAGIC_LEVEL' => $row['character_skill_magic_level'],	'MACE_LEVEL' => $row['character_skill_mace_level'],	'FIST_LEVEL' => $row['character_skill_fist_level'],	'STAFF_LEVEL' => $row['character_skill_staff_level'],	'SPEAR_LEVEL' => $row['character_skill_spear_level'],	'SHIELD_LEVEL' => $row['character_skill_shield_level'],	'AXE_LEVEL' => $row['character_skill_axe_level'],	'FISHING' => $row['character_skill_fishing'],	'FISHING_IMG' => $skills[15]['skill_img'],	'FISHING_MIN' => $row['character_skill_fishing_uses'],	'FISHING_MAX' => $skills[15]['skill_req'],	'FISHING_BAR' => $fishing_percent_width,	'FISHING_BAR_EMPTY' => $fishing_percent_empty,	'LUMBERJACK' => $row['character_skill_lumberjack'],	'LUMBERJACK_IMG' => $skills[8]['skill_img'],	'LUMBERJACK_MIN' => $row['character_skill_lumberjack_uses'],	'LUMBERJACK_MAX' => $skills[8]['skill_req'],	'LUMBERJACK_BAR' => $lumberjack_percent_width,	'LUMBERJACK_BAR_EMPTY' => $lumberjack_percent_empty,	'TAILORING' => $row['character_skill_tailoring'],	'TAILORING_IMG' => $skills[9]['skill_img'],	'TAILORING_MIN' => $row['character_skill_tailoring_uses'],	'TAILORING_MAX' => $skills[9]['skill_req'],	'TAILORING_BAR' => $tailoring_percent_width,	'TAILORING_BAR_EMPTY' => $tailoring_percent_empty,		'HERBALISM' => $row['character_skill_herbalism'],	'HERBALISM_IMG' => $skills[10]['skill_img'],	'HERBALISM_MIN' => $row['character_skill_herbalism_uses'],	'HERBALISM_MAX' => $skills[10]['skill_req'],	'HERBALISM_BAR' => $herbalism_percent_width,	'HERBALISM_BAR_EMPTY' => $herbalism_percent_empty,	'HUNTING' => $row['character_skill_hunting'],    'HUNTING_IMG' => $skills[11]['skill_img'],    'HUNTING_MIN' => $row['character_skill_hunting_uses'],    'HUNTING_MAX' => $skills[11]['skill_req'],    'HUNTING_BAR' => $hunting_percent_width,	'HUNTING_BAR_EMPTY' => $hunting_percent_empty,	'ALCHEMY' => $row['character_skill_alchemy'],	'ALCHEMY_IMG' => $skills[14]['skill_img'],	'ALCHEMY_MIN' => $row['character_skill_alchemy_uses'],	'ALCHEMY_MAX' => $skills[14]['skill_req'],	'ALCHEMY_BAR' => $alchemy_percent_width,	'ALCHEMY_BAR_EMPTY' => $alchemy_percent_empty,	'SWORD_PERCENT_WIDTH' => $sword_percent_width,	'DIRK_PERCENT_WIDTH' => $dirk_percent_width,	'MAGIC_PERCENT_WIDTH' => $magic_percent_width,	'RANGED_PERCENT_WIDTH' => $ranged_percent_width,	'MACE_PERCENT_WIDTH' => $mace_percent_width,	'FIST_PERCENT_WIDTH' => $fist_percent_width,	'STAFF_PERCENT_WIDTH' => $staff_percent_width,	'AXE_PERCENT_WIDTH' => $axe_percent_width,	'SPEAR_PERCENT_WIDTH' => $spear_percent_width,	'SHIELD_PERCENT_WIDTH' => $shield_percent_width,	'SWORD_PERCENT_EMPTY' => $sword_percent_empty,	'DIRK_PERCENT_EMPTY' => $dirk_percent_empty,	'MAGIC_PERCENT_EMPTY' => $magic_percent_empty,	'RANGED_PERCENT_EMPTY' => $ranged_percent_empty,	'MACE_PERCENT_EMPTY' => $mace_percent_empty,	'FIST_PERCENT_EMPTY' => $fist_percent_empty,	'STAFF_PERCENT_EMPTY' => $staff_percent_empty,	'AXE_PERCENT_EMPTY' => $axe_percent_empty,	'SPEAR_PERCENT_EMPTY' => $spear_percent_empty,	'SHIELD_PERCENT_EMPTY' => $shield_percent_empty,	'STONE' => $row['character_skill_stone'],	'STONE_IMG' => $skills[2]['skill_img'],	'STONE_MIN' => $row['character_skill_stone_uses'],	'STONE_MAX' => $skills[2]['skill_req'],	'STONE_BAR' => $stone_percent_width,	'STONE_BAR_EMPTY' => $stone_percent_empty,	'FORGE' => $row['character_skill_forge'],	'FORGE_IMG' => $skills[3]['skill_img'],	'FORGE_MIN' => $row['character_skill_forge_uses'],	'FORGE_MAX' => $skills[3]['skill_req'],	'FORGE_BAR' => $forge_percent_width,	'FORGE_BAR_EMPTY' => $forge_percent_empty,	'ENCHANTMENT' => $row['character_skill_enchantment'],	'ENCHANTMENT_IMG' => $skills[4]['skill_img'],	'ENCHANTMENT_MIN' => $row['character_skill_enchantment_uses'],	'ENCHANTMENT_MAX' => $skills[4]['skill_req'],	'ENCHANTMENT_BAR' => $enchantment_percent_width,	'ENCHANTMENT_BAR_EMPTY' => $enchantment_percent_empty,	'THIEF' => $row['character_skill_thief'],	'THIEF_IMG' => $skills[6]['skill_img'],	'THIEF_MIN' => $row['character_skill_thief_uses'],	'THIEF_MAX' => $skills[6]['skill_req'],	'THIEF_BAR' => $thief_percent_width,	'THIEF_BAR_EMPTY' => $thief_percent_empty,	'L_MINING' => $lang['Adr_mining'],	'L_MINING_DESC' => adr_get_lang($skills[1]['skill_desc']),	'L_STONE' => $lang['Adr_stone'],	'L_STONE_DESC' => adr_get_lang($skills[2]['skill_desc']),	'L_FORGE' => $lang['Adr_forge'],	'L_FORGE_DESC' => adr_get_lang($skills[3]['skill_desc']),	'L_ENCHANTMENT' => $lang['Adr_enchantment'],	'L_ENCHANTMENT_DESC' => adr_get_lang($skills[4]['skill_desc']),	'L_TRADING' => $lang['Adr_trading'],	'L_TRADING_DESC' => adr_get_lang($skills[5]['skill_desc']),	'L_THIEF' => $lang['Adr_thief'],	'L_THIEF_DESC' => adr_get_lang($skills[6]['skill_desc']),	'L_BREWING' => $lang['Adr_brewing'],	'L_BREWING_DESC' => adr_get_lang($skills[7]['skill_desc']),	'L_COOKING' => $lang['Adr_cooking'],	'L_COOKING_DESC' => adr_get_lang($skills[12]['skill_desc']),	'L_BLACKSMITHING' => $lang['Adr_blacksmithing'],	'L_BLACKSMITHING_DESC' => adr_get_lang($skills[13]['skill_desc']),	'L_SWORD' => $lang['Adr_items_type_weapon'],	'L_SPECIAL' => $lang['Adr_items_type_enchanted_weapon'],	'L_DIRK' => $lang['Adr_items_type_dirk'],	'L_STAFF' => $lang['Adr_items_type_staff'],	'L_MACE' => $lang['Adr_items_type_mace'],	'L_RANGED' => $lang['Adr_items_type_ranged'],	'L_FIST' => $lang['Adr_items_type_fist'],	'L_AXE' => $lang['Adr_items_type_axe'],	'L_SPEAR' => $lang['Adr_items_type_spear'],	'L_SHIELD' => $lang['Adr_items_type_buckler'],	'L_FISHING' => $lang['Adr_fishing'],	'L_FISHING_DESC' => adr_get_lang($skills[15]['skill_desc']),	'L_LUMBERJACK' => $lang['Adr_lumberjack'],	'L_LUMBERJACK_DESC' => adr_get_lang($skills[8]['skill_desc']),	'L_TAILORING' => $lang['Adr_tailoring'],	'L_TAILORING_DESC' => adr_get_lang($skills[9]['skill_desc']),	'L_HERBALISM' => $lang['Adr_herbalism'],	'L_HERBALISM_DESC' => adr_get_lang($skills[10]['skill_desc']),	'L_HUNTING' => $lang['Adr_hunting'], 	'L_HUNTING_DESC' => adr_get_lang($skills[11]['skill_desc']),	'L_ALCHEMY' => $lang['Adr_alchemy'],	'L_ALCHEMY_DESC' => adr_get_lang($skills[14]['skill_desc']),	));$template->assign_vars(array(	'L_NAME' => $lang['Adr_races_name'],	'L_DESC' => $lang['Adr_races_desc'],	'L_IMG' => $lang['Adr_races_image'],	'L_LEVEL' => $lang['Adr_character_level'],	'L_PROGRESS' => $lang['Adr_character_progress'],	'L_CHARACTER_OF' => sprintf ( $lang['Adr_character_of'], $view_userdata['username'] ),	'L_NEW_CHARACTER_CLASS' => $lang['Adr_character_new_class'],	'L_SKILLS' => $lang['Adr_character_skills'],	'L_TOWNBOUTONRETOUR' => $lang['Adr_TownMap_Bouton_Retour'],	'L_TOWNMAPCOPYRIGHT' => $lang['TownMap_Copyright'],	'L_COPYRIGHT' => $lang['Adr_copyright'],	'U_COPYRIGHT' => append_sid("adr_copyright.$phpEx"),	'U_TOWNMAPCOPYRIGHT' => append_sid("TownMap_Copyright.$phpEx"),	'U_TOWNBOUTONRETOUR' => append_sid("adr_TownMap.$phpEx"),	'S_CHARACTER_ACTION' => append_sid("adr_character_skills.$phpEx"),));include(IP_ROOT_PATH . 'adr/includes/adr_header.'.$phpEx);$template->pparse('body');include(IP_ROOT_PATH . 'includes/page_tail.'.$phpEx); ?> 