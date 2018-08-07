<?php include(APPPATH . 'views/common/head.php'); ?>
<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
        <script src="<?php echo base_url(); ?>js/jquery.easyui.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.edatagrid.js"></script>
	<script type="text/javascript">
		$(function(){
			
			$('#dg').edatagrid({
				method : 'post',
				url: '<?php echo base_url(); ?>index.php/cashforwork/get_beneficiaries/<?php echo $project_id;?>/<?php echo $projectaactivity_id;?>',
				saveUrl: '<?php echo base_url(); ?>index.php/cashforwork/save_beneficiary',
				updateUrl: '<?php echo base_url(); ?>index.php/cashforwork/edit_beneficiary',
				destroyUrl: '<?php echo base_url(); ?>index.php/cashforwork/destroy_beneficiary'
			});
		});
		
		
		
	</script>
    
    <style>
	.demo-info{
	padding:0 0 12px 0;
}
.demo-tip{
	display:none;
}
.label-top{
    display: block;
    height: 22px;
    line-height: 22px;
    vertical-align: middle;
}

.panel {
  overflow: hidden;
  text-align: left;
  margin: 0;
  border: 0;
  -moz-border-radius: 0 0 0 0;
  -webkit-border-radius: 0 0 0 0;
  border-radius: 0 0 0 0;
}
.panel-header,
.panel-body {
  border-width: 1px;
  border-style: solid;
}
.panel-header {
  padding: 5px;
  position: relative;
}
.panel-title {
  background: url('images/blank.gif') no-repeat;
}
.panel-header-noborder {
  border-width: 0 0 1px 0;
}
.panel-body {
  overflow: auto;
  border-top-width: 0;
  padding: 0;
}
.panel-body-noheader {
  border-top-width: 1px;
}
.panel-body-noborder {
  border-width: 0px;
}
.panel-body-nobottom {
  border-bottom-width: 0;
}
.panel-with-icon {
  padding-left: 18px;
}
.panel-icon,
.panel-tool {
  position: absolute;
  top: 50%;
  margin-top: -8px;
  height: 16px;
  overflow: hidden;
}
.panel-icon {
  left: 5px;
  width: 16px;
}
.panel-tool {
  right: 5px;
  width: auto;
}
.panel-tool a {
  display: inline-block;
  width: 16px;
  height: 16px;
  opacity: 0.6;
  filter: alpha(opacity=60);
  margin: 0 0 0 2px;
  vertical-align: top;
}
.panel-tool a:hover {
  opacity: 1;
  filter: alpha(opacity=100);
  background-color: #eaf2ff;
  -moz-border-radius: 3px 3px 3px 3px;
  -webkit-border-radius: 3px 3px 3px 3px;
  border-radius: 3px 3px 3px 3px;
}
.panel-loading {
  padding: 11px 0px 10px 30px;
}
.panel-noscroll {
  overflow: hidden;
}
.panel-fit,
.panel-fit body {
  height: 100%;
  margin: 0;
  padding: 0;
  border: 0;
  overflow: hidden;
}
.panel-loading {
  background: url('images/loading.gif') no-repeat 10px 10px;
}
.panel-tool-close {
  background: url('images/panel_tools.png') no-repeat -16px 0px;
}
.panel-tool-min {
  background: url('images/panel_tools.png') no-repeat 0px 0px;
}
.panel-tool-max {
  background: url('images/panel_tools.png') no-repeat 0px -16px;
}
.panel-tool-restore {
  background: url('images/panel_tools.png') no-repeat -16px -16px;
}
.panel-tool-collapse {
  background: url('images/panel_tools.png') no-repeat -32px 0;
}
.panel-tool-expand {
  background: url('images/panel_tools.png') no-repeat -32px -16px;
}
.panel-header,
.panel-body {
  border-color: #95B8E7;
}
.panel-header {
  background-color: #E0ECFF;
  background: -webkit-linear-gradient(top,#EFF5FF 0,#E0ECFF 100%);
  background: -moz-linear-gradient(top,#EFF5FF 0,#E0ECFF 100%);
  background: -o-linear-gradient(top,#EFF5FF 0,#E0ECFF 100%);
  background: linear-gradient(to bottom,#EFF5FF 0,#E0ECFF 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#EFF5FF,endColorstr=#E0ECFF,GradientType=0);
}
.panel-body {
  background-color: #ffffff;
  color: #000000;
  font-size: 12px;
}
.panel-title {
  font-size: 12px;
  font-weight: bold;
  color: #0E2D5F;
  height: 16px;
  line-height: 16px;
}
.panel-footer {
  border: 1px solid #95B8E7;
  overflow: hidden;
  background: #F4F4F4;
}
.panel-footer-noborder {
  border-width: 1px 0 0 0;
}
.accordion {
  overflow: hidden;
  border-width: 1px;
  border-style: solid;
}
.accordion .accordion-header {
  border-width: 0 0 1px;
  cursor: pointer;
}
.accordion .accordion-body {
  border-width: 0 0 1px;
}
.accordion-noborder {
  border-width: 0;
}
.accordion-noborder .accordion-header {
  border-width: 0 0 1px;
}
.accordion-noborder .accordion-body {
  border-width: 0 0 1px;
}
.accordion-collapse {
  background: url('images/accordion_arrows.png') no-repeat 0 0;
}
.accordion-expand {
  background: url('images/accordion_arrows.png') no-repeat -16px 0;
}
.accordion {
  background: #ffffff;
  border-color: #95B8E7;
}
.accordion .accordion-header {
  background: #E0ECFF;
  filter: none;
}
.accordion .accordion-header-selected {
  background: #ffe48d;
}
.accordion .accordion-header-selected .panel-title {
  color: #000000;
}
.window {
  overflow: hidden;
  padding: 5px;
  border-width: 1px;
  border-style: solid;
}
.window .window-header {
  background: transparent;
  padding: 0px 0px 6px 0px;
}
.window .window-body {
  border-width: 1px;
  border-style: solid;
  border-top-width: 0px;
}
.window .window-body-noheader {
  border-top-width: 1px;
}
.window .panel-body-nobottom {
  border-bottom-width: 0;
}
.window .window-header .panel-icon,
.window .window-header .panel-tool {
  top: 50%;
  margin-top: -11px;
}
.window .window-header .panel-icon {
  left: 1px;
}
.window .window-header .panel-tool {
  right: 1px;
}
.window .window-header .panel-with-icon {
  padding-left: 18px;
}
.window-proxy {
  position: absolute;
  overflow: hidden;
}
.window-proxy-mask {
  position: absolute;
  filter: alpha(opacity=5);
  opacity: 0.05;
}
.window-mask {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  filter: alpha(opacity=40);
  opacity: 0.40;
  font-size: 1px;
  overflow: hidden;
}
.window,
.window-shadow {
  position: absolute;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.window-shadow {
  background: #ccc;
  -moz-box-shadow: 2px 2px 3px #cccccc;
  -webkit-box-shadow: 2px 2px 3px #cccccc;
  box-shadow: 2px 2px 3px #cccccc;
  filter: progid:DXImageTransform.Microsoft.Blur(pixelRadius=2,MakeShadow=false,ShadowOpacity=0.2);
}
.window,
.window .window-body {
  border-color: #95B8E7;
}
.window {
  background-color: #E0ECFF;
  background: -webkit-linear-gradient(top,#EFF5FF 0,#E0ECFF 20%);
  background: -moz-linear-gradient(top,#EFF5FF 0,#E0ECFF 20%);
  background: -o-linear-gradient(top,#EFF5FF 0,#E0ECFF 20%);
  background: linear-gradient(to bottom,#EFF5FF 0,#E0ECFF 20%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#EFF5FF,endColorstr=#E0ECFF,GradientType=0);
}
.window-proxy {
  border: 1px dashed #95B8E7;
}
.window-proxy-mask,
.window-mask {
  background: #ccc;
}
.window .panel-footer {
  border: 1px solid #95B8E7;
  position: relative;
  top: -1px;
}
.window-thinborder {
  padding: 0;
}
.window-thinborder .window-header {
  padding: 5px 5px 6px 5px;
}
.window-thinborder .window-body {
  border-width: 0px;
}
.window-thinborder .window-header .panel-icon,
.window-thinborder .window-header .panel-tool {
  margin-top: -9px;
  margin-left: 5px;
  margin-right: 5px;
}
.window-noborder {
  border: 0;
}
.dialog-content {
  overflow: auto;
}
.dialog-toolbar {
  position: relative;
  padding: 2px 5px;
}
.dialog-tool-separator {
  float: left;
  height: 24px;
  border-left: 1px solid #ccc;
  border-right: 1px solid #fff;
  margin: 2px 1px;
}
.dialog-button {
  position: relative;
  top: -1px;
  padding: 5px;
  text-align: right;
}
.dialog-button .l-btn {
  margin-left: 5px;
}
.dialog-toolbar,
.dialog-button {
  background: #F4F4F4;
  border-width: 1px;
  border-style: solid;
}
.dialog-toolbar {
  border-color: #95B8E7 #95B8E7 #dddddd #95B8E7;
}
.dialog-button {
  border-color: #dddddd #95B8E7 #95B8E7 #95B8E7;
}
.window-thinborder .dialog-toolbar {
  border-left: transparent;
  border-right: transparent;
  border-top-color: #F4F4F4;
}
.window-thinborder .dialog-button {
  top: 0px;
  padding: 5px 8px 8px 8px;
  border-left: transparent;
  border-right: transparent;
  border-bottom: transparent;
}
.l-btn {
  text-decoration: none;
  display: inline-block;
  overflow: hidden;
  margin: 0;
  padding: 0;
  cursor: pointer;
  outline: none;
  text-align: center;
  vertical-align: middle;
  line-height: normal;
}
.l-btn-plain {
  border-width: 0;
  padding: 1px;
}
.l-btn-left {
  display: inline-block;
  position: relative;
  overflow: hidden;
  margin: 0;
  padding: 0;
  vertical-align: top;
}
.l-btn-text {
  display: inline-block;
  vertical-align: top;
  width: auto;
  line-height: 24px;
  font-size: 12px;
  padding: 0;
  margin: 0 4px;
}
.l-btn-icon {
  display: inline-block;
  width: 16px;
  height: 16px;
  line-height: 16px;
  position: absolute;
  top: 50%;
  margin-top: -8px;
  font-size: 1px;
}
.l-btn span span .l-btn-empty {
  display: inline-block;
  margin: 0;
  width: 16px;
  height: 24px;
  font-size: 1px;
  vertical-align: top;
}
.l-btn span .l-btn-icon-left {
  padding: 0 0 0 20px;
  background-position: left center;
}
.l-btn span .l-btn-icon-right {
  padding: 0 20px 0 0;
  background-position: right center;
}
.l-btn-icon-left .l-btn-text {
  margin: 0 4px 0 24px;
}
.l-btn-icon-left .l-btn-icon {
  left: 4px;
}
.l-btn-icon-right .l-btn-text {
  margin: 0 24px 0 4px;
}
.l-btn-icon-right .l-btn-icon {
  right: 4px;
}
.l-btn-icon-top .l-btn-text {
  margin: 20px 4px 0 4px;
}
.l-btn-icon-top .l-btn-icon {
  top: 4px;
  left: 50%;
  margin: 0 0 0 -8px;
}
.l-btn-icon-bottom .l-btn-text {
  margin: 0 4px 20px 4px;
}
.l-btn-icon-bottom .l-btn-icon {
  top: auto;
  bottom: 4px;
  left: 50%;
  margin: 0 0 0 -8px;
}
.l-btn-left .l-btn-empty {
  margin: 0 4px;
  width: 16px;
}
.l-btn-plain:hover {
  padding: 0;
}
.l-btn-focus {
  outline: #0000FF dotted thin;
}
.l-btn-large .l-btn-text {
  line-height: 40px;
}
.l-btn-large .l-btn-icon {
  width: 32px;
  height: 32px;
  line-height: 32px;
  margin-top: -16px;
}
.l-btn-large .l-btn-icon-left .l-btn-text {
  margin-left: 40px;
}
.l-btn-large .l-btn-icon-right .l-btn-text {
  margin-right: 40px;
}
.l-btn-large .l-btn-icon-top .l-btn-text {
  margin-top: 36px;
  line-height: 24px;
  min-width: 32px;
}
.l-btn-large .l-btn-icon-top .l-btn-icon {
  margin: 0 0 0 -16px;
}
.l-btn-large .l-btn-icon-bottom .l-btn-text {
  margin-bottom: 36px;
  line-height: 24px;
  min-width: 32px;
}
.l-btn-large .l-btn-icon-bottom .l-btn-icon {
  margin: 0 0 0 -16px;
}
.l-btn-large .l-btn-left .l-btn-empty {
  margin: 0 4px;
  width: 32px;
}
.l-btn {
  color: #444;
  background: #fafafa;
  background-repeat: repeat-x;
  border: 1px solid #bbb;
  background: -webkit-linear-gradient(top,#ffffff 0,#eeeeee 100%);
  background: -moz-linear-gradient(top,#ffffff 0,#eeeeee 100%);
  background: -o-linear-gradient(top,#ffffff 0,#eeeeee 100%);
  background: linear-gradient(to bottom,#ffffff 0,#eeeeee 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffffff,endColorstr=#eeeeee,GradientType=0);
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.l-btn:hover {
  background: #eaf2ff;
  color: #000000;
  border: 1px solid #b7d2ff;
  filter: none;
}
.l-btn-plain {
  background: transparent;
  border-width: 0;
  filter: none;
}
.l-btn-outline {
  border-width: 1px;
  border-color: #b7d2ff;
  padding: 0;
}
.l-btn-plain:hover {
  background: #eaf2ff;
  color: #000000;
  border: 1px solid #b7d2ff;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.l-btn-disabled,
.l-btn-disabled:hover {
  opacity: 0.5;
  cursor: default;
  background: #fafafa;
  color: #444;
  background: -webkit-linear-gradient(top,#ffffff 0,#eeeeee 100%);
  background: -moz-linear-gradient(top,#ffffff 0,#eeeeee 100%);
  background: -o-linear-gradient(top,#ffffff 0,#eeeeee 100%);
  background: linear-gradient(to bottom,#ffffff 0,#eeeeee 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffffff,endColorstr=#eeeeee,GradientType=0);
}
.l-btn-disabled .l-btn-text,
.l-btn-disabled .l-btn-icon {
  filter: alpha(opacity=50);
}
.l-btn-plain-disabled,
.l-btn-plain-disabled:hover {
  background: transparent;
  filter: alpha(opacity=50);
}
.l-btn-selected,
.l-btn-selected:hover {
  background: #ddd;
  filter: none;
}
.l-btn-plain-selected,
.l-btn-plain-selected:hover {
  background: #ddd;
}
.textbox {
  position: relative;
  border: 1px solid #95B8E7;
  background-color: #fff;
  vertical-align: middle;
  display: inline-block;
  overflow: hidden;
  white-space: nowrap;
  margin: 0;
  padding: 0;
  -moz-border-radius: 5px 5px 5px 5px;

  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.textbox .textbox-text {
  font-size: 12px;
  border: 0;
  margin: 0;
  padding: 4px;
  white-space: normal;
  vertical-align: top;
  outline-style: none;
  resize: none;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.textbox .textbox-text::-ms-clear,
.textbox .textbox-text::-ms-reveal {
  display: none;
}
.textbox textarea.textbox-text {
  white-space: pre-wrap;
}
.textbox .textbox-prompt {
  font-size: 12px;
  color: #aaa;
}
.textbox .textbox-bgicon {
  background-position: 3px center;
  padding-left: 21px;
}
.textbox .textbox-button,
.textbox .textbox-button:hover {
  position: absolute;
  top: 0;
  padding: 0;
  vertical-align: top;
  -moz-border-radius: 0 0 0 0;
  -webkit-border-radius: 0 0 0 0;
  border-radius: 0 0 0 0;
}
.textbox .textbox-button-right,
.textbox .textbox-button-right:hover {
  right: 0;
  border-width: 0 0 0 1px;
}
.textbox .textbox-button-left,
.textbox .textbox-button-left:hover {
  left: 0;
  border-width: 0 1px 0 0;
}
.textbox .textbox-button-top,
.textbox .textbox-button-top:hover {
  left: 0;
  border-width: 0 0 1px 0;
}
.textbox .textbox-button-bottom,
.textbox .textbox-button-bottom:hover {
  top: auto;
  bottom: 0;
  left: 0;
  border-width: 1px 0 0 0;
}
.textbox-addon {
  position: absolute;
  top: 0;
}
.textbox-label {
  display: inline-block;
  width: 80px;
  height: 22px;
  line-height: 22px;
  vertical-align: middle;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  margin: 0;
  padding-right: 5px;
}
.textbox-label-after {
  padding-left: 5px;
  padding-right: 0;
}
.textbox-label-top {
  display: block;
  width: auto;
  padding: 0;
}
.textbox-disabled,
.textbox-label-disabled {
  opacity: 0.6;
  filter: alpha(opacity=60);
}
.textbox-icon {
  display: inline-block;
  width: 18px;
  height: 20px;
  overflow: hidden;
  vertical-align: top;
  background-position: center center;
  cursor: pointer;
  opacity: 0.6;
  filter: alpha(opacity=60);
  text-decoration: none;
  outline-style: none;
}
.textbox-icon-disabled,
.textbox-icon-readonly {
  cursor: default;
}
.textbox-icon:hover {
  opacity: 1.0;
  filter: alpha(opacity=100);
}
.textbox-icon-disabled:hover {
  opacity: 0.6;
  filter: alpha(opacity=60);
}
.textbox-focused {
  border-color: #6b9cde;
  -moz-box-shadow: 0 0 3px 0 #95B8E7;
  -webkit-box-shadow: 0 0 3px 0 #95B8E7;
  box-shadow: 0 0 3px 0 #95B8E7;
}
.textbox-invalid {
  border-color: #ffa8a8;
  background-color: #fff3f3;
}
.passwordbox-open {
  background: url('images/passwordbox_open.png') no-repeat center center;
}
.passwordbox-close {
  background: url('images/passwordbox_close.png') no-repeat center center;
}
.filebox .textbox-value {
  vertical-align: top;
  position: absolute;
  top: 0;
  left: -5000px;
}
.filebox-label {
  display: inline-block;
  position: absolute;
  width: 100%;
  height: 100%;
  cursor: pointer;
  left: 0;
  top: 0;
  z-index: 10;
  background: url('images/blank.gif') no-repeat;
}
.l-btn-disabled .filebox-label {
  cursor: default;
}
.combo-arrow {
  width: 18px;
  height: 20px;
  overflow: hidden;
  display: inline-block;
  vertical-align: top;
  cursor: pointer;
  opacity: 0.6;
  filter: alpha(opacity=60);
}
.combo-arrow-hover {
  opacity: 1.0;
  filter: alpha(opacity=100);
}
.combo-panel {
  overflow: auto;
}
.combo-arrow {
  background: url('images/combo_arrow.png') no-repeat center center;
}
.combo-panel {
  background-color: #ffffff;
}
.combo-arrow {
  background-color: #E0ECFF;
}
.combo-arrow-hover {
  background-color: #eaf2ff;
}
.combo-arrow:hover {
  background-color: #eaf2ff;
}
.combo .textbox-icon-disabled:hover {
  cursor: default;
}
.combobox-item,
.combobox-group,
.combobox-stick {
  font-size: 12px;
  padding: 3px;
}
.combobox-item-disabled {
  opacity: 0.5;
  filter: alpha(opacity=50);
}
.combobox-gitem {
  padding-left: 10px;
}
.combobox-group,
.combobox-stick {
  font-weight: bold;
}
.combobox-stick {
  position: absolute;
  top: 1px;
  left: 1px;
  right: 1px;
  background: inherit;
}
.combobox-item-hover {
  background-color: #eaf2ff;
  color: #000000;
}
.combobox-item-selected {
  background-color: #ffe48d;
  color: #000000;
}
.combobox-icon {
  display: inline-block;
  width: 16px;
  height: 16px;
  vertical-align: middle;
  margin-right: 2px;
}
.layout {
  position: relative;
  overflow: hidden;
  margin: 0;
  padding: 0;
  z-index: 0;
}
.layout-panel {
  position: absolute;
  overflow: hidden;
}
.layout-body {
  min-width: 1px;
  min-height: 1px;
}
.layout-panel-east,
.layout-panel-west {
  z-index: 2;
}
.layout-panel-north,
.layout-panel-south {
  z-index: 3;
}
.layout-expand {
  position: absolute;
  padding: 0px;
  font-size: 1px;
  cursor: pointer;
  z-index: 1;
}
.layout-expand .panel-header,
.layout-expand .panel-body {
  background: transparent;
  filter: none;
  overflow: hidden;
}
.layout-expand .panel-header {
  border-bottom-width: 0px;
}
.layout-expand .panel-body {
  position: relative;
}
.layout-expand .panel-body .panel-icon {
  margin-top: 0;
  top: 0;
  left: 50%;
  margin-left: -8px;
}
.layout-expand-west .panel-header .panel-icon,
.layout-expand-east .panel-header .panel-icon {
  display: none;
}
.layout-expand-title {
  position: absolute;
  top: 0;
  left: 21px;
  white-space: nowrap;
  word-wrap: normal;
  -webkit-transform: rotate(90deg);
  -webkit-transform-origin: 0 0;
  -moz-transform: rotate(90deg);
  -moz-transform-origin: 0 0;
  -o-transform: rotate(90deg);
  -o-transform-origin: 0 0;
  transform: rotate(90deg);
  transform-origin: 0 0;
}
.layout-expand-with-icon {
  top: 18px;
}
.layout-expand .panel-body-noheader .layout-expand-title,
.layout-expand .panel-body-noheader .panel-icon {
  top: 5px;
}
.layout-expand .panel-body-noheader .layout-expand-with-icon {
  top: 23px;
}
.layout-split-proxy-h,
.layout-split-proxy-v {
  position: absolute;
  font-size: 1px;
  display: none;
  z-index: 5;
}
.layout-split-proxy-h {
  width: 5px;
  cursor: e-resize;
}
.layout-split-proxy-v {
  height: 5px;
  cursor: n-resize;
}
.layout-mask {
  position: absolute;
  background: #fafafa;
  filter: alpha(opacity=10);
  opacity: 0.10;
  z-index: 4;
}
.layout-button-up {
  background: url('images/layout_arrows.png') no-repeat -16px -16px;
}
.layout-button-down {
  background: url('images/layout_arrows.png') no-repeat -16px 0;
}
.layout-button-left {
  background: url('images/layout_arrows.png') no-repeat 0 0;
}
.layout-button-right {
  background: url('images/layout_arrows.png') no-repeat 0 -16px;
}
.layout-split-proxy-h,
.layout-split-proxy-v {
  background-color: #aac5e7;
}
.layout-split-north {
  border-bottom: 5px solid #E6EEF8;
}
.layout-split-south {
  border-top: 5px solid #E6EEF8;
}
.layout-split-east {
  border-left: 5px solid #E6EEF8;
}
.layout-split-west {
  border-right: 5px solid #E6EEF8;
}
.layout-expand {
  background-color: #E0ECFF;
}
.layout-expand-over {
  background-color: #E0ECFF;
}
.tabs-container {
  overflow: hidden;
}
.tabs-header {
  border-width: 1px;
  border-style: solid;
  border-bottom-width: 0;
  position: relative;
  padding: 0;
  padding-top: 2px;
  overflow: hidden;
}
.tabs-scroller-left,
.tabs-scroller-right {
  position: absolute;
  top: auto;
  bottom: 0;
  width: 18px;
  font-size: 1px;
  display: none;
  cursor: pointer;
  border-width: 1px;
  border-style: solid;
}
.tabs-scroller-left {
  left: 0;
}
.tabs-scroller-right {
  right: 0;
}
.tabs-tool {
  position: absolute;
  bottom: 0;
  padding: 1px;
  overflow: hidden;
  border-width: 1px;
  border-style: solid;
}
.tabs-header-plain .tabs-tool {
  padding: 0 1px;
}
.tabs-wrap {
  position: relative;
  left: 0;
  overflow: hidden;
  width: 100%;
  margin: 0;
  padding: 0;
}
.tabs-scrolling {
  margin-left: 18px;
  margin-right: 18px;
}
.tabs-disabled {
  opacity: 0.3;
  filter: alpha(opacity=30);
}
.tabs {
  list-style-type: none;
  height: 26px;
  margin: 0px;
  padding: 0px;
  padding-left: 4px;
  width: 50000px;
  border-style: solid;
  border-width: 0 0 1px 0;
}
.tabs li {
  float: left;
  display: inline-block;
  margin: 0 4px -1px 0;
  padding: 0;
  position: relative;
  border: 0;
}
.tabs li a.tabs-inner {
  display: inline-block;
  text-decoration: none;
  margin: 0;
  padding: 0 10px;
  height: 25px;
  line-height: 25px;
  text-align: center;
  white-space: nowrap;
  border-width: 1px;
  border-style: solid;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
}
.tabs li.tabs-selected a.tabs-inner {
  font-weight: bold;
  outline: none;
}
.tabs li.tabs-selected a:hover.tabs-inner {
  cursor: default;
  pointer: default;
}
.tabs li a.tabs-close,
.tabs-p-tool {
  position: absolute;
  font-size: 1px;
  display: block;
  height: 12px;
  padding: 0;
  top: 50%;
  margin-top: -6px;
  overflow: hidden;
}
.tabs li a.tabs-close {
  width: 12px;
  right: 5px;
  opacity: 0.6;
  filter: alpha(opacity=60);
}
.tabs-p-tool {
  right: 16px;
}
.tabs-p-tool a {
  display: inline-block;
  font-size: 1px;
  width: 12px;
  height: 12px;
  margin: 0;
  opacity: 0.6;
  filter: alpha(opacity=60);
}
.tabs li a:hover.tabs-close,
.tabs-p-tool a:hover {
  opacity: 1;
  filter: alpha(opacity=100);
  cursor: hand;
  cursor: pointer;
}
.tabs-with-icon {
  padding-left: 18px;
}
.tabs-icon {
  position: absolute;
  width: 16px;
  height: 16px;
  left: 10px;
  top: 50%;
  margin-top: -8px;
}
.tabs-title {
  font-size: 12px;
}
.tabs-closable {
  padding-right: 8px;
}
.tabs-panels {
  margin: 0px;
  padding: 0px;
  border-width: 1px;
  border-style: solid;
  border-top-width: 0;
  overflow: hidden;
}
.tabs-header-bottom {
  border-width: 0 1px 1px 1px;
  padding: 0 0 2px 0;
}
.tabs-header-bottom .tabs {
  border-width: 1px 0 0 0;
}
.tabs-header-bottom .tabs li {
  margin: -1px 4px 0 0;
}
.tabs-header-bottom .tabs li a.tabs-inner {
  -moz-border-radius: 0 0 5px 5px;
  -webkit-border-radius: 0 0 5px 5px;
  border-radius: 0 0 5px 5px;
}
.tabs-header-bottom .tabs-tool {
  top: 0;
}
.tabs-header-bottom .tabs-scroller-left,
.tabs-header-bottom .tabs-scroller-right {
  top: 0;
  bottom: auto;
}
.tabs-panels-top {
  border-width: 1px 1px 0 1px;
}
.tabs-header-left {
  float: left;
  border-width: 1px 0 1px 1px;
  padding: 0;
}
.tabs-header-right {
  float: right;
  border-width: 1px 1px 1px 0;
  padding: 0;
}
.tabs-header-left .tabs-wrap,
.tabs-header-right .tabs-wrap {
  height: 100%;
}
.tabs-header-left .tabs {
  height: 100%;
  padding: 4px 0 0 2px;
  border-width: 0 1px 0 0;
}
.tabs-header-right .tabs {
  height: 100%;
  padding: 4px 2px 0 0;
  border-width: 0 0 0 1px;
}
.tabs-header-left .tabs li,
.tabs-header-right .tabs li {
  display: block;
  width: 100%;
  position: relative;
}
.tabs-header-left .tabs li {
  left: auto;
  right: 0;
  margin: 0 -1px 4px 0;
  float: right;
}
.tabs-header-right .tabs li {
  left: 0;
  right: auto;
  margin: 0 0 4px -1px;
  float: left;
}
.tabs-justified li a.tabs-inner {
  padding-left: 0;
  padding-right: 0;
}
.tabs-header-left .tabs li a.tabs-inner {
  display: block;
  text-align: left;
  padding-left: 10px;
  padding-right: 10px;
  -moz-border-radius: 5px 0 0 5px;
  -webkit-border-radius: 5px 0 0 5px;
  border-radius: 5px 0 0 5px;
}
.tabs-header-right .tabs li a.tabs-inner {
  display: block;
  text-align: left;
  padding-left: 10px;
  padding-right: 10px;
  -moz-border-radius: 0 5px 5px 0;
  -webkit-border-radius: 0 5px 5px 0;
  border-radius: 0 5px 5px 0;
}
.tabs-panels-right {
  float: right;
  border-width: 1px 1px 1px 0;
}
.tabs-panels-left {
  float: left;
  border-width: 1px 0 1px 1px;
}
.tabs-header-noborder,
.tabs-panels-noborder {
  border: 0px;
}
.tabs-header-plain {
  border: 0px;
  background: transparent;
}
.tabs-pill {
  padding-bottom: 3px;
}
.tabs-header-bottom .tabs-pill {
  padding-top: 3px;
  padding-bottom: 0;
}
.tabs-header-left .tabs-pill {
  padding-right: 3px;
}
.tabs-header-right .tabs-pill {
  padding-left: 3px;
}
.tabs-header .tabs-pill li a.tabs-inner {
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.tabs-header-narrow,
.tabs-header-narrow .tabs-narrow {
  padding: 0;
}
.tabs-narrow li,
.tabs-header-bottom .tabs-narrow li {
  margin-left: 0;
  margin-right: -1px;
}
.tabs-narrow li.tabs-last,
.tabs-header-bottom .tabs-narrow li.tabs-last {
  margin-right: 0;
}
.tabs-header-left .tabs-narrow,
.tabs-header-right .tabs-narrow {
  padding-top: 0;
}
.tabs-header-left .tabs-narrow li {
  margin-bottom: -1px;
  margin-right: -1px;
}
.tabs-header-left .tabs-narrow li.tabs-last,
.tabs-header-right .tabs-narrow li.tabs-last {
  margin-bottom: 0;
}
.tabs-header-right .tabs-narrow li {
  margin-bottom: -1px;
  margin-left: -1px;
}
.tabs-scroller-left {
  background: #E0ECFF url('images/tabs_icons.png') no-repeat 1px center;
}
.tabs-scroller-right {
  background: #E0ECFF url('images/tabs_icons.png') no-repeat -15px center;
}
.tabs li a.tabs-close {
  background: url('images/tabs_icons.png') no-repeat -34px center;
}
.tabs li a.tabs-inner:hover {
  background: #eaf2ff;
  color: #000000;
  filter: none;
}
.tabs li.tabs-selected a.tabs-inner {
  background-color: #ffffff;
  color: #0E2D5F;
  background: -webkit-linear-gradient(top,#EFF5FF 0,#ffffff 100%);
  background: -moz-linear-gradient(top,#EFF5FF 0,#ffffff 100%);
  background: -o-linear-gradient(top,#EFF5FF 0,#ffffff 100%);
  background: linear-gradient(to bottom,#EFF5FF 0,#ffffff 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#EFF5FF,endColorstr=#ffffff,GradientType=0);
}
.tabs-header-bottom .tabs li.tabs-selected a.tabs-inner {
  background: -webkit-linear-gradient(top,#ffffff 0,#EFF5FF 100%);
  background: -moz-linear-gradient(top,#ffffff 0,#EFF5FF 100%);
  background: -o-linear-gradient(top,#ffffff 0,#EFF5FF 100%);
  background: linear-gradient(to bottom,#ffffff 0,#EFF5FF 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffffff,endColorstr=#EFF5FF,GradientType=0);
}
.tabs-header-left .tabs li.tabs-selected a.tabs-inner {
  background: -webkit-linear-gradient(left,#EFF5FF 0,#ffffff 100%);
  background: -moz-linear-gradient(left,#EFF5FF 0,#ffffff 100%);
  background: -o-linear-gradient(left,#EFF5FF 0,#ffffff 100%);
  background: linear-gradient(to right,#EFF5FF 0,#ffffff 100%);
  background-repeat: repeat-y;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#EFF5FF,endColorstr=#ffffff,GradientType=1);
}
.tabs-header-right .tabs li.tabs-selected a.tabs-inner {
  background: -webkit-linear-gradient(left,#ffffff 0,#EFF5FF 100%);
  background: -moz-linear-gradient(left,#ffffff 0,#EFF5FF 100%);
  background: -o-linear-gradient(left,#ffffff 0,#EFF5FF 100%);
  background: linear-gradient(to right,#ffffff 0,#EFF5FF 100%);
  background-repeat: repeat-y;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffffff,endColorstr=#EFF5FF,GradientType=1);
}
.tabs li a.tabs-inner {
  color: #0E2D5F;
  background-color: #E0ECFF;
  background: -webkit-linear-gradient(top,#EFF5FF 0,#E0ECFF 100%);
  background: -moz-linear-gradient(top,#EFF5FF 0,#E0ECFF 100%);
  background: -o-linear-gradient(top,#EFF5FF 0,#E0ECFF 100%);
  background: linear-gradient(to bottom,#EFF5FF 0,#E0ECFF 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#EFF5FF,endColorstr=#E0ECFF,GradientType=0);
}
.tabs-header,
.tabs-tool {
  background-color: #E0ECFF;
}
.tabs-header-plain {
  background: transparent;
}
.tabs-header,
.tabs-scroller-left,
.tabs-scroller-right,
.tabs-tool,
.tabs,
.tabs-panels,
.tabs li a.tabs-inner,
.tabs li.tabs-selected a.tabs-inner,
.tabs-header-bottom .tabs li.tabs-selected a.tabs-inner,
.tabs-header-left .tabs li.tabs-selected a.tabs-inner,
.tabs-header-right .tabs li.tabs-selected a.tabs-inner {
  border-color: #95B8E7;
}
.tabs-p-tool a:hover,
.tabs li a:hover.tabs-close,
.tabs-scroller-over {
  background-color: #eaf2ff;
}
.tabs li.tabs-selected a.tabs-inner {
  border-bottom: 1px solid #ffffff;
}
.tabs-header-bottom .tabs li.tabs-selected a.tabs-inner {
  border-top: 1px solid #ffffff;
}
.tabs-header-left .tabs li.tabs-selected a.tabs-inner {
  border-right: 1px solid #ffffff;
}
.tabs-header-right .tabs li.tabs-selected a.tabs-inner {
  border-left: 1px solid #ffffff;
}
.tabs-header .tabs-pill li.tabs-selected a.tabs-inner {
  background: #ffe48d;
  color: #000000;
  filter: none;
  border-color: #95B8E7;
}
.datagrid .panel-body {
  overflow: hidden;
  position: relative;
}
.datagrid-view {
  position: relative;
  overflow: hidden;
}
.datagrid-view1,
.datagrid-view2 {
  position: absolute;
  overflow: hidden;
  top: 0;
}
.datagrid-view1 {
  left: 0;
}
.datagrid-view2 {
  right: 0;
}
.datagrid-mask {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  opacity: 0.3;
  filter: alpha(opacity=30);
  display: none;
}
.datagrid-mask-msg {
  position: absolute;
  top: 50%;
  margin-top: -20px;
  padding: 10px 5px 10px 30px;
  width: auto;
  height: 16px;
  border-width: 2px;
  border-style: solid;
  display: none;
}
.datagrid-empty {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 25px;
  line-height: 25px;
  text-align: center;
}
.datagrid-sort-icon {
  padding: 0;
  display: none;
}
.datagrid-toolbar {
  height: auto;
  padding: 1px 2px;
  border-width: 0 0 1px 0;
  border-style: solid;
}
.datagrid-btn-separator {
  float: left;
  height: 24px;
  border-left: 1px solid #ccc;
  border-right: 1px solid #fff;
  margin: 2px 1px;
}
.datagrid .datagrid-pager {
  display: block;
  margin: 0;
  border-width: 1px 0 0 0;
  border-style: solid;
}
.datagrid .datagrid-pager-top {
  border-width: 0 0 1px 0;
}
.datagrid-header {
  overflow: hidden;
  cursor: default;
  border-width: 0 0 1px 0;
  border-style: solid;
}
.datagrid-header-inner {
  float: left;
  width: 10000px;
}
.datagrid-header-row,
.datagrid-row {
  height: 25px;
}
.datagrid-header td,
.datagrid-body td,
.datagrid-footer td {
  border-width: 0 1px 1px 0;
  border-style: dotted;
  margin: 0;
  padding: 0;
}
.datagrid-cell,
.datagrid-cell-group,
.datagrid-header-rownumber,
.datagrid-cell-rownumber {
  margin: 0;
  padding: 0 4px;
  white-space: nowrap;
  word-wrap: normal;
  overflow: hidden;
  height: 18px;
  line-height: 18px;
  font-size: 12px;
}
.datagrid-header .datagrid-cell {
  height: auto;
}
.datagrid-header .datagrid-cell span {
  font-size: 12px;
}
.datagrid-cell-group {
  text-align: center;
  text-overflow: ellipsis;
}
.datagrid-header-rownumber,
.datagrid-cell-rownumber {
  width: 30px;
  text-align: center;
  margin: 0;
  padding: 0;
}
.datagrid-body {
  margin: 0;
  padding: 0;
  overflow: auto;
  zoom: 1;
}
.datagrid-view1 .datagrid-body-inner {
  padding-bottom: 20px;
}
.datagrid-view1 .datagrid-body {
  overflow: hidden;
}
.datagrid-footer {
  overflow: hidden;
}
.datagrid-footer-inner {
  border-width: 1px 0 0 0;
  border-style: solid;
  width: 10000px;
  float: left;
}
.datagrid-row-editing .datagrid-cell {
  height: auto;
}
.datagrid-header-check,
.datagrid-cell-check {
  padding: 0;
  width: 27px;
  height: 18px;
  font-size: 1px;
  text-align: center;
  overflow: hidden;
}
.datagrid-header-check input,
.datagrid-cell-check input {
  margin: 0;
  padding: 0;
  width: 15px;
  height: 18px;
}
.datagrid-resize-proxy {
  position: absolute;
  width: 1px;
  height: 10000px;
  top: 0;
  cursor: e-resize;
  display: none;
}
.datagrid-body .datagrid-editable {
  margin: 0;
  padding: 0;
}
.datagrid-body .datagrid-editable table {
  width: 100%;
  height: 100%;
}
.datagrid-body .datagrid-editable td {
  border: 0;
  margin: 0;
  padding: 0;
}
.datagrid-view .datagrid-editable-input {
  margin: 0;
  padding: 2px 4px;
  border: 1px solid #95B8E7;
  font-size: 12px;
  outline-style: none;
  -moz-border-radius: 0 0 0 0;
  -webkit-border-radius: 0 0 0 0;
  border-radius: 0 0 0 0;
}
.datagrid-view .validatebox-invalid {
  border-color: #ffa8a8;
}
.datagrid-sort .datagrid-sort-icon {
  display: inline;
  padding: 0 13px 0 0;
  background: url('images/datagrid_icons.png') no-repeat -64px center;
}
.datagrid-sort-desc .datagrid-sort-icon {
  display: inline;
  padding: 0 13px 0 0;
  background: url('images/datagrid_icons.png') no-repeat -16px center;
}
.datagrid-sort-asc .datagrid-sort-icon {
  display: inline;
  padding: 0 13px 0 0;
  background: url('images/datagrid_icons.png') no-repeat 0px center;
}
.datagrid-row-collapse {
  background: url('images/datagrid_icons.png') no-repeat -48px center;
}
.datagrid-row-expand {
  background: url('images/datagrid_icons.png') no-repeat -32px center;
}
.datagrid-mask-msg {
  background: #ffffff url('images/loading.gif') no-repeat scroll 5px center;
}
.datagrid-header,
.datagrid-td-rownumber {
  background-color: #efefef;
  background: -webkit-linear-gradient(top,#F9F9F9 0,#efefef 100%);
  background: -moz-linear-gradient(top,#F9F9F9 0,#efefef 100%);
  background: -o-linear-gradient(top,#F9F9F9 0,#efefef 100%);
  background: linear-gradient(to bottom,#F9F9F9 0,#efefef 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#F9F9F9,endColorstr=#efefef,GradientType=0);
}
.datagrid-cell-rownumber {
  color: #000000;
}
.datagrid-resize-proxy {
  background: #aac5e7;
}
.datagrid-mask {
  background: #ccc;
}
.datagrid-mask-msg {
  border-color: #95B8E7;
}
.datagrid-toolbar,
.datagrid-pager {
  background: #F4F4F4;
}
.datagrid-header,
.datagrid-toolbar,
.datagrid-pager,
.datagrid-footer-inner {
  border-color: #dddddd;
}
.datagrid-header td,
.datagrid-body td,
.datagrid-footer td {
  border-color: #ccc;
}
.datagrid-htable,
.datagrid-btable,
.datagrid-ftable {
  color: #000000;
  border-collapse: separate;
}
.datagrid-row-alt {
  background: #fafafa;
}
.datagrid-row-over,
.datagrid-header td.datagrid-header-over {
  background: #eaf2ff;
  color: #000000;
  cursor: default;
}
.datagrid-row-selected {
  background: #ffe48d;
  color: #000000;
}
.datagrid-row-editing .textbox,
.datagrid-row-editing .textbox-text {
  -moz-border-radius: 0 0 0 0;
  -webkit-border-radius: 0 0 0 0;
  border-radius: 0 0 0 0;
}
.propertygrid .datagrid-view1 .datagrid-body td {
  padding-bottom: 1px;
  border-width: 0 1px 0 0;
}
.propertygrid .datagrid-group {
  height: 21px;
  overflow: hidden;
  border-width: 0 0 1px 0;
  border-style: solid;
}
.propertygrid .datagrid-group span {
  font-weight: bold;
}
.propertygrid .datagrid-view1 .datagrid-body td {
  border-color: #dddddd;
}
.propertygrid .datagrid-view1 .datagrid-group {
  border-color: #E0ECFF;
}
.propertygrid .datagrid-view2 .datagrid-group {
  border-color: #dddddd;
}
.propertygrid .datagrid-group,
.propertygrid .datagrid-view1 .datagrid-body,
.propertygrid .datagrid-view1 .datagrid-row-over,
.propertygrid .datagrid-view1 .datagrid-row-selected {
  background: #E0ECFF;
}
.datalist .datagrid-header {
  border-width: 0;
}
.datalist .datagrid-group,
.m-list .m-list-group {
  height: 25px;
  line-height: 25px;
  font-weight: bold;
  overflow: hidden;
  background-color: #efefef;
  border-style: solid;
  border-width: 0 0 1px 0;
  border-color: #ccc;
}
.datalist .datagrid-group-expander {
  display: none;
}
.datalist .datagrid-group-title {
  padding: 0 4px;
}
.datalist .datagrid-btable {
  width: 100%;
  table-layout: fixed;
}
.datalist .datagrid-row td {
  border-style: solid;
  border-left-color: transparent;
  border-right-color: transparent;
  border-bottom-width: 0;
}
.datalist-lines .datagrid-row td {
  border-bottom-width: 1px;
}
.datalist .datagrid-cell,
.m-list li {
  width: auto;
  height: auto;
  padding: 2px 4px;
  line-height: 18px;
  position: relative;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}
.datalist-link,
.m-list li>a {
  display: block;
  position: relative;
  cursor: pointer;
  color: #000000;
  text-decoration: none;
  overflow: hidden;
  margin: -2px -4px;
  padding: 2px 4px;
  padding-right: 16px;
  line-height: 18px;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}
.datalist-link::after,
.m-list li>a::after {
  position: absolute;
  display: block;
  width: 8px;
  height: 8px;
  content: '';
  right: 6px;
  top: 50%;
  margin-top: -4px;
  border-style: solid;
  border-width: 1px 1px 0 0;
  -ms-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
}
.m-list {
  margin: 0;
  padding: 0;
  list-style: none;
}
.m-list li {
  border-style: solid;
  border-width: 0 0 1px 0;
  border-color: #ccc;
}
.m-list li>a:hover {
  background: #eaf2ff;
  color: #000000;
}
.m-list .m-list-group {
  padding: 0 4px;
}
.pagination {
  zoom: 1;
}
.pagination table {
  float: left;
  height: 30px;
}
.pagination td {
  border: 0;
}
.pagination-btn-separator {
  float: left;
  height: 24px;
  border-left: 1px solid #ccc;
  border-right: 1px solid #fff;
  margin: 3px 1px;
}
.pagination .pagination-num {
  border-width: 1px;
  border-style: solid;
  margin: 0 2px;
  padding: 2px;
  width: 2em;
  height: auto;
}
.pagination-page-list {
  margin: 0px 6px;
  padding: 1px 2px;
  width: auto;
  height: auto;
  border-width: 1px;
  border-style: solid;
}
.pagination-info {
  float: right;
  margin: 0 6px 0 0;
  padding: 0;
  height: 30px;
  line-height: 30px;
  font-size: 12px;
}
.pagination span {
  font-size: 12px;
}
.pagination-link .l-btn-text {
  width: 24px;
  text-align: center;
  margin: 0;
}
.pagination-first {
  background: url('images/pagination_icons.png') no-repeat 0 center;
}
.pagination-prev {
  background: url('images/pagination_icons.png') no-repeat -16px center;
}
.pagination-next {
  background: url('images/pagination_icons.png') no-repeat -32px center;
}
.pagination-last {
  background: url('images/pagination_icons.png') no-repeat -48px center;
}
.pagination-load {
  background: url('images/pagination_icons.png') no-repeat -64px center;
}
.pagination-loading {
  background: url('images/loading.gif') no-repeat center center;
}
.pagination-page-list,
.pagination .pagination-num {
  border-color: #95B8E7;
}
.calendar {
  border-width: 1px;
  border-style: solid;
  padding: 1px;
  overflow: hidden;
}
.calendar table {
  table-layout: fixed;
  border-collapse: separate;
  font-size: 12px;
  width: 100%;
  height: 100%;
}
.calendar table td,
.calendar table th {
  font-size: 12px;
}
.calendar-noborder {
  border: 0;
}
.calendar-header {
  position: relative;
  height: 22px;
}
.calendar-title {
  text-align: center;
  height: 22px;
}
.calendar-title span {
  position: relative;
  display: inline-block;
  top: 2px;
  padding: 0 3px;
  height: 18px;
  line-height: 18px;
  font-size: 12px;
  cursor: pointer;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.calendar-prevmonth,
.calendar-nextmonth,
.calendar-prevyear,
.calendar-nextyear {
  position: absolute;
  top: 50%;
  margin-top: -7px;
  width: 14px;
  height: 14px;
  cursor: pointer;
  font-size: 1px;
  -moz-border-radius: 5px 5px 5px 5px;

  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.calendar-prevmonth {
  left: 20px;
  background: url('images/calendar_arrows.png') no-repeat -18px -2px;
}
.calendar-nextmonth {
  right: 20px;
  background: url('images/calendar_arrows.png') no-repeat -34px -2px;
}
.calendar-prevyear {
  left: 3px;
  background: url('images/calendar_arrows.png') no-repeat -1px -2px;
}
.calendar-nextyear {
  right: 3px;
  background: url('images/calendar_arrows.png') no-repeat -49px -2px;
}
.calendar-body {
  position: relative;
}
.calendar-body th,
.calendar-body td {
  text-align: center;
}
.calendar-day {
  border: 0;
  padding: 1px;
  cursor: pointer;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.calendar-other-month {
  opacity: 0.3;
  filter: alpha(opacity=30);
}
.calendar-disabled {
  opacity: 0.6;
  filter: alpha(opacity=60);
  cursor: default;
}
.calendar-menu {
  position: absolute;
  top: 0;
  left: 0;
  width: 180px;
  height: 150px;
  padding: 5px;
  font-size: 12px;
  display: none;
  overflow: hidden;
}
.calendar-menu-year-inner {
  text-align: center;
  padding-bottom: 5px;
}
.calendar-menu-year {
  width: 50px;
  text-align: center;
  border-width: 1px;
  border-style: solid;
  outline-style: none;
  resize: none;
  margin: 0;
  padding: 2px;
  font-weight: bold;
  font-size: 12px;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.calendar-menu-prev,
.calendar-menu-next {
  display: inline-block;
  width: 21px;
  height: 21px;
  vertical-align: top;
  cursor: pointer;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.calendar-menu-prev {
  margin-right: 10px;
  background: url('images/calendar_arrows.png') no-repeat 2px 2px;
}
.calendar-menu-next {
  margin-left: 10px;
  background: url('images/calendar_arrows.png') no-repeat -45px 2px;
}
.calendar-menu-month {
  text-align: center;
  cursor: pointer;
  font-weight: bold;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.calendar-body th,
.calendar-menu-month {
  color: #4d4d4d;
}
.calendar-day {
  color: #000000;
}
.calendar-sunday {
  color: #CC2222;
}
.calendar-saturday {
  color: #00ee00;
}
.calendar-today {
  color: #0000ff;
}
.calendar-menu-year {
  border-color: #95B8E7;
}
.calendar {
  border-color: #95B8E7;
}
.calendar-header {
  background: #E0ECFF;
}
.calendar-body,
.calendar-menu {
  background: #ffffff;
}
.calendar-body th {
  background: #F4F4F4;
  padding: 2px 0;
}
.calendar-hover,
.calendar-nav-hover,
.calendar-menu-hover {
  background-color: #eaf2ff;
  color: #000000;
}
.calendar-hover {
  border: 1px solid #b7d2ff;
  padding: 0;
}
.calendar-selected {
  background-color: #ffe48d;
  color: #000000;
  border: 1px solid #ffab3f;
  padding: 0;
}
.datebox-calendar-inner {
  height: 180px;
}
.datebox-button {
  padding: 0 5px;
  text-align: center;
}
.datebox-button a {
  line-height: 22px;
  font-size: 12px;
  font-weight: bold;
  text-decoration: none;
  opacity: 0.6;
  filter: alpha(opacity=60);
}
.datebox-button a:hover {
  opacity: 1.0;
  filter: alpha(opacity=100);
}
.datebox-current,
.datebox-close {
  float: left;
}
.datebox-close {
  float: right;
}
.datebox .combo-arrow {
  background-image: url('images/datebox_arrow.png');
  background-position: center center;
}
.datebox-button {
  background-color: #F4F4F4;
}
.datebox-button a {
  color: #444;
}
.spinner-arrow {
  background-color: #E0ECFF;
  display: inline-block;
  overflow: hidden;
  vertical-align: top;
  margin: 0;
  padding: 0;
  opacity: 1.0;
  filter: alpha(opacity=100);
  width: 18px;
}
.spinner-arrow-up,
.spinner-arrow-down {
  opacity: 0.6;
  filter: alpha(opacity=60);
  display: block;
  font-size: 1px;
  width: 18px;
  height: 10px;
  width: 100%;
  height: 50%;
  color: #444;
  outline-style: none;
}
.spinner-arrow-hover {
  background-color: #eaf2ff;
  opacity: 1.0;
  filter: alpha(opacity=100);
}
.spinner-arrow-up:hover,
.spinner-arrow-down:hover {
  opacity: 1.0;
  filter: alpha(opacity=100);
  background-color: #eaf2ff;
}
.textbox-icon-disabled .spinner-arrow-up:hover,
.textbox-icon-disabled .spinner-arrow-down:hover {
  opacity: 0.6;
  filter: alpha(opacity=60);
  background-color: #E0ECFF;
  cursor: default;
}
.spinner .textbox-icon-disabled {
  opacity: 0.6;
  filter: alpha(opacity=60);
}
.spinner-arrow-up {
  background: url('images/spinner_arrows.png') no-repeat 1px center;
}
.spinner-arrow-down {
  background: url('images/spinner_arrows.png') no-repeat -15px center;
}
.spinner-button-up {
  background: url('images/spinner_arrows.png') no-repeat -32px center;
}
.spinner-button-down {
  background: url('images/spinner_arrows.png') no-repeat -48px center;
}
.progressbar {
  border-width: 1px;
  border-style: solid;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  overflow: hidden;
  position: relative;
}
.progressbar-text {
  text-align: center;
  position: absolute;
}
.progressbar-value {
  position: relative;
  overflow: hidden;
  width: 0;
  -moz-border-radius: 5px 0 0 5px;
  -webkit-border-radius: 5px 0 0 5px;
  border-radius: 5px 0 0 5px;
}
.progressbar {
  border-color: #95B8E7;
}
.progressbar-text {
  color: #000000;
  font-size: 12px;
}
.progressbar-value .progressbar-text {
  background-color: #ffe48d;
  color: #000000;
}
.searchbox-button {
  width: 18px;
  height: 20px;
  overflow: hidden;
  display: inline-block;
  vertical-align: top;
  cursor: pointer;
  opacity: 0.6;
  filter: alpha(opacity=60);
}
.searchbox-button-hover {
  opacity: 1.0;
  filter: alpha(opacity=100);
}
.searchbox .l-btn-plain {
  border: 0;
  padding: 0;
  vertical-align: top;
  opacity: 0.6;
  filter: alpha(opacity=60);
  -moz-border-radius: 0 0 0 0;
  -webkit-border-radius: 0 0 0 0;
  border-radius: 0 0 0 0;
}
.searchbox .l-btn-plain:hover {
  border: 0;
  padding: 0;
  opacity: 1.0;
  filter: alpha(opacity=100);
  -moz-border-radius: 0 0 0 0;
  -webkit-border-radius: 0 0 0 0;
  border-radius: 0 0 0 0;
}
.searchbox a.m-btn-plain-active {
  -moz-border-radius: 0 0 0 0;
  -webkit-border-radius: 0 0 0 0;
  border-radius: 0 0 0 0;
}
.searchbox .m-btn-active {
  border-width: 0 1px 0 0;
  -moz-border-radius: 0 0 0 0;
  -webkit-border-radius: 0 0 0 0;
  border-radius: 0 0 0 0;
}
.searchbox .textbox-button-right {
  border-width: 0 0 0 1px;
}
.searchbox .textbox-button-left {
  border-width: 0 1px 0 0;
}
.searchbox-button {
  background: url('images/searchbox_button.png') no-repeat center center;
}
.searchbox .l-btn-plain {
  background: #E0ECFF;
}
.searchbox .l-btn-plain-disabled,
.searchbox .l-btn-plain-disabled:hover {
  opacity: 0.5;
  filter: alpha(opacity=50);
}
.slider-disabled {
  opacity: 0.5;
  filter: alpha(opacity=50);
}
.slider-h {
  height: 22px;
}
.slider-v {
  width: 22px;
}
.slider-inner {
  position: relative;
  height: 6px;
  top: 7px;
  border-width: 1px;
  border-style: solid;
  border-radius: 5px;
}
.slider-handle {
  position: absolute;
  display: block;
  outline: none;
  width: 20px;
  height: 20px;
  top: 50%;
  margin-top: -10px;
  margin-left: -10px;
}
.slider-tip {
  position: absolute;
  display: inline-block;
  line-height: 12px;
  font-size: 12px;
  white-space: nowrap;
  top: -22px;
}
.slider-rule {
  position: relative;
  top: 15px;
}
.slider-rule span {
  position: absolute;
  display: inline-block;
  font-size: 0;
  height: 5px;
  border-width: 0 0 0 1px;
  border-style: solid;
}
.slider-rulelabel {
  position: relative;
  top: 20px;
}
.slider-rulelabel span {
  position: absolute;
  display: inline-block;
  font-size: 12px;
}
.slider-v .slider-inner {
  width: 6px;
  left: 7px;
  top: 0;
  float: left;
}
.slider-v .slider-handle {
  left: 50%;
  margin-top: -10px;
}
.slider-v .slider-tip {
  left: -10px;
  margin-top: -6px;
}
.slider-v .slider-rule {
  float: left;
  top: 0;
  left: 16px;
}
.slider-v .slider-rule span {
  width: 5px;
  height: 'auto';
  border-left: 0;
  border-width: 1px 0 0 0;
  border-style: solid;
}
.slider-v .slider-rulelabel {
  float: left;
  top: 0;
  left: 23px;
}
.slider-handle {
  background: url('images/slider_handle.png') no-repeat;
}
.slider-inner {
  border-color: #95B8E7;
  background: #E0ECFF;
}
.slider-rule span {
  border-color: #95B8E7;
}
.slider-rulelabel span {
  color: #000000;
}
.menu {
  position: absolute;
  margin: 0;
  padding: 2px;
  border-width: 1px;
  border-style: solid;
  overflow: hidden;
}
.menu-inline {
  position: relative;
}
.menu-item {
  position: relative;
  margin: 0;
  padding: 0;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  border-width: 1px;
  border-style: solid;
}
.menu-text {
  height: 20px;
  line-height: 20px;
  float: left;
  padding-left: 28px;
}
.menu-icon {
  position: absolute;
  width: 16px;
  height: 16px;
  left: 2px;
  top: 50%;
  margin-top: -8px;
}
.menu-rightarrow {
  position: absolute;
  width: 16px;
  height: 16px;
  right: 0;
  top: 50%;
  margin-top: -8px;
}
.menu-line {
  position: absolute;
  left: 26px;
  top: 0;
  height: 2000px;
  font-size: 1px;
}
.menu-sep {
  margin: 3px 0px 3px 25px;
  font-size: 1px;
}
.menu-noline .menu-line {
  display: none;
}
.menu-noline .menu-sep {
  margin-left: 0;
  margin-right: 0;
}
.menu-active {
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.menu-item-disabled {
  opacity: 0.5;
  filter: alpha(opacity=50);
  cursor: default;
}
.menu-text,
.menu-text span {
  font-size: 12px;
}
.menu-shadow {
  position: absolute;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  background: #ccc;
  -moz-box-shadow: 2px 2px 3px #cccccc;
  -webkit-box-shadow: 2px 2px 3px #cccccc;
  box-shadow: 2px 2px 3px #cccccc;
  filter: progid:DXImageTransform.Microsoft.Blur(pixelRadius=2,MakeShadow=false,ShadowOpacity=0.2);
}
.menu-rightarrow {
  background: url('images/menu_arrows.png') no-repeat -32px center;
}
.menu-line {
  border-left: 1px solid #ccc;
  border-right: 1px solid #fff;
}
.menu-sep {
  border-top: 1px solid #ccc;
  border-bottom: 1px solid #fff;
}
.menu {
  background-color: #fafafa;
  border-color: #ddd;
  color: #444;
}
.menu-content {
  background: #ffffff;
}
.menu-item {
  border-color: transparent;
  _border-color: #fafafa;
}
.menu-active {
  border-color: #b7d2ff;
  color: #000000;
  background: #eaf2ff;
}
.menu-active-disabled {
  border-color: transparent;
  background: transparent;
  color: #444;
}
.m-btn-downarrow,
.s-btn-downarrow {
  display: inline-block;
  position: absolute;
  width: 16px;
  height: 16px;
  font-size: 1px;
  right: 0;
  top: 50%;
  margin-top: -8px;
}
.m-btn-active,
.s-btn-active {
  background: #eaf2ff;
  color: #000000;
  border: 1px solid #b7d2ff;
  filter: none;
}
.m-btn-plain-active,
.s-btn-plain-active {
  background: transparent;
  padding: 0;
  border-width: 1px;
  border-style: solid;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.m-btn .l-btn-left .l-btn-text {
  margin-right: 20px;
}
.m-btn .l-btn-icon-right .l-btn-text {
  margin-right: 40px;
}
.m-btn .l-btn-icon-right .l-btn-icon {
  right: 20px;
}
.m-btn .l-btn-icon-top .l-btn-text {
  margin-right: 4px;
  margin-bottom: 14px;
}
.m-btn .l-btn-icon-bottom .l-btn-text {
  margin-right: 4px;
  margin-bottom: 34px;
}
.m-btn .l-btn-icon-bottom .l-btn-icon {
  top: auto;
  bottom: 20px;
}
.m-btn .l-btn-icon-top .m-btn-downarrow,
.m-btn .l-btn-icon-bottom .m-btn-downarrow {
  top: auto;
  bottom: 0px;
  left: 50%;
  margin-left: -8px;
}
.m-btn-line {
  display: inline-block;
  position: absolute;
  font-size: 1px;
  display: none;
}
.m-btn .l-btn-left .m-btn-line {
  right: 0;
  width: 16px;
  height: 500px;
  border-style: solid;
  border-color: #aac5e7;
  border-width: 0 0 0 1px;
}
.m-btn .l-btn-icon-top .m-btn-line,
.m-btn .l-btn-icon-bottom .m-btn-line {
  left: 0;
  bottom: 0;
  width: 500px;
  height: 16px;
  border-width: 1px 0 0 0;
}
.m-btn-large .l-btn-icon-right .l-btn-text {
  margin-right: 56px;
}
.m-btn-large .l-btn-icon-bottom .l-btn-text {
  margin-bottom: 50px;
}
.m-btn-downarrow,
.s-btn-downarrow {
  background: url('images/menu_arrows.png') no-repeat 0 center;
}
.m-btn-plain-active,
.s-btn-plain-active {
  border-color: #b7d2ff;
  background-color: #eaf2ff;
  color: #000000;
}
.s-btn:hover .m-btn-line,
.s-btn-active .m-btn-line,
.s-btn-plain-active .m-btn-line {
  display: inline-block;
}
.l-btn:hover .s-btn-downarrow,
.s-btn-active .s-btn-downarrow,
.s-btn-plain-active .s-btn-downarrow {
  border-style: solid;
  border-color: #aac5e7;
  border-width: 0 0 0 1px;
}
.messager-body {
  padding: 10px 10px 30px 10px;
  overflow: auto;
}
.messager-button {
  text-align: center;
  padding: 5px;
}
.messager-button .l-btn {
  width: 70px;
}
.messager-icon {
  float: left;
  width: 32px;
  height: 32px;
  margin: 0 10px 10px 0;
}
.messager-error {
  background: url('images/messager_icons.png') no-repeat scroll -64px 0;
}
.messager-info {
  background: url('images/messager_icons.png') no-repeat scroll 0 0;
}
.messager-question {
  background: url('images/messager_icons.png') no-repeat scroll -32px 0;
}
.messager-warning {
  background: url('images/messager_icons.png') no-repeat scroll -96px 0;
}
.messager-progress {
  padding: 10px;
}
.messager-p-msg {
  margin-bottom: 5px;
}
.messager-body .messager-input {
  width: 100%;
  padding: 4px 0;
  outline-style: none;
  border: 1px solid #95B8E7;
}
.window-thinborder .messager-button {
  padding-bottom: 8px;
}
.tree {
  margin: 0;
  padding: 0;
  list-style-type: none;
}
.tree li {
  white-space: nowrap;
}
.tree li ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
.tree-node {
  height: 18px;
  white-space: nowrap;
  cursor: pointer;
}
.tree-hit {
  cursor: pointer;
}
.tree-expanded,
.tree-collapsed,
.tree-folder,
.tree-file,
.tree-checkbox,
.tree-indent {
  display: inline-block;
  width: 16px;
  height: 18px;
  vertical-align: top;
  overflow: hidden;
}
.tree-expanded {
  background: url('images/tree_icons.png') no-repeat -18px 0px;
}
.tree-expanded-hover {
  background: url('images/tree_icons.png') no-repeat -50px 0px;
}
.tree-collapsed {
  background: url('images/tree_icons.png') no-repeat 0px 0px;
}
.tree-collapsed-hover {
  background: url('images/tree_icons.png') no-repeat -32px 0px;
}
.tree-lines .tree-expanded,
.tree-lines .tree-root-first .tree-expanded {
  background: url('images/tree_icons.png') no-repeat -144px 0;
}
.tree-lines .tree-collapsed,
.tree-lines .tree-root-first .tree-collapsed {
  background: url('images/tree_icons.png') no-repeat -128px 0;
}
.tree-lines .tree-node-last .tree-expanded,
.tree-lines .tree-root-one .tree-expanded {
  background: url('images/tree_icons.png') no-repeat -80px 0;
}
.tree-lines .tree-node-last .tree-collapsed,
.tree-lines .tree-root-one .tree-collapsed {
  background: url('images/tree_icons.png') no-repeat -64px 0;
}
.tree-line {
  background: url('images/tree_icons.png') no-repeat -176px 0;
}
.tree-join {
  background: url('images/tree_icons.png') no-repeat -192px 0;
}
.tree-joinbottom {
  background: url('images/tree_icons.png') no-repeat -160px 0;
}
.tree-folder {
  background: url('images/tree_icons.png') no-repeat -208px 0;
}
.tree-folder-open {
  background: url('images/tree_icons.png') no-repeat -224px 0;
}
.tree-file {
  background: url('images/tree_icons.png') no-repeat -240px 0;
}
.tree-loading {
  background: url('images/loading.gif') no-repeat center center;
}
.tree-checkbox0 {
  background: url('images/tree_icons.png') no-repeat -208px -18px;
}
.tree-checkbox1 {
  background: url('images/tree_icons.png') no-repeat -224px -18px;
}
.tree-checkbox2 {
  background: url('images/tree_icons.png') no-repeat -240px -18px;
}
.tree-title {
  font-size: 12px;
  display: inline-block;
  text-decoration: none;
  vertical-align: top;
  white-space: nowrap;
  padding: 0 2px;
  height: 18px;
  line-height: 18px;
}
.tree-node-proxy {
  font-size: 12px;
  line-height: 20px;
  padding: 0 2px 0 20px;
  border-width: 1px;
  border-style: solid;
  z-index: 9900000;
}
.tree-dnd-icon {
  display: inline-block;
  position: absolute;
  width: 16px;
  height: 18px;
  left: 2px;
  top: 50%;
  margin-top: -9px;
}
.tree-dnd-yes {
  background: url('images/tree_icons.png') no-repeat -256px 0;
}
.tree-dnd-no {
  background: url('images/tree_icons.png') no-repeat -256px -18px;
}
.tree-node-top {
  border-top: 1px dotted red;
}
.tree-node-bottom {
  border-bottom: 1px dotted red;
}
.tree-node-append .tree-title {
  border: 1px dotted red;
}
.tree-editor {
  border: 1px solid #95B8E7;
  font-size: 12px;
  line-height: 16px;
  padding: 0 4px;
  margin: 0;
  width: 80px;
  outline-style: none;
  vertical-align: top;
  position: absolute;
  top: 0;
}
.tree-node-proxy {
  background-color: #ffffff;
  color: #000000;
  border-color: #95B8E7;
}
.tree-node-hover {
  background: #eaf2ff;
  color: #000000;
}
.tree-node-selected {
  background: #ffe48d;
  color: #000000;
}
.tree-node-hidden {
  display: none;
}
.validatebox-invalid {
  border-color: #ffa8a8;
  background-color: #fff3f3;
  color: #000;
}
.tooltip {
  position: absolute;
  display: none;
  z-index: 9900000;
  outline: none;
  opacity: 1;
  filter: alpha(opacity=100);
  padding: 5px;
  border-width: 1px;
  border-style: solid;
  border-radius: 5px;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.tooltip-content {
  font-size: 12px;
}
.tooltip-arrow-outer,
.tooltip-arrow {
  position: absolute;
  width: 0;
  height: 0;
  line-height: 0;
  font-size: 0;
  border-style: solid;
  border-width: 6px;
  border-color: transparent;
  _border-color: tomato;
  _filter: chroma(color=tomato);
}
.tooltip-arrow {
  display: none \9;
}
.tooltip-right .tooltip-arrow-outer {
  left: 0;
  top: 50%;
  margin: -6px 0 0 -13px;
}
.tooltip-right .tooltip-arrow {
  left: 0;
  top: 50%;
  margin: -6px 0 0 -12px;
}
.tooltip-left .tooltip-arrow-outer {
  right: 0;
  top: 50%;
  margin: -6px -13px 0 0;
}
.tooltip-left .tooltip-arrow {
  right: 0;
  top: 50%;
  margin: -6px -12px 0 0;
}
.tooltip-top .tooltip-arrow-outer {
  bottom: 0;
  left: 50%;
  margin: 0 0 -13px -6px;
}
.tooltip-top .tooltip-arrow {
  bottom: 0;
  left: 50%;
  margin: 0 0 -12px -6px;
}
.tooltip-bottom .tooltip-arrow-outer {
  top: 0;
  left: 50%;
  margin: -13px 0 0 -6px;
}
.tooltip-bottom .tooltip-arrow {
  top: 0;
  left: 50%;
  margin: -12px 0 0 -6px;
}
.tooltip {
  background-color: #ffffff;
  border-color: #95B8E7;
  color: #000000;
}
.tooltip-right .tooltip-arrow-outer {
  border-right-color: #95B8E7;
}
.tooltip-right .tooltip-arrow {
  border-right-color: #ffffff;
}
.tooltip-left .tooltip-arrow-outer {
  border-left-color: #95B8E7;
}
.tooltip-left .tooltip-arrow {
  border-left-color: #ffffff;
}
.tooltip-top .tooltip-arrow-outer {
  border-top-color: #95B8E7;
}
.tooltip-top .tooltip-arrow {
  border-top-color: #ffffff;
}
.tooltip-bottom .tooltip-arrow-outer {
  border-bottom-color: #95B8E7;
}
.tooltip-bottom .tooltip-arrow {
  border-bottom-color: #ffffff;
}
.switchbutton {
  text-decoration: none;
  display: inline-block;
  overflow: hidden;
  vertical-align: middle;
  margin: 0;
  padding: 0;
  cursor: pointer;
  background: #bbb;
  border: 1px solid #bbb;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.switchbutton-inner {
  display: inline-block;
  overflow: hidden;
  position: relative;
  top: -1px;
  left: -1px;
}
.switchbutton-on,
.switchbutton-off,
.switchbutton-handle {
  display: inline-block;
  text-align: center;
  height: 100%;
  float: left;
  font-size: 12px;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}
.switchbutton-on {
  background: #ffe48d;
  color: #000000;
}
.switchbutton-off {
  background-color: #ffffff;
  color: #000000;
}
.switchbutton-on,
.switchbutton-reversed .switchbutton-off {
  -moz-border-radius: 5px 0 0 5px;
  -webkit-border-radius: 5px 0 0 5px;
  border-radius: 5px 0 0 5px;
}
.switchbutton-off,
.switchbutton-reversed .switchbutton-on {
  -moz-border-radius: 0 5px 5px 0;
  -webkit-border-radius: 0 5px 5px 0;
  border-radius: 0 5px 5px 0;
}
.switchbutton-handle {
  position: absolute;
  top: 0;
  left: 50%;
  background-color: #ffffff;
  color: #000000;
  border: 1px solid #bbb;
  -moz-box-shadow: 0 0 3px 0 #bbb;
  -webkit-box-shadow: 0 0 3px 0 #bbb;
  box-shadow: 0 0 3px 0 #bbb;
}
.switchbutton-value {
  position: absolute;
  top: 0;
  left: -5000px;
}
.switchbutton-disabled {
  opacity: 0.5;
  filter: alpha(opacity=50);
}
.switchbutton-disabled,
.switchbutton-readonly {
  cursor: default;
}
</style>
		<body>
			<?php include(APPPATH . 'views/common/navigation.php'); ?>
				<div class="container-fluid" id="content">
				<?php include(APPPATH . 'views/common/left.php'); ?>
				<div id="main">
				<div class="container-fluid">
				<?php include(APPPATH . 'views/common/pageheader.php'); ?>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="<?php echo site_url('home')?>">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="<?php echo base_url() ?>index.php/cashforwork/add">cashforwork</a>
						</li>
					</ul>
				<div class="close-bread">
					<a href="#">
						<i class="fa fa-times"></i>
					</a>
				</div>
				</div>
				<div class="row">
				<div class="col-sm-12">
				<div class="box box-bordered">
				<div class="box-title">
					<h3>
						<i class="fa fa-th-list"></i>Cash for Work Payment
					</h3>
				</div>
				<div class="box-content nopadding">
					<?php if(validation_errors()){?>
						<p><div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Note!</strong><?php echo validation_errors(); ?>
							</div>
						</p>
					<?php } ?>
					<?php $attributes = array('name' => 'frm', 'id'=>'frm','enctype' => 'multipart/form-data', 'class'=>'form-horizontal form-striped form-validate');?>
					<?php echo form_open('',$attributes); ?>
			<div class="form-group">
				  <span class="help-block">
                                                                                <code>Double click the row to begin editing.</code>
                                                                            </span>
			</div>

			

				
				<?php echo form_close(); ?>
                <table id="dg" title="Beneficiary List Form" style="width:100%;height:400px"
			toolbar="#toolbar" pagination="true" idField="id" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
             <th field="project_no"  , data-options="align: 'center', 
				editor:{
					type:'combobox',
					options:{
						valueField:'Project',
						textField:'Project',
						panelHeight:'auto',
						data:<?php echo $prjcts; ?>,
                        required:true
					}
				}
				" >Project</th>
                <th field="activity"  , data-options="align: 'center', 
				editor:{
					type:'combobox',
					options:{
						valueField:'Activity',
						textField:'Activity',
						panelHeight:'auto',
						data:<?php echo $activities; ?>,
                        required:true
					}
				}
				" >Activity</th>
          
            <th field="payment_date"  editor="{type:'datebox',options:{required:true}}">Date</th>
            <th field="funded_by" width="50" , data-options="align: 'center', 
				editor:{
					type:'combobox',
					options:{
						valueField:'DonorName',
						textField:'DonorName',
						panelHeight:'auto',
						data: <?php echo $dnrs; ?>,
                        required:true
					}
				}
				" >Funded By</th>
                  <th field="district" width="50" , data-options="align: 'center', 
				editor:{
					type:'combobox',
					options:{
						valueField:'County',
						textField:'County',
						panelHeight:'auto',
						data:<?php echo $dist; ?>,
                        required:true
					}
				}
				" >District</th>
            
				<th field="sn" width="50" editor="{type:'validatebox',options:{required:true}}">S/N.</th>
				<th field="location" width="50" editor="{type:'validatebox',options:{required:true}}">Location</th>
                <th field="beneficiary_name" width="50" , data-options="align: 'center', 
				editor:{
					type:'combobox',
					options:{
						valueField:'Beneficiary',
						textField:'Beneficiary',
						panelHeight:'auto',
						data: <?php echo $ben; ?>,
                        required:true
					}
				}
				" >Beneficiary Name</th>
               
				<th field="mothers_name" width="50" editor="{type:'validatebox',options:{required:true}}">Mother's Name</th>
				<th field="next_of_keen" width="50" editor="{type:'validatebox',options:{required:true}}">Next of Kin</th>
                                 
                <th field="mobile_cash_transfer" width="50" editor="{type:'validatebox',options:{required:true}}">Mobile Cash Transfer</th>
                <th field="amount" width="50" editor="{type:'validatebox',options:{required:true}}">Amount</th>
               
			</tr>
		</thead>
	</table>
    
    <div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="javascript:$('#dg').edatagrid('addRow')">New</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="javascript:$('#dg').edatagrid('destroyRow')">Destroy</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onClick="javascript:$('#dg').edatagrid('saveRow')">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onClick="javascript:$('#dg').edatagrid('cancelRow')">Cancel</a>
       
	</div>
    
    
 			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

</body>
</html>
