#!/bin/bash
#
# Comment to owenmarinas at gmail dot com
#

#running Domains U
RDU=$(/usr/bin/sudo /usr/sbin/xentop -i 1 -b |sed 1,5d|wc -l| sed -e 's/[^0-9]//g')

#free Mem available
free_memory=$(sudo /usr/sbin/xentop -i 1 -b| grep "Mem:"|sed 's/[ ][ ]*/;/g'|cut -d';' -f6 |sed 's/k//g')
FreeMemGB=`echo "($free_memory / 1048576)" | bc`

#Used mem DomU+ Dom0
used_mem=$(sudo /usr/sbin/xentop -i 1 -b| grep "Mem:"|sed 's/[ ][ ]*/;/g'|cut -d';' -f4 |sed 's/k//g')
used_memGB=`echo "($used_mem / 1048576)" | bc`


cores=$(core=`sudo /usr/sbin/xentop -i 1 -b| grep "CPUs:"|sed 's/[ ][ ]*/;/g'|cut -d';' -f9`;line=`sudo /usr/sbin/xentop -i 1 -b|grep "domains:"|awk '{print $1}'`;total=0;for cpu in `sudo /usr/sbin/xentop -i 2 -b -d 1|sed 1,8d|sed 1,${line}d|sed 's/^......//'|sed 's/[ ][ ]*/;/g'|cut -d';' -f4`; do total=`echo $total + $cpu|bc`;done;echo `echo $total / $core|bc`)

echo "OK - $RDU | RunDomU=$RDU UsedMemGB=$used_memGB free_mem=$FreeMemGB core=$cores"
exit 0


