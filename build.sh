#!/bin/bash
echo "Code Club Brasil - wordpress"
echo "================================"
echo ""
echo "Instanciamento e construção docker..."
echo ""
docker-compose build
docker-compose up -d --remove-orphans
sleep 20

# Instalação do Wordpress
echo ""
echo ""
echo "Instalação wordpress..."
echo ""
docker-compose exec wordpress wp core install --url="localhost:9000" --title="Code Club Brasil" --admin_user="ccbr" --admin_password="letscode" --admin_email="admin@codeclubbrasil.org.br"
echo ""
echo "Instalando plugin Advanced Custom Fields..."
echo ""

# Se não tiver instala o ACF
# docker-compose exec wordpress chown -R www-data:www-data /var/www
# docker-compose exec wordpress wp plugin install advanced-custom-fields
docker-compose exec wordpress wp plugin activate advanced-custom-fields

echo ""
echo "Habilitando tema Code Club Brasil..."
echo ""
docker-compose exec wordpress wp theme activate ccbr-theme

echo ""
echo ""
echo "+----------+-----------------------+"
echo "+ Instalação INFOS   		     +"
echo "+----------+-----------------------+"
echo "+ hostname | http://localhost:9000 +"
echo "+----------+-----------------------+"
echo "+ username | ccbr 		         +"
echo "+----------+-----------------------+"
echo "+ password | letscode 	         +"
echo "+----------+-----------------------+"
echo ""
echo "Bye!"