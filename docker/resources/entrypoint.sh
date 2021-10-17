#!/bin/bash

# Set supervisor to manage container processes
/usr/bin/supervisord

echo "[local DEV enviroment ]"

# needed to run parameters CMD
$@