#!/bin/bash

# Set supervisor to manage container processes
/usr/bin/supervisord

echo "CLICARS [local DEV enviroment ]"

# needed to run parameters CMD
$@