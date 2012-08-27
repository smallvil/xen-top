xen-top
=======

Want to graph some variables from XenTop in a Dom0 ?
very useful in cloud/Virtual times...

based on http://goo.gl/fmHRe
but using nagios / nrpe / pnp4nagios

@ the dom0
add a new line in /etc/nagios/nrpe.cfg of create the file in your config folder
[root@dom0 ~]# cat /etc/nagios/nrpe.d/check_xentop.cfg 
command[check_xentop]=/usr/local/bin/check_xentop.sh

@Nagios
add a service in nagios
[root@nagios-01 ~]# less /etc/nagios/objects/service.cfg
define service {
        use                             local-service
        hostgroup                       dom0
        service_description             XEN-stats
        check_command                   check_nrpe!check_xentop!1
        normal_check_interval           5
}
optional create a template to see all services in one graph.
ls /usr/share/nagios/html/pnp4nagios/templates/check_xentop.php


Owen
