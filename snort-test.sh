#!/bin/bash

initCount=0
logs=/home/gugus/logs.txt 

message=/tmp/message.txt

chat_id="863397096"
token="6705155258:AAE3ZW2wH6o13wMYk99-lrJbBaePKDJE-A4"


function sendAlert
{
    curl -s -F chat_id=$chat_id -F text="$text" https://api.telegram.org/bot$token/sendMessage
}


Running the program
while true
do
    lastCount=$(wc -c $logs | awk '{print $1}') 

    if(($(($lastCount)) > $initCount));
       then
        msg=$(tail -n 2 $logs) 
        echo -e "To Admin\n Telah terjadi penyerangan terhadap website anda\n\nServer Time : $(date +"%d %b %Y %T")\n\n"$msg > $message
        text=$(<$message)
        sendAlert
        echo " Alert sent!"
        initCount=$lastCount
        rm -f $message
        sleep 1
    fi
    sleep 2
done