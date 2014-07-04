<div>
	<select name="params[menu]">
		<option value="only_admin" <?php if ($vars['entity']->menu == 'only_admin') echo " selected=\"only_admin\" "; ?>><?php echo elgg_echo('option:visible_for_admin'); ?></option>
		<option value="all_users" <?php if ($vars['entity']->menu == 'all_users') echo " selected=\"all_users\" "; ?>><?php echo elgg_echo('option:visible_for_users'); ?></option>
	</select>
</div>
<div>
	<p><?php echo elgg_echo('access:also_apply_this_rule') ?></p>

    <select name="params[restricted_access]">
		<option value="restricted" <?php if ($vars['entity']->restricted_access == 'restricted') echo " selected=\"restricted\" "; ?>><?php echo elgg_echo('access:restrict_members_url'); ?></option>
		<option value="non_restricted" <?php if ($vars['entity']->restricted_access == 'non_restricted') echo " selected=\"non_restricted\" "; ?>><?php echo elgg_echo('access:non_restrict_members_url'); ?></option>
	</select>
</div>

