<html>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<link type="text/css" href="skin/jplayer.blue.monday.css"
	rel="stylesheet" />

<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script
	src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>

<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/recorder.js"></script>
<script language="JavaScript"
	src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
<script src="js/jquery.jplayer.min.js"></script>



<script type="text/javascript">
	$(function() {
		var appWidth = 24;
		var appHeight = 24;
		var flashvars = {
			'event_handler' : 'microphone_recorder_events',
			'upload_image' : 'images/upload.png'
		};
		var params = {};
		var attributes = {
			'id' : "recorderApp",
			'name' : "recorderApp"
		};
		swfobject.embedSWF("recorder.swf", "flashcontent", appWidth, appHeight,
				"10.1.0", "", flashvars, params, attributes);
	});
</script>


<style>
label {
	width: 10em;
	float: left;
}

label.error {
	float: none;
	color: red;
	padding-left: .5em;
	vertical-align: top;
}

p {
	clear: both;
}

#control_panel {
	white-space: nowrap;
}

#control_panel a {
	outline: none;
	display: inline-block;
	width: 24px;
	height: 24px;
}

#control_panel a img {
	border: 0;
}

#save_button {
	position: absolute;
	padding: 0;
	margin: 0;
}

#play_button {
	display: inline-block;
}
</style>

<script>
	function gup(paramname) {
		var regexS = "[\\?&]" + paramname + "=([^&#]*)";
		var regex = new RegExp(regexS);
		var tmpURL = decodeURI(window.location.href); // decodeURI to preserve UTF                                                                                                                           

		var results = regex.exec(tmpURL);
		if (results == null)
			return "";
		else
			return results[1];
	}

	function addWorkerInfo(form_name) {
		$('#' + form_name).append(
				'<input type="hidden" name="assignmentId" id="assignmentId"/>');
		$('#' + form_name)
				.append(
						'<input type="hidden" name="data_saved" id="data_saved" class="required"/>');
		$('#' + form_name).append(
				'<input type="hidden" name="HIT_info" id="HIT_info" />');
		$('#' + form_name).append(
				'<input type="hidden" name="workerId" id="workerId" />');
		$('#' + form_name).append(
				'<input type="hidden" name="WorkerCity" id="WorkerCity" />');
		$('#' + form_name)
				.append(
						'<input type="hidden" name="WorkerCountry" id="WorkerCountry"/>');

		$('#data_saved').val("false");
		$('#assignmentId').val(gup('assignmentId'));

		$('#HIT_info').val(gup('HIT_info'));
		$('#AID').val(gup('workerId'));
		$('#WorkerCity').val(geoplugin_city());
		$('#WorkerCountry').val(geoplugin_countryName());
	}

	$(document)
			.ready(
					function() {
						$("#mturk_form").validate();
						//to hide the survey
						if ($.cookie("ccb-hindi-speech") != null) {
							$("#survey").hide();
							$('input[name|="is_native_hindi_speaker"]')
									.removeClass("required");
							$('input[name|="years_speaking_hindi"]')
									.removeClass("required");
							$('input[name|="is_native_english_speaker"]')
									.removeClass("required");
							$('input[name|="years_speaking_english"]')
									.removeClass("required");
							$('input[name|="what_country"]').removeClass(
									"required");
						}

						$('#audioId1').val(unescape(gup("audioid1")));
						$('#audioId2').val(unescape(gup("audioid2")));
						$('#audioId3').val(unescape(gup("audioid3")));
						$('#audioId4').val(unescape(gup("audioid4")));
						$('#audioId5').val(unescape(gup("audioid5")));

						addWorkerInfo('mturk_form');
						$('#mturk_form')
								.submit(
										function(e) {
											if ($('#data_saved').val() != "true") {
												e.preventDefault();
												alert("Please upload your recording before submitting this form");
											}
										});
					});

	$("#mturk_form").submit(function() {
		alert("1");
		alert($('#data_saved').val());

	});

	function encodeAndValidate() {

		$.cookie("ccb-hindi-speech", "true");

		$("textarea").each(function(index) {
			$(this).val(encodeURIComponent($.trim($(this).val())));
		});

		return true;
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#jquery_jplayer_1").jPlayer({
			ready : function() {
				$(this).jPlayer("setMedia", {
					wav : unescape(gup("audioid1"))
				});
			},
			play : function() { // To avoid both jPlayers playing together.
				$(this).jPlayer("pauseOthers");
			},
			swfPath : "/js",
			supplied : "wav",
			cssSelectorAncestor : "#jp_container_1",
			wmode : "window"
		});
	});
	$(document).ready(function() {
		$("#jquery_jplayer_2").jPlayer({
			ready : function() {
				$(this).jPlayer("setMedia", {
					wav : unescape(gup("audioid2"))
				});
			},
			play : function() { // To avoid both jPlayers playing together.
				$(this).jPlayer("pauseOthers");
			},
			swfPath : "/js",
			supplied : "wav",
			cssSelectorAncestor : "#jp_container_2",
			wmode : "window"
		});
	});
	$(document).ready(function() {
		$("#jquery_jplayer_3").jPlayer({
			ready : function() {
				$(this).jPlayer("setMedia", {
					wav : unescape(gup("audioid3"))
				});
			},
			play : function() { // To avoid both jPlayers playing together.
				$(this).jPlayer("pauseOthers");
			},
			swfPath : "/js",
			supplied : "wav",
			cssSelectorAncestor : "#jp_container_3",
			wmode : "window"
		});
	});
	$(document).ready(function() {
		$("#jquery_jplayer_4").jPlayer({
			ready : function() {
				$(this).jPlayer("setMedia", {
					wav : unescape(gup("audioid4"))
				});
			},
			play : function() { // To avoid both jPlayers playing together.
				$(this).jPlayer("pauseOthers");
			},
			swfPath : "/js",
			supplied : "wav",
			cssSelectorAncestor : "#jp_container_4",
			wmode : "window"
		});
	});
	$(document).ready(function() {
		$("#jquery_jplayer_5").jPlayer({
			ready : function() {
				$(this).jPlayer("setMedia", {
					wav : unescape(gup("audioid5"))
				});
			},
			play : function() { // To avoid both jPlayers playing together.
				$(this).jPlayer("pauseOthers");
			},
			swfPath : "/js",
			supplied : "wav",
			cssSelectorAncestor : "#jp_container_5",
			wmode : "window"
		});
	});
	//alert(unescape(gup("audioid")));
