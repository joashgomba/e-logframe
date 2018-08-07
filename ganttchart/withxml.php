<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<?php
  $cache = '';
  if(isset($_GET['eraseCache'])){
    echo '<meta http-equiv="Cache-control" content="no-cache">';
    echo '<meta http-equiv="Expires" content="-1">';
    $cache = '?'.time();
  }
?>
<link rel="stylesheet" type="text/css" href="jsgantt.css"/>
<script language="javascript" src="jsgantt.js<?php echo $cache ?>"></script>
<script language="javascript" src="graphics.js<?php echo $cache ?>"></script>

<style type="text/css">
<!--
.style1 {color: #0000FF}

.roundedCorner{display:block}
.roundedCorner *{
  display:block;
  height:1px;
  overflow:hidden;
  font-size:.01em;
  background:#0061ce}
.roundedCorner1{
  margin-left:3px;
  margin-right:3px;
  padding-left:1px;
  padding-right:1px;
  border-left:1px solid #91bbe9;
  border-right:1px solid #91bbe9;
  background:#3f88da}
.roundedCorner2{
  margin-left:1px;
  margin-right:1px;
  padding-right:1px;
  padding-left:1px;
  border-left:1px solid #e5effa;
  border-right:1px solid #e5effa;
  background:#307fd7}
.roundedCorner3{
  margin-left:1px;
  margin-right:1px;
  border-left:1px solid #307fd7;
  border-right:1px solid #307fd7;}
.roundedCorner4{
  border-left:1px solid #91bbe9;
  border-right:1px solid #91bbe9}
.roundedCorner5{
  border-left:1px solid #3f88da;
  border-right:1px solid #3f88da}
.roundedCornerfg{
  background:#0061ce;}


-->
</style>
<title>FREE javascript gantt - JSGantt HTML and CSS only</title></head>
<body>

    <!-- content goes here -->
  <TABLE width="100%" cellpadding="0" cellspacing="0" style="position:absolute; top:0; left:0;"> 
  <TBODY><TR>
  
    <TD bgcolor="#298eff" style="height:3px;"></TD></TR>

 
  <TR>
    <TD bgcolor="#0061ce" style="padding-top:5px; padding-bottom:5px;"><FONT face="Arial,Helvetica" size="5" color="#FFFFFF"><I><STRONG>&nbsp;&nbsp;jsGantt - 1.2</STRONG></I></FONT></TD>

  </TR>
   <TR><TD bgcolor="#CFCFCF" style="height:3px;"></TD></TR>

<TR>
    <TD bgcolor="#ffffff" style="color:#444444;  text-decoration:none;"><FONT face="Arial,Helvetica" size="3" color="#FFFFFF"><I><STRONG>&nbsp;&nbsp;<a href="#tBugs">Bugs/Issues</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#tDownload">Download</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#tLicense">License</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#tUsage">Usage</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#tExamples">Examples</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#tCredits">Credits</a> </STRONG></I></FONT></TD>

  </TR>
  <TR><TD bgcolor="#FFFFFF" style="height:2px;"></TD></TR>

   <TR><TD bgcolor="#CFCFCF" style="height:1px;"></TD></TR>

  </TBODY>

</TABLE>
<BR><BR>
<BR>
<BR>


<FONT face="Arial,Helvetica" size="3">&nbsp;&nbsp;100% Free Javascript / CSS/ HTML Gantt chart control. Completely buzzword compliant including AJAX !</FONT><BR><BR>


<div style="position:relative" class="gantt" id="GanttChartDIV"></div>
<script>


  // here's all the html code neccessary to display the chart object

  // Future idea would be to allow XML file name to be passed in and chart tasks built from file.

  var g = new JSGantt.GanttChart('g',document.getElementById('GanttChartDIV'), 'day');
	g.setShowRes(1); // Show/Hide Responsible (0/1)
	g.setShowDur(1); // Show/Hide Duration (0/1)
	g.setShowComp(1); // Show/Hide % Complete(0/1)
   g.setCaptionType('Resource');  // Set to Show Caption (None,Caption,Resource,Duration,Complete)
 //var gr = new Graphics();
  if( g ) {
    // Parameters             (pID, pName,                  pStart,      pEnd,        pColor,   pLink,          pMile, pRes,  pComp, pGroup, pParent, pOpen, pDepend, pCaption)
	JSGantt.parseXML('file_activityBari1.xml',g)

  

    g.Draw();	
    g.DrawDependencies();

  }

  else

  {

    alert("not defined");

  }

</script>
<BR>
<FONT face="Arial,Helvetica" size="3">
<strong>Basic Features</strong><BR>
<ul>
<li>Tasks & Collapsible Task Groups</li>
<li>Multiple Dependencies</li>
<li>Task Completion</li>
<li>Task Color</li>
<li>Milestones</li>
<li>Resources</li>
<li>No images needed</li>
</ul>

<strong>Advanced Features</strong><BR>
</FONT><ul>
<li><font size="3" face="Arial,Helvetica">Dynamic Loading of Tasks</font></li>
<li><font size="3" face="Arial,Helvetica">Dynamic change of format </font>
  <ul>
    <li>Day</li>
    <li>Week</li>
    <li>Month</li>
    <li>Quarter</li>
    <li>Hour</li>
    <li>Minute</li>
  </ul>
</li>
<li><font size="3" face="Arial,Helvetica">Load Gantt from XML file</font></li>
</ul>
<FONT face="Arial,Helvetica" size="3"><BR>
</FONT>
<div style="width:400px;">
  <b class="roundedCorner">
  <b class="roundedCorner1"><b></b></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner5"></b></b>

  <div class="roundedCornerfg">
  <a name="tBugs" />
<table width="50%" >
  <tr><td>
<font face="Arial,Helvetica" size="3" color="#FFFFFF"><i><b>&nbsp;&nbsp;BUGS/ISSUES</b></i></font>
</td></tr></table>
</div>

  <b class="roundedCorner">
  <b class="roundedCorner5"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner1"><b></b></b></b>
</div>
<br>
Current Issues:
<ol>
<li>Currently only one gantt chart is allowed per page. </li>

</ol><br>
New in 1.2:
<ul>
<li>Support for half-days</li>
<li>Hour/Minute format</li>
</ul>
<BR>
<div style="width:400px;">
  <b class="roundedCorner">
  <b class="roundedCorner1"><b></b></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner5"></b></b>

  <div class="roundedCornerfg"> <a name="tDownload" />
  <table width="50%"><tr><td>
<font face="Arial,Helvetica" size="3" color="#FFFFFF"><i><b>&nbsp;&nbsp;DOWNLOAD</b></i></font>
</td></tr></table></div>

  <b class="roundedCorner">
  <b class="roundedCorner5"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner1"><b></b></b></b>
</div>
<a href="http://www.jsgantt.com/zip/">Click here to download the jsgantt</a> <br>
You can download the latest bleeding edge version, request features and report issues at <a href="http://code.google.com/p/jsgantt/">http://code.google.com/p/jsgantt/</a>
<br><br>
<div style="width:400px;">
  <b class="roundedCorner">
  <b class="roundedCorner1"><b></b></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner5"></b></b>

  <div class="roundedCornerfg"><a name="tLicense" />
  <table width="50%"><tr><td>
<font face="Arial,Helvetica" size="3" color="#FFFFFF"><i><b>&nbsp;&nbsp;LICENSE</b></i></font>
</td></tr></table></div>

  <b class="roundedCorner">
  <b class="roundedCorner5"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner1"><b></b></b></b>
</div>
JSGantt is released under BSD license. If you require another license please contact <a href="mailto:shlomygantz@hotmail.com">shlomygantz@hotmail.com</a><br>
If you plan to use it in a commercial product please consider donating the first sale to charity.
<br><br>
<textarea cols="80" rows="5">
* Copyright (c) 2008, Shlomy Gantz/BlueBrick Inc.
* All rights reserved.
*
* Redistribution and use in source and binary forms, with or without
* modification, are permitted provided that the following conditions are met:
*     * Redistributions of source code must retain the above copyright
*       notice, this list of conditions and the following disclaimer.
*     * Redistributions in binary form must reproduce the above copyright
*       notice, this list of conditions and the following disclaimer in the
*       documentation and/or other materials provided with the distribution.
*     * Neither the name of Shlomy Gantz or BlueBrick Inc. nor the
*       names of its contributors may be used to endorse or promote products
*       derived from this software without specific prior written permission.
*
* THIS SOFTWARE IS PROVIDED BY SHLOMY GANTZ/BLUEBRICK INC. ''AS IS'' AND ANY
* EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
* WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
* DISCLAIMED. IN NO EVENT SHALL SHLOMY GANTZ/BLUEBRICK INC. BE LIABLE FOR ANY
* DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
* (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
* LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
* ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
* (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
* SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
</textarea><br><br>
<div style="width:400px;">
  <b class="roundedCorner">
  <b class="roundedCorner1"><b></b></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner5"></b></b>

  <div class="roundedCornerfg"><a name="tUsage" />
  <table width="50%"><tr>
  <td>
<font face="Arial,Helvetica" size="3" color="#FFFFFF"><i><b>&nbsp;&nbsp;USAGE</b></i></font>
</td>
</tr></table></div>

  <b class="roundedCorner">
  <b class="roundedCorner5"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner1"><b></b></b></b>
</div>
<p>1. Include JSGantt CSS and Javascript</p>
<pre class="style1">
&lt;link rel="stylesheet" type="text/css" href="jsgantt.css" /&gt;
&lt;script language="javascript" src="jsgantt.js"&gt;&lt;/script&gt;
</pre>

<p>2. Create a div element to hold the gantt chart</p>
<pre class="style1">&lt;div style="position:relative" class="gantt" id="GanttChartDIV"&gt;&lt;/div&gt;</pre>
<p>3. Start a &lt;script&gt; block</p>
<pre class="style1">&lt;script language="javascript"&gt;</pre>
<p>4. Instantiate JSGantt using GanttChart()</p>
<pre class="style1">var g = new JSGantt.GanttChart('g',document.getElementById('GanttChartDIV'), 'day');

    </pre>

<p>GanttChart(<em>pGanttVar, pDiv, pFormat</em>)<br>
  <em>pGanttVar</em>: (required) name of the variable assigned<br>
  <em>pDiv</em>: (required) this is a DIV object created in HTML<br>
  <em>pFormat</em>: (required) - used to indicate whether chart should be drawn in "day", "week", "month", or "quarter" format</p>
<p>Customize the look and feel using the following setters<br><br>
<pre class="style1">g.setShowRes(1); // Show/Hide Responsible (0/1)
g.setShowDur(1); // Show/Hide Duration (0/1)
g.setShowComp(1); // Show/Hide % Complete(0/1)
g.setCaptionType('Resource');  // Set to Show Caption (None,Caption,Resource,Duration,Complete)
g.setShowStartDate(1); // Show/Hide Start Date(0/1)
g.setShowEndDate(1); // Show/Hide End Date(0/1)
g.setDateInputFormat('mm/dd/yyyy')  // Set format of input dates ('mm/dd/yyyy', 'dd/mm/yyyy', 'yyyy-mm-dd')
g.setDateDisplayFormat('mm/dd/yyyy') // Set format to display dates ('mm/dd/yyyy', 'dd/mm/yyyy', 'yyyy-mm-dd')
g.setFormatArr("day","week","month","quarter") // Set format options (up to 4 : "minute","hour","day","week","month","quarter")
</pre>

      </p>
<p>5. Add Tasks using AddTaskItem()</p>
<pre class="style1"> 
g.AddTaskItem(new JSGantt.TaskItem(1,   'Define Chart API',     '',          '',          'ff0000', 'http://help.com', 0, 'Brian',     0, 1, 0, 1));
g.AddTaskItem(new JSGantt.TaskItem(11,  'Chart Object',         '2/10/2008', '2/10/2008', 'ff00ff', 'http://www.yahoo.com', 1, 'Shlomy',  100, 0, 1, 1, "121,122", "My Caption"));
</pre>

TaskItem(<em>pID, pName, pStart, pEnd, pColor, pLink, pMile, pRes, pComp, pGroup, pParent, pOpen, pDepend</em>)<br>
<em>pID</em>: (required) is a unique ID used to identify each row for parent functions and for setting dom id for hiding/showing<br>
<em>pName</em>: (required) is the task Label<br>
<em>pStart</em>: (required) the task start date, can enter empty date ('') for groups. You can also enter specific time (2/10/2008 12:00) for additional percision or half days.<br>
<em>pEnd</em>: (required) the task end date, can enter empty date ('') for groups<br>
<em>pColor</em>: (required) the html color for this task; e.g. '00ff00'<br>
<em>pLink</em>: (optional) any http link navigated to when task bar is clicked.<br>
<em>pMile</em>:(optional)   represent a milestone<br>
<em>pRes</em>: (optional) resource name<br>
<em>pComp</em>: (required) completion percent<br>
<em>pGroup</em>: (optional) indicates whether this is a group(parent) - 0=NOT Parent; 1=IS Parent<br>
<em>pParent</em>: (required) identifies a parent pID, this causes this task to be a child of identified task<br>
<em>pOpen</em>: can be initially set to close folder when chart is first drawn<br>
<em>pDepend</em>: optional list of id's this task is dependent on ... line drawn from dependent to this item<br>
<em>pCaption</em>: optional caption that will be added after task bar if CaptionType set to "Caption"<br>

*You should be able to add items to the chart in realtime via javascript and issuing "g.Draw()" command.

<p>5a. Another way to add tasks is to use an external XML file with parseXML()</p>
<pre class="style1"> 
JSGantt.parseXML("project.xml",g);
</pre>
The structure of the XML file:<br>
<textarea name="textarea" cols="150" rows="10">
<project>
<task>
	<pid>10</pid>
	<pname>WCF Changes</pname>
	<pstart></pstart>
	<pend></pend>
	<pcolor>0000ff</pcolor>
	<plink></plink>
	<pmile>0</pmile>
	<pres></pres>
	<pcomp>0</pcomp>
	<pgroup>1</pgroup>
	<pparent>0</pparent>
	<popen>1</popen>
	<pdepend />
</task>
<task>
	<pid>20</pid>
	<pname>Move to WCF from remoting</pname>
	<pstart>8/11/2008</pstart>
	<pend>8/15/2008</pend>
	<pcolor>0000ff</pcolor>
	<plink></plink>
	<pmile>0</pmile>
	<pres>Rich</pres>
	<pcomp>10</pcomp>
	<pgroup>0</pgroup>
	<pparent>10</pparent>
	<popen>1</popen>
	<pdepend></pdepend>
</task>
<task>
	<pid>30</pid>
	<pname>add Auditing</pname>
	<pstart>8/19/2008</pstart>
	<pend>8/21/2008</pend>
	<pcolor>0000ff</pcolor>
	<plink></plink>
	<pmile>0</pmile>
	<pres>Mal</pres>
	<pcomp>50</pcomp>
	<pgroup>0</pgroup>
	<pparent>10</pparent>
	<popen>1</popen>
	<pdepend>20</pdepend>
</task>
</project>
</textarea>

<p>6. Call Draw() and DrawDependencies()</p>
<pre class="style1"> 

g.Draw();	
g.DrawDependencies();

</pre>

<br>
<p>7. Close the &lt;script&gt; block</p>
<pre class="style1">&lt;/script&gt;</pre>

<br><br>
Final code should look like
<textarea name="textarea2" cols="150" rows="20">
&lt;link rel="stylesheet" type="text/css" href="jsgantt.css" /&gt;
&lt;script language="javascript" src="jsgantt.js"&gt;&lt;/script&gt;
&lt;div style="position:relative" class="gantt" id="GanttChartDIV"&gt;&lt;/div&gt;
&lt;script&gt;

  var g = new JSGantt.GanttChart('g',document.getElementById('GanttChartDIV'), 'day');
  g.setShowRes(1); // Show/Hide Responsible (0/1)
  g.setShowDur(1); // Show/Hide Duration (0/1)
  g.setShowComp(1); // Show/Hide % Complete(0/1)
  g.setCaptionType('Resource');  // Set to Show Caption

  if( g ) {

    g.AddTaskItem(new JSGantt.TaskItem(1,   'Define Chart API',     '',          '',          'ff0000', 'http://help.com', 0, 'Brian',     0, 1, 0, 1));
    g.AddTaskItem(new JSGantt.TaskItem(11,  'Chart Object',         '2/20/2008', '2/20/2008', 'ff00ff', 'http://www.yahoo.com', 1, 'Shlomy',  100, 0, 1, 1));
    g.AddTaskItem(new JSGantt.TaskItem(12,  'Task Objects',         '',          '',          '00ff00', '', 0, 'Shlomy',   40, 1, 1, 1));
    g.AddTaskItem(new JSGantt.TaskItem(121, 'Constructor Proc',     '2/21/2008', '3/9/2008',  '00ffff', 'http://www.yahoo.com', 0, 'Brian T.', 60, 0, 12, 1));
    g.AddTaskItem(new JSGantt.TaskItem(122, 'Task Variables',       '3/6/2008',  '3/11/2008', 'ff0000', 'http://help.com', 0, '',         60, 0, 12, 1,121));
    g.AddTaskItem(new JSGantt.TaskItem(123, 'Task Functions',       '3/9/2008',  '3/29/2008', 'ff0000', 'http://help.com', 0, 'Anyone',   60, 0, 12, 1, 0, 'This is another caption'));
    g.AddTaskItem(new JSGantt.TaskItem(2,   'Create HTML Shell',    '3/24/2008', '3/25/2008', 'ffff00', 'http://help.com', 0, 'Brian',    20, 0, 0, 1,122));
    g.AddTaskItem(new JSGantt.TaskItem(3,   'Code Javascript',      '',          '',          'ff0000', 'http://help.com', 0, 'Brian',     0, 1, 0, 1 ));
    g.AddTaskItem(new JSGantt.TaskItem(31,  'Define Variables',     '2/25/2008', '3/17/2008', 'ff00ff', 'http://help.com', 0, 'Brian',    30, 0, 3, 1, ,'Caption 1'));
    g.AddTaskItem(new JSGantt.TaskItem(32,  'Calculate Chart Size', '3/15/2008', '3/24/2008', '00ff00', 'http://help.com', 0, 'Shlomy',   40, 0, 3, 1));
    g.AddTaskItem(new JSGantt.TaskItem(33,  'Draw Taks Items',      '',          '',          '00ff00', 'http://help.com', 0, 'Someone',  40, 1, 3, 1));
    g.AddTaskItem(new JSGantt.TaskItem(332, 'Task Label Table',     '3/6/2008',  '3/11/2008', '0000ff', 'http://help.com', 0, 'Brian',    60, 0, 33, 1));
    g.AddTaskItem(new JSGantt.TaskItem(333, 'Task Scrolling Grid',  '3/9/2008',  '3/20/2008', '0000ff', 'http://help.com', 0, 'Brian',    60, 0, 33, 1));
    g.AddTaskItem(new JSGantt.TaskItem(34,  'Draw Task Bars',       '',          '',          '990000', 'http://help.com', 0, 'Anybody',  60, 1, 3, 1));
    g.AddTaskItem(new JSGantt.TaskItem(341, 'Loop each Task',       '3/26/2008', '4/11/2008', 'ff0000', 'http://help.com', 0, 'Brian',    60, 0, 34, 1, "332,333"));
    g.AddTaskItem(new JSGantt.TaskItem(342, 'Calculate Start/Stop', '4/12/2008', '5/18/2008', 'ff6666', 'http://help.com', 0, 'Brian',    60, 0, 34, 1));
    g.AddTaskItem(new JSGantt.TaskItem(343, 'Draw Task Div',        '5/13/2008', '5/17/2008', 'ff0000', 'http://help.com', 0, 'Brian',    60, 0, 34, 1));
    g.AddTaskItem(new JSGantt.TaskItem(344, 'Draw Completion Div',  '5/17/2008', '6/04/2008', 'ff0000', 'http://help.com', 0, 'Brian',    60, 0, 34, 1));
    g.AddTaskItem(new JSGantt.TaskItem(35,  'Make Updates',         '10/17/2008','12/04/2008','f600f6', 'http://help.com', 0, 'Brian',    30, 0, 3,  1));



    g.Draw();	
    g.DrawDependencies();


  }
  else
  {
    alert("not defined");
  }

&lt;/script&gt;
  </textarea>
</p>
<div style="width:400px;">
  <b class="roundedCorner">
  <b class="roundedCorner1"><b></b></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner5"></b></b>

  <div class="roundedCornerfg"><a name="tExamples"/>
  <table width="50%">
  <tr><td><font face="Arial,Helvetica" size="3" color="#FFFFFF"><i><b>&nbsp;&nbsp;ADDITIONAL DEMOS</b></i></font>
</td></tr></table></div>

  <b class="roundedCorner">
  <b class="roundedCorner5"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner1"><b></b></b></b>
</div>

<p>
<ul>
<li><a href="index.htm">jsGantt</a></li>
<li><a href="jsgantt_exExternalXML.html">jsGantt with external XML file</a></li>
<li><a href="jsgantt_Minutes.html">jsGantt by minutes</a></li>
</ul>
</p>



<div style="width:400px;">
  <b class="roundedCorner">
  <b class="roundedCorner1"><b></b></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner5"></b></b>

  <div class="roundedCornerfg"><a name="tCredits"/>
  <table width="50%">
  <tr><td><font face="Arial,Helvetica" size="3" color="#FFFFFF"><i><b>&nbsp;&nbsp;CREDITS</b></i></font>
</td></tr></table></div>

  <b class="roundedCorner">
  <b class="roundedCorner5"></b>
  <b class="roundedCorner4"></b>
  <b class="roundedCorner3"></b>
  <b class="roundedCorner2"><b></b></b>
  <b class="roundedCorner1"><b></b></b></b>
</div>

<p>Developed by Shlomy Gantz and Brian Twidt<br>
Contributed: Paul Labuschagne, Kevin Badgett, Ilan Admon<br>
</p>

</body>

</html>