   <?PHP
$page = $_REQUEST['page'];
$action = $_REQUEST['action'];
$id = $_REQUEST['id'];
$limit = 20;
$offset = $page * $limit;
$change_data = $SQL->query('SELECT * FROM z_changelog WHERE hide = 0 ORDER BY id DESC LIMIT '.$limit.' OFFSET '.$offset.'');
$change_data1 = $SQL->query('SELECT * FROM z_changelog WHERE hide = 0');
$change_data2 = $SQL->query('SELECT * FROM z_changelog WHERE hide = 1 ORDER BY id DESC LIMIT '.$limit.' OFFSET '.$offset.'');
$change = 0;
$change1 = 0;
$change2 = 0;
	if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) 
	{
		$description = trim($_POST['description']);
		$where = trim($_POST['where']);
		$type = trim($_POST['type']);
	}
	
	if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) 
	{
        if(empty($description) AND empty($where) AND empty($type)) {
            $main_content .= '<form action="index.php?subtopic=changelog" method="post" ><div class="TableContainer" ><table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" ><div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Add Changelog</div><span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" >
            <tr>
        <td class="LabelV" ><span >Type:</span></td>
        <td style="width:90%;" >
        <SELECT NAME=type>
            <OPTION>Add</OPTION>
            <OPTION>Remove</OPTION>
        </SELECT>
        </td>
        </tr>
                    <tr>
        <td class="LabelV" ><span >Where:</span></td>
        <td style="width:90%;" >
        <SELECT NAME=where>
            <OPTION>Server</OPTION>
            <OPTION>Website</OPTION>
        </SELECT>
        </td>
        </tr>
                            <tr>
        <td class="LabelV" ><span >Description:</span></td>
        <td style="width:90%;" >
        <textarea type="text" name="description" size="50" maxlength="150" rows="5" cols="50"></textarea>
        </td>
        </tr>
            </table>        </div>  </table></div></td></tr><br/><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="index.php?subtopic=changelog" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
        } else {
        if(empty($description)){
                $show_msgs[] = "Description field is empty!.";
            }
            if(!empty($show_msgs)){
                //show errors
                $main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>';
                foreach($show_msgs as $show_msg) {
                    $main_content .= '<li>'.$show_msg;
                }
                $main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br/>';
                //show form
                $main_content .= '<form action="index.php?subtopic=changelog" method="post" ><div class="TableContainer" ><table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" ><div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Add Changelog</div><span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" >
            <tr>
        <td class="LabelV" ><span >Type:</span></td>
        <td style="width:90%;" >
        <SELECT NAME=type>
            <OPTION>Add</OPTION>
            <OPTION>Remove</OPTION>
        </SELECT>
        </td>
        </tr>
                    <tr>
        <td class="LabelV" ><span >Where:</span></td>
        <td style="width:90%;" >
        <SELECT NAME=where>
            <OPTION>Server</OPTION>
            <OPTION>Website</OPTION>
        </SELECT>
        </td>
        </tr>
                            <tr>
        <td class="LabelV" ><span >Description:</span></td>
        <td style="width:90%;" >
        <textarea type="text" name="description" size="50" maxlength="150" rows="10" cols="60"></textarea>
        </td>
        </tr>
            </table>        </div>  </table></div></td></tr><br/><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="index.php?subtopic=changelog" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
            }
            else
            {
                $SQL->query('INSERT INTO `z_changelog` (`id`,`type`, `where`,`date`, `description`) VALUES (NULL, "'.$type.'", "'.$where.'", '.time().', "'.$description.'");');
                $id = $SQL->query('SELECT * FROM z_changelog WHERE `description` = "'.$description.'";')->fetch();
                $main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change log added</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" >
				<table border=0 cellspacing=1 cellpadding=4 width=100%><tr bgcolor="'.$config['site']['vdarkborder'].'"><td width="1%"><b>#</b></td><td width="21"><b>Type</b></td><td width="21"><b>Where</b></td><td width="50"><b>Date</b></td><td><b>Description</b></td></tr>
                
                <tr bgcolor="'.$config['site']['lightborder'].'"><td align="center">'.$id['id'].'</td><td align="center"><img src="images/changelog/'.$type.'.png" title="'.$log['type'].'"/></td><td align="center"><img src="images/changelog/'.$where.'.png" title="'.$log['where'].'"/><td>'.date("j.m.Y",$id['date']).'</td><td>'.$description.'</td></tr>
                ';
                $main_content .= '</td></tr>          </table>        </div>  </table></div></td></tr><br/><center><table border="0" cellspacing="0" cellpadding="0" ><form action="index.php?subtopic=changelog" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
            }
        }
	}
