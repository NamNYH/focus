<?php

function routes_insert(){
	global $Translation;

	// mm: can member insert record?
	$arrPerm=getTablePermissions('routes');
	if(!$arrPerm[1]){
		return false;
	}

	$data['Ma_so_tuyen'] = makeSafe($_REQUEST['Ma_so_tuyen']);
		if($data['Ma_so_tuyen'] == empty_lookup_value){ $data['Ma_so_tuyen'] = ''; }
	$data['Ten_tuyen'] = makeSafe($_REQUEST['Ten_tuyen']);
		if($data['Ten_tuyen'] == empty_lookup_value){ $data['Ten_tuyen'] = ''; }
	$data['Thoi_gian'] = makeSafe($_REQUEST['Thoi_gian']);
		if($data['Thoi_gian'] == empty_lookup_value){ $data['Thoi_gian'] = ''; }
	$data['Gia_ve'] = makeSafe($_REQUEST['Gia_ve']);
		if($data['Gia_ve'] == empty_lookup_value){ $data['Gia_ve'] = ''; }
	$data['Don_vi_dam_nhan'] = makeSafe($_REQUEST['Don_vi_dam_nhan']);
		if($data['Don_vi_dam_nhan'] == empty_lookup_value){ $data['Don_vi_dam_nhan'] = ''; }
	

	// hook: routes_before_insert
	if(function_exists('routes_before_insert')){
		$args=array();
		if(!routes_before_insert($data, getMemberInfo(), $args)){ return false; }
	}

	$o = array('silentErrors' => true);
	sql('insert into `routes` set `Ma_so_tuyen`=' . (($data['Ma_so_tuyen'] !== '' && $data['Ma_so_tuyen'] !== NULL) ? "'{$data['Ma_so_tuyen']}'" : 'NULL') . ', `Ten_tuyen`=' . (($data['Ten_tuyen'] !== '' && $data['Ten_tuyen'] !== NULL) ? "'{$data['Ten_tuyen']}'" : 'NULL') . ', `Thoi_gian`=' . (($data['Thoi_gian'] !== '' && $data['Thoi_gian'] !== NULL) ? "'{$data['Thoi_gian']}'" : 'NULL') . ', `Gia_ve`=' . (($data['Gia_ve'] !== '' && $data['Gia_ve'] !== NULL) ? "'{$data['Gia_ve']}'" : 'NULL') . ', `Don_vi_dam_nhan`=' . (($data['Don_vi_dam_nhan'] !== '' && $data['Don_vi_dam_nhan'] !== NULL) ? "'{$data['Don_vi_dam_nhan']}'" : 'NULL'), $o);
	if($o['error']!=''){
		echo $o['error'];
		echo "<a href=\"routes_view.php?addNew_x=1\">{$Translation['< back']}</a>";
		exit;
	}

	$recID = db_insert_id(db_link());

	// hook: routes_after_insert
	if(function_exists('routes_after_insert')){
		$res = sql("select * from `routes` where `id`='" . makeSafe($recID, false) . "' limit 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=array();
		if(!routes_after_insert($data, getMemberInfo(), $args)){ return $recID; }
	}

	// mm: save ownership data
	set_record_owner('routes', $recID, getLoggedMemberID());

	return $recID;
}

function routes_delete($selected_id, $AllowDeleteOfParents=false, $skipChecks=false){
	// insure referential integrity ...
	global $Translation;
	$selected_id=makeSafe($selected_id);

	// mm: can member delete record?
	$arrPerm=getTablePermissions('routes');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='routes' and pkValue='$selected_id'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='routes' and pkValue='$selected_id'");
	if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
		// delete allowed, so continue ...
	}else{
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: routes_before_delete
	if(function_exists('routes_before_delete')){
		$args=array();
		if(!routes_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'];
	}

	// child table: availability
	$res = sql("select `id` from `routes` where `id`='$selected_id'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("select count(1) from `availability` where `route`='".addslashes($id[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "availability", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "availability", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='routes_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='routes_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	sql("delete from `routes` where `id`='$selected_id'", $eo);

	// hook: routes_after_delete
	if(function_exists('routes_after_delete')){
		$args=array();
		routes_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("delete from membership_userrecords where tableName='routes' and pkValue='$selected_id'", $eo);
}

function routes_update($selected_id){
	global $Translation;

	// mm: can member edit record?
	$arrPerm=getTablePermissions('routes');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='routes' and pkValue='".makeSafe($selected_id)."'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='routes' and pkValue='".makeSafe($selected_id)."'");
	if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){ // allow update?
		// update allowed, so continue ...
	}else{
		return false;
	}

	

	$data['Ma_so_tuyen'] = makeSafe($_REQUEST['Ma_so_tuyen']);
		if($data['Ma_so_tuyen'] == empty_lookup_value){ $data['Ma_so_tuyen'] = ''; }
	$data['Ten_tuyen'] = makeSafe($_REQUEST['Ten_tuyen']);
		if($data['Ten_tuyen'] == empty_lookup_value){ $data['Ten_tuyen'] = ''; }
	$data['Thoi_gian'] = makeSafe($_REQUEST['Thoi_gian']);
		if($data['Thoi_gian'] == empty_lookup_value){ $data['Thoi_gian'] = ''; }
	$data['Gia_ve'] = makeSafe($_REQUEST['Gia_ve']);
		if($data['Gia_ve'] == empty_lookup_value){ $data['Gia_ve'] = ''; }
	$data['Don_vi_dam_nhan'] = makeSafe($_REQUEST['Don_vi_dam_nhan']);
		if($data['Don_vi_dam_nhan'] == empty_lookup_value){ $data['Don_vi_dam_nhan'] = ''; }
	$data['selectedID']=makeSafe($selected_id);
	

	// hook: routes_before_update
	if(function_exists('routes_before_update')){
		$args=array();
		if(!routes_before_update($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('update `routes` set `Ma_so_tuyen`=' . (($data['Ma_so_tuyen'] !== '' && $data['Ma_so_tuyen'] !== NULL) ? "'{$data['Ma_so_tuyen']}'" : 'NULL') . ', `Ten_tuyen`=' . (($data['Ten_tuyen'] !== '' && $data['Ten_tuyen'] !== NULL) ? "'{$data['Ten_tuyen']}'" : 'NULL') . ', `Thoi_gian`=' . (($data['Thoi_gian'] !== '' && $data['Thoi_gian'] !== NULL) ? "'{$data['Thoi_gian']}'" : 'NULL') . ', `Gia_ve`=' . (($data['Gia_ve'] !== '' && $data['Gia_ve'] !== NULL) ? "'{$data['Gia_ve']}'" : 'NULL') . ', `Don_vi_dam_nhan`=' . (($data['Don_vi_dam_nhan'] !== '' && $data['Don_vi_dam_nhan'] !== NULL) ? "'{$data['Don_vi_dam_nhan']}'" : 'NULL') . " where `id`='".makeSafe($selected_id)."'", $o);
	if($o['error']!=''){
		echo $o['error'];
		echo '<a href="routes_view.php?SelectedID='.urlencode($selected_id)."\">{$Translation['< back']}</a>";
		exit;
	}


	// hook: routes_after_update
	if(function_exists('routes_after_update')){
		$res = sql("SELECT * FROM `routes` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = $data['id'];
		$args = array();
		if(!routes_after_update($data, getMemberInfo(), $args)){ return; }
	}

	// mm: update ownership data
	sql("update membership_userrecords set dateUpdated='".time()."' where tableName='routes' and pkValue='".makeSafe($selected_id)."'", $eo);

}

function routes_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0, $TemplateDV = '', $TemplateDVP = ''){
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm=getTablePermissions('routes');
	if(!$arrPerm[1] && $selected_id==''){ return ''; }
	$AllowInsert = ($arrPerm[1] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != ''){
		$dvprint = true;
	}


	// populate filterers, starting from children to grand-parents

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: time
	$combo_time = new Combo;
	$combo_time->ListType = 0;
	$combo_time->MultipleSeparator = ', ';
	$combo_time->ListBoxHeight = 10;
	$combo_time->RadiosPerLine = 1;
	if(is_file(dirname(__FILE__).'/hooks/routes.time.csv')){
		$time_data = addslashes(implode('', @file(dirname(__FILE__).'/hooks/routes.time.csv')));
		$combo_time->ListItem = explode('||', entitiesToUTF8(convertLegacyOptions($time_data)));
		$combo_time->ListData = $combo_time->ListItem;
	}else{
		$combo_time->ListItem = explode('||', entitiesToUTF8(convertLegacyOptions("day;;night")));
		$combo_time->ListData = $combo_time->ListItem;
	}
	$combo_time->SelectName = 'time';

	if($selected_id){
		// mm: check member permissions
		if(!$arrPerm[2]){
			return "";
		}
		// mm: who is the owner?
		$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='routes' and pkValue='".makeSafe($selected_id)."'");
		$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='routes' and pkValue='".makeSafe($selected_id)."'");
		if($arrPerm[2]==1 && getLoggedMemberID()!=$ownerMemberID){
			return "";
		}
		if($arrPerm[2]==2 && getLoggedGroupID()!=$ownerGroupID){
			return "";
		}

		// can edit?
		if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){
			$AllowUpdate=1;
		}else{
			$AllowUpdate=0;
		}

		$res = sql("select * from `routes` where `id`='".makeSafe($selected_id)."'", $eo);
		if(!($row = db_fetch_array($res))){
			return error_message($Translation['No records found'], 'routes_view.php', false);
		}
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input();
		$row = $hc->xss_clean($row); /* sanitize data */
		$combo_time->SelectedData = $row['time'];
	}else{
		$combo_time->SelectedText = ( $_REQUEST['FilterField'][1]=='3' && $_REQUEST['FilterOperator'][1]=='<=>' ? (get_magic_quotes_gpc() ? stripslashes($_REQUEST['FilterValue'][1]) : $_REQUEST['FilterValue'][1]) : "");
	}
	$combo_time->Render();

	ob_start();
	?>

	<script>
		// initial lookup values

		jQuery(function() {
			setTimeout(function(){
			}, 10); /* we need to slightly delay client-side execution of the above code to allow AppGini.ajaxCache to work */
		});
	</script>
	<?php

	$lookups = str_replace('__RAND__', $rnd1, ob_get_contents());
	ob_end_clean();


	// code for template based detail view forms

	// open the detail view template
	if($dvprint){
		$template_file = is_file("./{$TemplateDVP}") ? "./{$TemplateDVP}" : './templates/routes_templateDVP.html';
		$templateCode = @file_get_contents($template_file);
	}else{
		$template_file = is_file("./{$TemplateDV}") ? "./{$TemplateDV}" : './templates/routes_templateDV.html';
		$templateCode = @file_get_contents($template_file);
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Route details', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert){
		if(!$selected_id) $templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return routes_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return routes_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
	}else{
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '', $templateCode);
	}

	// 'Back' button action
	if($_REQUEST['Embedded']){
		$backAction = 'AppGini.closeParentModal(); return false;';
	}else{
		$backAction = '$j(\'form\').eq(0).attr(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;';
	}

	if($selected_id){
		if(!$_REQUEST['Embedded']) $templateCode = str_replace('<%%DVPRINT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="dvprint" name="dvprint_x" value="1" onclick="$$(\'form\')[0].writeAttribute(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;" title="' . html_attr($Translation['Print Preview']) . '"><i class="glyphicon glyphicon-print"></i> ' . $Translation['Print Preview'] . '</button>', $templateCode);
		if($AllowUpdate){
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return routes_validateData();" title="' . html_attr($Translation['Save Changes']) . '"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
		}else{
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		}
		if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '<button type="submit" class="btn btn-danger" id="delete" name="delete_x" value="1" onclick="return confirm(\'' . $Translation['are you sure?'] . '\');" title="' . html_attr($Translation['Delete']) . '"><i class="glyphicon glyphicon-trash"></i> ' . $Translation['Delete'] . '</button>', $templateCode);
		}else{
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		}
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>', $templateCode);
	}else{
		$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', ($ShowCancel ? '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>' : ''), $templateCode);
	}

	// set records to read only if user can't insert new records and can't edit current record
	if(($selected_id && !$AllowUpdate && !$AllowInsert) || (!$selected_id && !$AllowInsert)){
		$jsReadOnly .= "\tjQuery('#Ma_so_tuyen').replaceWith('<div class=\"form-control-static\" id=\"Ma_so_tuyen\">' + (jQuery('#Ma_so_tuyen').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#Ten_tuyen').replaceWith('<div class=\"form-control-static\" id=\"Ten_tuyen\">' + (jQuery('#Ten_tuyen').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#Thoi_gian').replaceWith('<div class=\"form-control-static\" id=\"Thoi_gian\">' + (jQuery('#Thoi_gian').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#Gia_ve').replaceWith('<div class=\"form-control-static\" id=\"Gia_ve\">' + (jQuery('#Gia_ve').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#Don_vi_dam-nhan').replaceWith('<div class=\"form-control-static\" id=\"Don_vi_dam-nhan\">' + (jQuery('#Don_vi_dam-nhan').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	}elseif($AllowInsert){
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode = str_replace('<%%COMBO(time)%%>', $combo_time->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(time)%%>', $combo_time->SelectedData, $templateCode);

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array();
	foreach($lookup_fields as $luf => $ptfc){
		$pt_perm = getTablePermissions($ptfc[0]);

		// process foreign key links
		if($pt_perm['view'] || $pt_perm['edit']){
			$templateCode = str_replace("<%%PLINK({$luf})%%>", '<button type="button" class="btn btn-default view_parent hspacer-md" id="' . $ptfc[0] . '_view_parent" title="' . html_attr($Translation['View'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-eye-open"></i></button>', $templateCode);
		}

		// if user has insert permission to parent table of a lookup field, put an add new button
		if($pt_perm['insert'] && !$_REQUEST['Embedded']){
			$templateCode = str_replace("<%%ADDNEW({$ptfc[0]})%%>", '<button type="button" class="btn btn-success add_new_parent hspacer-md" id="' . $ptfc[0] . '_add_new" title="' . html_attr($Translation['Add New'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-plus-sign"></i></button>', $templateCode);
		}
	}

	// process images
	$templateCode = str_replace('<%%UPLOADFILE(id)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(Ma_so_tuyen)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(Ten_tuyen)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(Thoi_gian)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(Gia_ve)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(Don_vi_dam_nhan)%%>', '', $templateCode);

	// process values
	if($selected_id){
		if( $dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', safe_html($urow['id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', html_attr($row['id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(Ma_so_tuyen)%%>', safe_html($urow['Ma_so_tuyen']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(Ma_so_tuyen)%%>', html_attr($row['Ma_so_tuyen']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(Ma_so_tuyen)%%>', urlencode($urow['Ma_so_tuyen']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(Ten_tuyen)%%>', safe_html($urow['Ten_tuyen']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(Ten_tuyen)%%>', html_attr($row['Ten_tuyen']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(Ten_tuyen)%%>', urlencode($urow['Ten_tuyen']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(Thoi_gian)%%>', safe_html($urow['Thoi_gian']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(Thoi_gian)%%>', html_attr($row['Thoi_gian']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(Thoi_gian)%%>', urlencode($urow['Thoi_gian']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(name)%%>', urlencode($urow['name']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(Gia_ve)%%>', safe_html($urow['Gia_ve']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(Gia_ve)%%>', html_attr($row['Gia_ve']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(Gia_ve)%%>', urlencode($urow['Gia_ve']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(Don_vi_dam_nhan)%%>', safe_html($urow['Don_vi_dam_nhan']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(Don_vi_dam_nhan)%%>', html_attr($row['Don_vi_dam_nhan']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(Don_vi_dam_nhan)%%>', urlencode($urow['Don_vi_dam_nhan']), $templateCode);
	}else{
		$templateCode = str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(Ma_so_tuyen)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(Ma_so_tuyen)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(Ten_tuyen)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(Ten_tuyen)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(Thoi_gian)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(Thoi_gian)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(Gia_ve)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(Gia_ve)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(Don_vi_dam_nhan)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(Don_vi_dam_nhan)%%>', urlencode(''), $templateCode);
	}

	// process translations
	foreach($Translation as $symbol=>$trans){
		$templateCode = str_replace("<%%TRANSLATION($symbol)%%>", $trans, $templateCode);
	}

	// clear scrap
	$templateCode = str_replace('<%%', '<!-- ', $templateCode);
	$templateCode = str_replace('%%>', ' -->', $templateCode);

	// hide links to inaccessible tables
	if($_REQUEST['dvprint_x'] == ''){
		$templateCode .= "\n\n<script>\$j(function(){\n";
		$arrTables = getTableList();
		foreach($arrTables as $name => $caption){
			$templateCode .= "\t\$j('#{$name}_link').removeClass('hidden');\n";
			$templateCode .= "\t\$j('#xs_{$name}_link').removeClass('hidden');\n";
		}

		$templateCode .= $jsReadOnly;
		$templateCode .= $jsEditable;

		if(!$selected_id){
		}

		$templateCode.="\n});</script>\n";
	}

	// ajaxed auto-fill fields
	$templateCode .= '<script>';
	$templateCode .= '$j(function() {';


	$templateCode.="});";
	$templateCode.="</script>";
	$templateCode .= $lookups;

	// handle enforced parent values for read-only lookup fields

	// don't include blank images in lightbox gallery
	$templateCode = preg_replace('/blank.gif" data-lightbox=".*?"/', 'blank.gif"', $templateCode);

	// don't display empty email links
	$templateCode=preg_replace('/<a .*?href="mailto:".*?<\/a>/', '', $templateCode);

	/* default field values */
	$rdata = $jdata = get_defaults('routes');
	if($selected_id){
		$jdata = get_joined_record('routes', $selected_id);
		if($jdata === false) $jdata = get_defaults('routes');
		$rdata = $row;
	}
	$cache_data = array(
		'rdata' => array_map('nl2br', array_map('html_attr_tags_ok', $rdata)),
		'jdata' => array_map('nl2br', array_map('html_attr_tags_ok', $jdata))
	);
	$templateCode .= loadView('routes-ajax-cache', $cache_data);

	// hook: routes_dv
	if(function_exists('routes_dv')){
		$args=array();
		routes_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}
?>