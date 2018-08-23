#!/bin/bash
echo "--=== Incoming Paramters (This script hould be reusable) ===--"
echo "[P1] Version Number is :$1 "
echo "[P2] Target Server is :$2 "
echo "[P3] Target Folder is :$3 "
echo "[P4] Target Service is :$4 "


echo "-------------------------------------------"

echo "----==== Identify the taret server =====---"
ssh -p 22 $2 "/home/ubuntu/role.sh"
ssh -p 22 $2 "whoami"
echo "-------------------------------------------"

echo "---=== Make the Folder ===---"
ssh -p 22 $2 "mkdir $3"
echo "-------------------------------------------"

echo "--=== Modify Version Information ===--"
echo "Version $1" > ./serve/version.html
ls  -l
echo "-------------------------------------------"

echo "--=== Transfer files to remote Server ===--"
echo "rsync -avzhe ssh  --rsync-path="""rsync""" ./serve/* jenkins@$2:$3"""
rsync -avzhe ssh  --rsync-path="rsync" ./serve/.htaccess ./serve/* jenkins@$2:$3

# Dont send credentials.
echo "----====== Verify Deployments-List from Remote ======----"
ssh -p 22 $2 "ls -al $3"
echo "---------------------------------------------------------"

echo "--=== Version Deployed is [$1] The folowing output from version.info ===--"
ssh -p 22 $2 "cat $3/version.info"
echo "http://aencoin.com/api/media/index.php"
echo "------------The-End-------------------------------------------------------"