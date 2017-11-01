#!/bin/bash
echo "Code Club Brasil - wordpress"
echo "================================"
echo ""
echo "Parando conatiners..."
echo ""
docker-compose stop
echo ""
echo "Removendo conatiners utilizados..."
echo ""
docker-compose rm
echo ""
echo "Removendo volumes utilizados..."
echo ""
docker volume rm ccbrwordpresstheme_db-data