if($action == "hide") 
{
	if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) 
	{
		header("Location: ");
		$date = (int) $_REQUEST['id'];
		$SQL->query('UPDATE z_changelog SET hide = 1 WHERE '.$SQL->fieldName('date').' = '.$date.';');
	}
}
if($action == "unhide") 
{
	if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) 
	{
		header("Location: ");
		$date = (int) $_REQUEST['id'];
		$SQL->query('UPDATE z_changelog SET hide = 0 WHERE '.$SQL->fieldName('date').' = '.$date.';');
	}
}
foreach($change_data1 as $log) 
{
	$change1++;
}
foreach($change_data as $log) 
{
	$change++;
    if(is_int($change / 2))
        $bgcolor = $config['site']['darkborder'];
    else
        $bgcolor = $config['site']['lightborder'];
    $change_rows .= '<tr bgcolor="'.$bgcolor.'"><td align="center" width="1%">'.$log['id'].'</td><td align="center"><img src="images/changelog/'.$log['type'].'.png" title="'.$log['type'].'"/></td><td align="center"><img src="images/changelog/'.$log['where'].'.png" title="'.$log['where'].'"/><td align="center">'.date("j.m.Y",$log['date']).'</td><td>'.$log['description'].'</td>';
	if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) 
	{
		$change_rows .= '<td align="center"><a href="?subtopic=changelog&action=hide&id='.$log['date'].'">Hide</a></td>';
	}
	$change_rows .= '</tr>';
	if ($change < $limit) 
	{
	}
	else
	{
		$show_link_to_next_page = TRUE;
	}
}
if($change == 0) {
    $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR="'.$config['site']['vdarkborder'].'"><TD><center><b>There is no change log at the moment.</TD></TR></TABLE></TD></TR></TABLE><BR>';
} else
{
if ($change1 == 1)
    $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR="'.$config['site']['vdarkborder'].'"><TD><center><b>There is currently '.$change1.' change log.</TD></TR></TABLE></TD></TR></TABLE><BR>';
else
    $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR="'.$config['site']['vdarkborder'].'"><TD><center><b>There are currently '.$change1.' change logs.</TD></TR></TABLE></TD></TR></TABLE><BR>';

    $main_content .= '<table border=0 cellspacing=1 cellpadding=4 width=100%><tr bgcolor="'.$config['site']['vdarkborder'].'"><td width="1%"><b>#</td><td width="21"><b>Type</td><td width="21"><b>Where</td><td width="50"><b>Date</td><td><b>Description</td>';
	if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) 
		$main_content .= '<td width="1%"><b>Options</td>';
	$main_content .= '</tr>'.$change_rows.'</table>';
    if($page > 0) {
$main_content .= '<TR><TD WIDTH=100% ALIGN=right VALIGN=bottom><A HREF="index.php?subtopic=changelog&page='.($page - 1).'" CLASS="size_xxs">Previous Page</A></TD></TR>';
}
if($show_link_to_next_page) {
$main_content .= ' | <TR><TD WIDTH=100% ALIGN=right VALIGN=bottom><A HREF="index.php?subtopic=changelog&page='.($page + 1).'" CLASS="size_xxs">Next Page</A></TD></TR>';
}
}
if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) 
{
	foreach($change_data2 as $log) 
	{
		$change2++;
		if(is_int($change2 / 2))
			$bgcolor = $config['site']['darkborder'];
		else
			$bgcolor = $config['site']['lightborder'];
		$change_unhide .= '<tr bgcolor="'.$bgcolor.'"><td align="center" width="1%">'.$log['id'].'</td><td align="center"><img src="images/changelog/'.$log['type'].'.png" title="'.$log['type'].'"/></td><td align="center"><img src="images/changelog/'.$log['where'].'.png" title="'.$log['where'].'"/><td align="center">'.date("j.m.Y",$log['date']).'</td><td>'.$log['description'].'</td>';
		if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) 
		{
			$change_unhide .= '<td align="center"><a href="?subtopic=changelog&action=unhide&id='.$log['date'].'">UnHide</a></td>';
		}
		$change_unhide .= '</tr>';
	}
	$main_content .= '<br><table border=0 cellspacing=1 cellpadding=4 width=100%><tr bgcolor="'.$config['site']['vdarkborder'].'"><td width="1%"><b>#</td><td width="21"><b>Type</td><td width="21"><b>Where</td><td width="50"><b>Date</td><td><b>Description</td>';
	if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) 
		$main_content .= '<td width="1%"><b>Options</td>';
	$main_content .= '</tr>'.$change_unhide.'</table>';
}
?> 