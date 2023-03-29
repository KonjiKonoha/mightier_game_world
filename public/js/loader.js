////////////////////////////////////////////////////////////
// CANVAS LOADER
////////////////////////////////////////////////////////////

 /*!
 *
 * START CANVAS PRELOADER - This is the function that runs to preload canvas asserts
 *
 */
function initPreload(){
	toggleLoader(true);

	checkMobileEvent();

	$(window).resize(function(){
		resizeGameFunc();
	});
	resizeGameFunc();

	loader = new createjs.LoadQueue(false);
	manifest=[
			{src: asset_url + 'assets/logo.png', id:'logo'},
			{src: asset_url + 'assets/button_start.png', id:'buttonStart'},

			//multi-line slots
			{src: asset_url + 'assets/multiple/item_machine.png', id:'itemMachine'},
			{src: asset_url + 'assets/multiple/frame_Spritesheet5x1.png', id:'itemSlotFrame'},
			{src: asset_url + 'assets/multiple/item_shadow.png', id:'itemShadow'},
			{src: asset_url + 'assets/multiple/item_info.png', id:'itemInfo'},

			//classic three line slots
			//{src:'assets/classic/item_machine.png', id:'itemMachine'},
			//{src:'assets/classic/frame_Spritesheet5x1.png', id:'itemSlotFrame'},
			//{src:'assets/classic/item_shadow.png', id:'itemShadow'},
			//{src:'assets/classic/item_info.png', id:'itemInfo'},

			{src: asset_url + 'assets/button_close.png', id:'buttonClose'},
			{src: asset_url + 'assets/button_info.png', id:'buttonInfo'},
			{src: asset_url + 'assets/button_lines.png', id:'buttonLines'},
			{src:asset_url + 'assets/button_bet.png', id:'buttonBet'},
			{src:asset_url + 'assets/button_maxbet.png', id:'buttonMaxBet'},
			{src:asset_url + 'assets/button_spin.png', id:'buttonSpin'},
			{src:asset_url + 'assets/item_display.png', id:'itemDisplay'},
			{src:asset_url + 'assets/handle_Spritesheet5x1.png', id:'itemHandle'},
			{src:asset_url + 'assets/credit_Spritesheet3x2.png', id:'itemCreditAnimate'},

			{src:asset_url + 'assets/line_display_off.png', id:'itemLineDisplayOff'},
			{src:asset_url + 'assets/line_display_on.png', id:'itemLineDisplayOn'},

			{src:asset_url + 'assets/item_credit.png', id:'itemCredit'},
			{src:asset_url + 'assets/item_credit_alert.png', id:'itemCreditAlert'},

			{src:asset_url + 'assets/button_confirm.png', id:'buttonConfirm'},
			{src:asset_url + 'assets/button_cancel.png', id:'buttonCancel'},
			{src:asset_url + 'assets/item_exit.png', id:'itemExit'},

			{src:asset_url + 'assets/button_continue.png', id:'buttonContinue'},
			{src:asset_url + 'assets/item_result.png', id:'itemResult'},
			{src:asset_url + 'assets/button_facebook.png', id:'buttonFacebook'},
			{src:asset_url + 'assets/button_twitter.png', id:'buttonTwitter'},
			{src:asset_url + 'assets/button_whatsapp.png', id:'buttonWhatsapp'},
			{src:asset_url + 'assets/button_fullscreen.png', id:'buttonFullscreen'},
			{src:asset_url + 'assets/button_sound_on.png', id:'buttonSoundOn'},
			{src:asset_url + 'assets/button_sound_off.png', id:'buttonSoundOff'},
			{src:asset_url + 'assets/button_exit.png', id:'buttonExit'},
			{src:asset_url + 'assets/button_setting.png', id:'buttonSettings'}];

	//memberpayment
	if(typeof memberData != 'undefined' && memberSettings.enableMembership){
		addMemberRewardAssets();
	}

	for(var n = 0; n<slots_arr.length; n++){
		manifest.push({src:slots_arr[n].static, id:'slot'+n});
		manifest.push({src:slots_arr[n].animate, id:'slotAnimate'+n});
	}

	if ( typeof addScoreboardAssets == 'function' ) {
		addScoreboardAssets();
	}

	soundOn = true;
	if($.browser.mobile || isTablet){
		if(!enableMobileSound){
			soundOn=false;
		}
	}

	if(soundOn){
		manifest.push({src:asset_url + 'assets/sounds/click.ogg', id:'soundClick'});
		manifest.push({src:asset_url + 'assets/sounds/result.ogg', id:'soundResult'});
		manifest.push({src:asset_url + 'assets/sounds/puller.ogg', id:'soundPuller'});
		manifest.push({src:asset_url + 'assets/sounds/stop.ogg', id:'soundStop'});
		manifest.push({src:asset_url + 'assets/sounds/spin.ogg', id:'soundSpin'});
		manifest.push({src:asset_url + 'assets/sounds/win.ogg', id:'soundWin'});
		manifest.push({src:asset_url + 'assets/sounds/alert.ogg', id:'soundAlert'});

		createjs.Sound.alternateExtensions = ["mp3"];
		loader.installPlugin(createjs.Sound);
	}

	loader.addEventListener("complete", handleComplete);
	loader.addEventListener("fileload", fileComplete);
	loader.addEventListener("error",handleFileError);
	loader.on("progress", handleProgress, this);
	loader.loadManifest(manifest);
}

/*!
 *
 * CANVAS FILE COMPLETE EVENT - This is the function that runs to update when file loaded complete
 *
 */
function fileComplete(evt) {
	var item = evt.item;
	//console.log("Event Callback file loaded ", evt.item.id);
}

/*!
 *
 * CANVAS FILE HANDLE EVENT - This is the function that runs to handle file error
 *
 */
function handleFileError(evt) {
	console.log("error ", evt);
}

/*!
 *
 * CANVAS PRELOADER UPDATE - This is the function that runs to update preloder progress
 *
 */
function handleProgress() {
	$('#mainLoader span').html(Math.round(loader.progress/1*100)+'%');
}

/*!
 *
 * CANVAS PRELOADER COMPLETE - This is the function that runs when preloader is complete
 *
 */
function handleComplete() {
	toggleLoader(false);
	initMain();
};

/*!
 *
 * TOGGLE LOADER - This is the function that runs to display/hide loader
 *
 */
function toggleLoader(con){
	if(con){
		$('#mainLoader').show();
	}else{
		$('#mainLoader').hide();
	}
}
