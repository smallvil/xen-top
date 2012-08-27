<?php
#
# commets to Owenmarinas at gmail dot com
#

$i=1;
$vlabel="";
$lower=0;

$opt[$i] = '--vertical-label "' . $vlabel . '" --title "'.$hostname.' - vmstat: dom0"' . $lower;
$ds_name[$i]="Run-domu,UsedMem,free-mem,cores";

$def=array(1=>"");
$opt=$def;

$def[$i] .= "DEF:Run-domu=$RRDFILE[1]:$DS[1]:AVERAGE " ;
$def[$i] .= "DEF:UsedMem=$RRDFILE[2]:$DS[2]:AVERAGE " ;
$def[$i] .= "DEF:free-mem=$RRDFILE[3]:$DS[3]:AVERAGE " ;
$def[$i] .= "DEF:cores=$RRDFILE[4]:$DS[4]:AVERAGE " ;

$def[$i] .= "LINE2:Run-domu#0066CC:\"Running DomU\" " ;
$def[$i] .= "GPRINT:Run-domu:LAST:\"%6.2lf last\" " ;
$def[$i] .= "GPRINT:Run-domu:AVERAGE:\"%6.2lf avg\" " ;
$def[$i] .= "GPRINT:Run-domu:MAX:\"%6.2lf max\\n\" " ;

$def[$i] .= "LINE2:UsedMem#00FF00:\"Used Memory \" " ;
$def[$i] .= "GPRINT:UsedMem:LAST:\"%6.2lf last\" " ;
$def[$i] .= "GPRINT:UsedMem:AVERAGE:\"%6.2lf avg\" " ;
$def[$i] .= "GPRINT:UsedMem:MAX:\"%6.2lf max\\n\" " ;

$def[$i] .= "LINE2:free-mem#FF0000:\"Free Mem\" " ;
$def[$i] .= "GPRINT:free-mem:LAST:\"%6.2lf last\" " ;
$def[$i] .= "GPRINT:free-mem:AVERAGE:\"%6.2lf avg\" " ;
$def[$i] .= "GPRINT:free-mem:MAX:\"%6.2lf max\\n\" " ;

$def[$i] .= "LINE2:cores#000000:\"Used CPU\" " ;
$def[$i] .= "GPRINT:cores:LAST:\"%6.2lf last\" " ;
$def[$i] .= "GPRINT:cores:AVERAGE:\"%6.2lf avg\" " ;
$def[$i] .= "GPRINT:cores:MAX:\"%6.2lf max\\n\" " ;

?>
