        <form action="" method="post" name="ss-form-<?=$FORM_ID?>" class="ss-form ss-form-<?=$FORM_ID?>">
            <input type="hidden" name="SSForm[<?=$FORM_ID?>][action]" value="<?=$action?>" />
            <input type="hidden" name="SSForm[<?=$FORM_ID?>][uniqueId]" value="<?=hash('md5', microtime(true))?>" />
<?
foreach($fields as $f):
	try{			
		echo SSGUI::parse('form.field.'.$f['type'].'.tmpl.php', 
			array(
				'f'=>$f
				, 'FORM_ID'=>$FORM_ID
				, 'formPropertiesAndValues'=>$formPropertiesAndValues
				, 'formPropertyValueErrors'=>$formPropertyValueErrors
				, 'label_errors'=>$label_errors
			)
		);
	}catch(SSException $e) {
		echo $e;
	}
endforeach;
?>
            <? $fname = 'submit'; ?>
            <p class="ss-<?=$fname?>">
            	<? if($showRequiredFieldsInfo): ?>
            	<span class="info"><?=SSHelper::i18n('label_required_fields_info')?></span>
                <? endif; ?>
                <input id="ss-<?=$fname?>" name="SSForm[<?=$FORM_ID?>][submit]" type="submit" class="ss-<?=$fname?>" value="<?=$label_submit?>" />
            </p>
        </form>