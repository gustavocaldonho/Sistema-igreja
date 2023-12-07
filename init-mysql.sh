#!/bin/bash

# Create MySQL data directory
mkdir -p /var/lib/mysql

# Copy MySQL data from host to container
cp -R /c/xampp/mysql/data/bd_sistema/* /var/lib/mysql

# Ensure the MySQL data directory has correct permissions
chown -R mysql:mysql /var/lib/mysql
chmod 755 /var/lib/mysql
chmod +x init-mysql.sh
