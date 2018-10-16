git clone git@github.com:skopz356/skola.git
cd skola 
mv test testftp
mv testftp/ ..
cd ..
rm -rf skola
cd testftp

*
*
*


ftp -n $HOST <<END_SCRIPT
quote USER $USER
quote PASS $PASSWD
binary
cd ahoj
rm *
prompt
mput *
quit
END_SCRIPT
cd ..
rm -rf testftp 