</script>

</head>

<body>
	<div id="mturk-main"
		style="float: left; width: 60%; padding-right: 10px">
		<div id="intro">
			<h2>Judge Hindi Audio Recording</h2>
			<p>Do you know Hindi? Please help us by judging the quality and
				hte accuracy of the following recordings.</p>

		</div>

		<div>

			<form id="mturk_form" method="POST"
				action="http://www.mturk.com/mturk/externalSubmit" charset="UTF-8">

				<input type="hidden" id="assignmentId" name="assignmentId" value="">

				<input type="hidden" id="textId" name="textId" value="">

				<div id="survey">
					<p>
						<b>Before you begin, please answer these questions about your
							language abilities (you only need to answer these once):</b>
					</p>
					<table border="0" cellspacing="4" cellpadding="0">
						<tbody>
							<tr>
								<td>Is Hindi your native language?</td>
								<td><input type="radio" name="is_native_hindi_speaker"
									value="yes" class="required" /><span class="answertext">Yes</span>
									<input type="radio" name="is_native_hindi_speaker" value="no" /><span
									class="answertext">No</span></td>
							</tr>
							<tr>
								<td>How many years have you spoken Hindi?</td>
								<td><input size="4" name="years_speaking_hindi" type="text"
									class="required" /></td>
							</tr>
							<tr>
								<td>Is English your native language?</td>
								<td><input type="radio" name="is_native_english_speaker"
									value="yes" class="required" /><span class="answertext">Yes</span>
									<input type="radio" name="is_native_english_speaker" value="no" /><span
									class="answertext">No</span></td>
							</tr>
							<tr>
								<td>How many years have you spoken English?</td>
								<td><input size="4" name="years_speaking_english"
									type="text" class="required" /></td>
							</tr>
							<tr>
								<td>What country do you live in?</td>
								<td><input size="15" name="what_country" type="text"
									class="required" /></td>
							</tr>
						</tbody>
					</table>
				</div>

				<br />

				<div style="border: 1px solid #000; padding-left: 5px;">
					<div id="recorder">
						<h3>Item 1</h3>
						<b>(Required) Judge the quality of the audio recording of the
							text below.</b>
						<p>
							<b>Instructions</b><br />
						<ul>
							<li>Read the text below</li>
							<li>Listen to the recording</li>
							<li>Judge the <b><u>quality</u></b> of the recording. Is it
								easy to understand? Is there a lot of background noise?
							</li>
							<li>Judge the <b><u>accuracy</u></b> of the recording. Does
								the audio reflect the text that is written? Did the speaker
								record the <b>whole</b> passage?
							</li>
						</ul>
						</p>

						<p>
							<textarea readonly rows="8" cols="70" name="hindi-text1"
								id="hindi-text1" style="font-size: 16px"></textarea>
						</p>


					</div>
					<div id="jquery_jplayer_1" class="jp-jplayer"></div>
					<div id="jp_container_1" class="jp-audio">
						<div class="jp-type-single">
							<div class="jp-gui jp-interface">
								<ul class="jp-controls">
									<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
									<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
									<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
									<li><a href="javascript:;" class="jp-mute" tabindex="1"
										title="mute">mute</a></li>
									<li><a href="javascript:;" class="jp-unmute" tabindex="1"
										title="unmute">unmute</a></li>
									<li><a href="javascript:;" class="jp-volume-max"
										tabindex="1" title="max volume">max volume</a></li>
								</ul>
								<div class="jp-progress">
									<div class="jp-seek-bar">
										<div class="jp-play-bar"></div>
									</div>
								</div>
								<div class="jp-volume-bar">
									<div class="jp-volume-bar-value"></div>
								</div>
								<div class="jp-time-holder">
									<div class="jp-current-time"></div>
									<div class="jp-duration"></div>
									<ul class="jp-toggles">
										<li><a href="javascript:;" class="jp-repeat" tabindex="1"
											title="repeat">repeat</a></li>
										<li><a href="javascript:;" class="jp-repeat-off"
											tabindex="1" title="repeat off">repeat off</a></li>
									</ul>
								</div>
							</div>
							<div class="jp-no-solution">
								<span>Update Required</span> To play the media you will need to
								either update your browser to a recent version or update your <a
									href="http://get.adobe.com/flashplayer/" target="_blank">Flash
									plugin</a>.
							</div>
						</div>
					</div>

					<p>
						Please rate the <b><u>quality</u></b> of the recording on a scale
						from 1 to 5
					</p>
					<p>
						<input type="radio" name="is_clear1" value="qual5" /> 5 <input
							type="radio" name="is_clear1" value="qual4" /> 4 <input
							type="radio" name="is_clear1" value="qual3" /> 3 <input
							type="radio" name="is_clear1" value="qual2" /> 2 <input
							type="radio" name="is_clear1" value="qual1" /> 1

					</p>

					<p>
						Please rate the <b><u>accuracy</u></b> of the recording on a scale
						from 1 to 5
					</p>
					<p>
						<input type="radio" name="is_accurate1" value="acc5" /> 5 <input
							type="radio" name="is_accurate1" value="acc4" /> 4 <input
							type="radio" name="is_accurate1" value="acc3" /> 3 <input
							type="radio" name="is_accurate1" value="acc2" /> 2 <input
							type="radio" name="is_accurate1" value="acc1" /> 1

					</p>
				</div>

				<div style="border: 1px solid #000; padding-left: 5px;">
					<div id="recorder">
						<h3>Item 2</h3>
						<b>(Required) Judge the quality of the audio recording of the
							text below.</b>
						<p>
							<b>Instructions</b><br />
						<ul>
							<li>Read the text below</li>
							<li>Listen to the recording</li>
							<li>Judge the <b><u>quality</u></b> of the recording. Is it
								easy to understand? Is there a lot of background noise?
							</li>
							<li>Judge the <b><u>accuracy</u></b> of the recording. Does
								the audio reflect the text that is written? Did the speaker
								record the <b>whole</b> passage?
							</li>
						</ul>
						</p>

						<p>
							<textarea readonly rows="8" cols="70" name="hindi-text2"
								id="hindi-text2" style="font-size: 16px"></textarea>
						</p>


					</div>
					<div id="jquery_jplayer_2" class="jp-jplayer"></div>
					<div id="jp_container_2" class="jp-audio">
						<div class="jp-type-single">
							<div class="jp-gui jp-interface">
								<ul class="jp-controls">
									<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
									<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
									<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
									<li><a href="javascript:;" class="jp-mute" tabindex="1"
										title="mute">mute</a></li>
									<li><a href="javascript:;" class="jp-unmute" tabindex="1"
										title="unmute">unmute</a></li>
									<li><a href="javascript:;" class="jp-volume-max"
										tabindex="1" title="max volume">max volume</a></li>
								</ul>
								<div class="jp-progress">
									<div class="jp-seek-bar">
										<div class="jp-play-bar"></div>
									</div>
								</div>
								<div class="jp-volume-bar">
									<div class="jp-volume-bar-value"></div>
								</div>
								<div class="jp-time-holder">
									<div class="jp-current-time"></div>
									<div class="jp-duration"></div>
									<ul class="jp-toggles">
										<li><a href="javascript:;" class="jp-repeat" tabindex="1"
											title="repeat">repeat</a></li>
										<li><a href="javascript:;" class="jp-repeat-off"
											tabindex="1" title="repeat off">repeat off</a></li>
									</ul>
								</div>
							</div>
							<div class="jp-no-solution">
								<span>Update Required</span> To play the media you will need to
								either update your browser to a recent version or update your <a
									href="http://get.adobe.com/flashplayer/" target="_blank">Flash
									plugin</a>.
							</div>
						</div>
					</div>

					<p>
						Please rate the <b><u>quality</u></b> of the recording on a scale
						from 1 to 5
					</p>
					<p>
						<input type="radio" name="is_clear2" value="qual5" /> 5 <input
							type="radio" name="is_clear2" value="qual4" /> 4 <input
							type="radio" name="is_clear2" value="qual3" /> 3 <input
							type="radio" name="is_clear2" value="qual2" /> 2 <input
							type="radio" name="is_clear2" value="qual1" /> 1

					</p>

					<p>
						Please rate the <b><u>accuracy</u></b> of the recording on a scale
						from 1 to 5
					</p>
					<p>
						<input type="radio" name="is_accurate2" value="acc5" /> 5 <input
							type="radio" name="is_accurate2" value="acc4" /> 4 <input
							type="radio" name="is_accurate2" value="acc3" /> 3 <input
							type="radio" name="is_accurate2" value="acc2" /> 2 <input
							type="radio" name="is_accurate2" value="acc1" /> 1

					</p>
				</div>

				<div style="border: 1px solid #000; padding-left: 5px;">
					<div id="recorder">
						<h3>Item 3</h3>
						<b>(Required) Judge the quality of the audio recording of the
							text below.</b>
						<p>
							<b>Instructions</b><br />
						<ul>
							<li>Read the text below</li>
							<li>Listen to the recording</li>
							<li>Judge the <b><u>quality</u></b> of the recording. Is it
								easy to understand? Is there a lot of background noise?
							</li>
							<li>Judge the <b><u>accuracy</u></b> of the recording. Does
								the audio reflect the text that is written? Did the speaker
								record the <b>whole</b> passage?
							</li>
						</ul>
						</p>

						<p>
							<textarea readonly rows="8" cols="70" name="hindi-text3"
								id="hindi-text3" style="font-size: 16px"></textarea>
						</p>


					</div>
					<div id="jquery_jplayer_3" class="jp-jplayer"></div>
					<div id="jp_container_3" class="jp-audio">
						<div class="jp-type-single">
							<div class="jp-gui jp-interface">
								<ul class="jp-controls">
									<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
									<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
									<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
									<li><a href="javascript:;" class="jp-mute" tabindex="1"
										title="mute">mute</a></li>
									<li><a href="javascript:;" class="jp-unmute" tabindex="1"
										title="unmute">unmute</a></li>
									<li><a href="javascript:;" class="jp-volume-max"
										tabindex="1" title="max volume">max volume</a></li>
								</ul>
								<div class="jp-progress">
									<div class="jp-seek-bar">
										<div class="jp-play-bar"></div>
									</div>
								</div>
								<div class="jp-volume-bar">
									<div class="jp-volume-bar-value"></div>
								</div>
								<div class="jp-time-holder">
									<div class="jp-current-time"></div>
									<div class="jp-duration"></div>
									<ul class="jp-toggles">
										<li><a href="javascript:;" class="jp-repeat" tabindex="1"
											title="repeat">repeat</a></li>
										<li><a href="javascript:;" class="jp-repeat-off"
											tabindex="1" title="repeat off">repeat off</a></li>
									</ul>
								</div>
							</div>
							<div class="jp-no-solution">
								<span>Update Required</span> To play the media you will need to
								either update your browser to a recent version or update your <a
									href="http://get.adobe.com/flashplayer/" target="_blank">Flash
									plugin</a>.
							</div>
						</div>
					</div>

					<p>
						Please rate the <b><u>quality</u></b> of the recording on a scale
						from 1 to 5
					</p>
					<p>
						<input type="radio" name="is_clear3" value="qual5" /> 5 <input
							type="radio" name="is_clear3" value="qual4" /> 4 <input
							type="radio" name="is_clear3" value="qual3" /> 3 <input
							type="radio" name="is_clear3" value="qual2" /> 2 <input
							type="radio" name="is_clear3" value="qual1" /> 1

					</p>

					<p>
						Please rate the <b><u>accuracy</u></b> of the recording on a scale
						from 1 to 5
					</p>
					<p>
						<input type="radio" name="is_accurate3" value="acc5" /> 5 <input
							type="radio" name="is_accurate3" value="acc4" /> 4 <input
							type="radio" name="is_accurate3" value="acc3" /> 3 <input
							type="radio" name="is_accurate3" value="acc2" /> 2 <input
							type="radio" name="is_accurate3" value="acc1" /> 1

					</p>
				</div>

				<div style="border: 1px solid #000; padding-left: 5px;">
					<div id="recorder">
						<h3>Item 4</h3>
						<b>(Required) Judge the quality of the audio recording of the
							text below.</b>
						<p>
							<b>Instructions</b><br />
						<ul>
							<li>Read the text below</li>
							<li>Listen to the recording</li>
							<li>Judge the <b><u>quality</u></b> of the recording. Is it
								easy to understand? Is there a lot of background noise?
							</li>
							<li>Judge the <b><u>accuracy</u></b> of the recording. Does
								the audio reflect the text that is written? Did the speaker
								record the <b>whole</b> passage?
							</li>
						</ul>
						</p>

						<p>
							<textarea readonly rows="8" cols="70" name="hindi-text4"
								id="hindi-text4" style="font-size: 16px"></textarea>
						</p>


					</div>
					<div id="jquery_jplayer_4" class="jp-jplayer"></div>
					<div id="jp_container_4" class="jp-audio">
						<div class="jp-type-single">
							<div class="jp-gui jp-interface">
								<ul class="jp-controls">
									<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
									<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
									<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
									<li><a href="javascript:;" class="jp-mute" tabindex="1"
										title="mute">mute</a></li>
									<li><a href="javascript:;" class="jp-unmute" tabindex="1"
										title="unmute">unmute</a></li>
									<li><a href="javascript:;" class="jp-volume-max"
										tabindex="1" title="max volume">max volume</a></li>
								</ul>
								<div class="jp-progress">
									<div class="jp-seek-bar">
										<div class="jp-play-bar"></div>
									</div>
								</div>
								<div class="jp-volume-bar">
									<div class="jp-volume-bar-value"></div>
								</div>
								<div class="jp-time-holder">
									<div class="jp-current-time"></div>
									<div class="jp-duration"></div>
									<ul class="jp-toggles">
										<li><a href="javascript:;" class="jp-repeat" tabindex="1"
											title="repeat">repeat</a></li>
										<li><a href="javascript:;" class="jp-repeat-off"
											tabindex="1" title="repeat off">repeat off</a></li>
									</ul>
								</div>
							</div>
							<div class="jp-no-solution">
								<span>Update Required</span> To play the media you will need to
								either update your browser to a recent version or update your <a
									href="http://get.adobe.com/flashplayer/" target="_blank">Flash
									plugin</a>.
							</div>
						</div>
					</div>

					<p>
						Please rate the <b><u>quality</u></b> of the recording on a scale
						from 1 to 5
					</p>
					<p>
						<input type="radio" name="is_clear4" value="qual5" /> 5 <input
							type="radio" name="is_clear4" value="qual4" /> 4 <input
							type="radio" name="is_clear4" value="qual3" /> 3 <input
							type="radio" name="is_clear4" value="qual2" /> 2 <input
							type="radio" name="is_clear4" value="qual1" /> 1

					</p>

					<p>
						Please rate the <b><u>accuracy</u></b> of the recording on a scale
						from 1 to 5
					</p>
					<p>
						<input type="radio" name="is_accurate4" value="acc5" /> 5 <input
							type="radio" name="is_accurate4" value="acc4" /> 4 <input
							type="radio" name="is_accurate4" value="acc3" /> 3 <input
							type="radio" name="is_accurate4" value="acc2" /> 2 <input
							type="radio" name="is_accurate4" value="acc1" /> 1

					</p>
				</div>


				<div style="border: 1px solid #000; padding-left: 5px;">
					<div id="recorder">
						<h3>Item 5</h3>
						<b>(Required) Judge the quality of the audio recording of the
							text below.</b>
						<p>
							<b>Instructions</b><br />
						<ul>
							<li>Read the text below</li>
							<li>Listen to the recording</li>
							<li>Judge the <b><u>quality</u></b> of the recording. Is it
								easy to understand? Is there a lot of background noise?
							</li>
							<li>Judge the <b><u>accuracy</u></b> of the recording. Does
								the audio reflect the text that is written? Did the speaker
								record the <b>whole</b> passage?
							</li>
						</ul>
						</p>

						<p>
							<textarea readonly rows="8" cols="70" name="hindi-text5"
								id="hindi-text5" style="font-size: 16px"></textarea>
						</p>


					</div>
					<div id="jquery_jplayer_5" class="jp-jplayer"></div>
					<div id="jp_container_5" class="jp-audio">
						<div class="jp-type-single">
							<div class="jp-gui jp-interface">
								<ul class="jp-controls">
									<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
									<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
									<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
									<li><a href="javascript:;" class="jp-mute" tabindex="1"
										title="mute">mute</a></li>
									<li><a href="javascript:;" class="jp-unmute" tabindex="1"
										title="unmute">unmute</a></li>
									<li><a href="javascript:;" class="jp-volume-max"
										tabindex="1" title="max volume">max volume</a></li>
								</ul>
								<div class="jp-progress">
									<div class="jp-seek-bar">
										<div class="jp-play-bar"></div>
									</div>
								</div>
								<div class="jp-volume-bar">
									<div class="jp-volume-bar-value"></div>
								</div>
								<div class="jp-time-holder">
									<div class="jp-current-time"></div>
									<div class="jp-duration"></div>
									<ul class="jp-toggles">
										<li><a href="javascript:;" class="jp-repeat" tabindex="1"
											title="repeat">repeat</a></li>
										<li><a href="javascript:;" class="jp-repeat-off"
											tabindex="1" title="repeat off">repeat off</a></li>
									</ul>
								</div>
							</div>
							<div class="jp-no-solution">
								<span>Update Required</span> To play the media you will need to
								either update your browser to a recent version or update your <a
									href="http://get.adobe.com/flashplayer/" target="_blank">Flash
									plugin</a>.
							</div>
						</div>
					</div>

					<p>
						Please rate the <b><u>quality</u></b> of the recording on a scale
						from 1 to 5
					</p>
					<p>
						<input type="radio" name="is_clear5" value="qual5" /> 5 <input
							type="radio" name="is_clear5" value="qual4" /> 4 <input
							type="radio" name="is_clear5" value="qual3" /> 3 <input
							type="radio" name="is_clear5" value="qual2" /> 2 <input
							type="radio" name="is_clear5" value="qual1" /> 1

					</p>

					<p>
						Please rate the <b><u>accuracy</u></b> of the recording on a scale
						from 1 to 5
					</p>
					<p>
						<input type="radio" name="is_accurate5" value="acc5" /> 5 <input
							type="radio" name="is_accurate5" value="acc4" /> 4 <input
							type="radio" name="is_accurate5" value="acc3" /> 3 <input
							type="radio" name="is_accurate5" value="acc2" /> 2 <input
							type="radio" name="is_accurate5" value="acc1" /> 1

					</p>
				</div>

				<p>Please provide any comments that you have about this HIT. We
					appreciate your input!</p>
				<p>
					<textarea name="comment" cols="80" rows="4"> </textarea>
				</p>
				<p>
					<input type="hidden" name="userDisplayLanguage" /> <input
						type="hidden" name="browserInfo" /> <input type="hidden"
						name="ipAddress" /> <input type="hidden" name="country" /> <input
						type="hidden" name="city" /> <input type="hidden" name="region" />
				</p>
				<input type="submit" onClick="encodeAndValidate();" />

			</form>
		</div>
	</div>

	<div id="consent-text"
		style="margin-left: 3px; overflow: hidden; border: 1px solid #000; padding-left: 20px; padding-right: 20px">
		<span style="text-align: center;"><h3>Informed Consent
				Form</h3></span>
		<p>
			<b>Purpose of research study:</b> We are collecting elicitations of
			text for our research into human language technologies.
		</p>
		<p>
			<b>Benefits:</b> Although it will not directly benefit you, this
			study may benefit society by improving how computers process human
			languages. This could lead to better translation software, improved
			web searching, or new user interfaces for computers and mobile
			devices.
		</p>
		<p>
			<b>Risks:</b>There are no risks for participating in this study.
		</p>
		<p>
			<b>Voluntary participation:</b>You may stop participating at any time
			without penalty by clicking on the &ldquo;Return HIT&rdquo; button,
			or closing your browser window.
		</p>
		<p>
			<b>We may end your participation if</b> you do not have adequate
			knowledge of the language, or you are not following the instructions,
			or your answers significantly deviate from known translations.
		</p>
		<p>
			<b>Confidentiality: </b>The only identifying information kept about
			you will be a WorkerID serial number and your IP address. This
			information may be disclosed to other researchers.
		</p>
		<p>
			<b>Questions/concerns: </b>You may e-mail questions to the principle
			investigator, <a target="_blank" href="http://cs.jhu.edu/~ccb/">Chris
				Callison-Burch</a>. If you feel you have been treated unfairly you may
			contact the Johns Hopkins University <a target="_blank"
				href="http://web.jhu.edu/Homewood-IRB/contact.html">Institutional
				Review Board</a>.
		</p>
		<p>
			<b>Clicking on the &ldquo;Accept HIT&rdquo; button</b> indicates that
			you understand the information in this consent form. You have not
			waived any legal rights you otherwise would have as a participant in
			a research study.
		</p>
	</div>

	<script>
		addWorkerInfo('mturk_form');
		document.getElementById('assignmentId').value = gup('assignmentId');
                for (var i = 1; i <= 5; i++) {
		  $('#hindi-text' + i).val(unescape(decodeURI(gup('hindi-text' + i))));
		}
	</script>


</body>
</html>


