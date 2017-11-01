#!/bin/bash
echo "Code Club Brasil - wordpress"
echo "================================"
echo ""
echo "Instanciamento e construção docker..."
echo ""
docker-compose up -d --remove-orphans
# espera o wordpress ficar pronto
sleep 20

# Instalação do Wordpress
echo ""
echo ""
echo "Instalação wordpress..."
echo ""
docker run -it --rm --volumes-from ccbrwordpresstheme_wordpress_1 --network container:ccbrwordpresstheme_wordpress_1 wordpress:cli \
wp core install --url="localhost:9000" --title="Code Club Brasil" --admin_user="ccbr" --admin_password="letscode" \
--admin_email="admin@codeclubbrasil.org.br" --skip-email
echo ""
echo "Instalando plugin Advanced Custom Fields..."
echo ""

# Se não tiver instala o ACF
docker run -it --rm --volumes-from ccbrwordpresstheme_wordpress_1 --network container:ccbrwordpresstheme_wordpress_1 wordpress:cli \
wp plugin activate advanced-custom-fields
echo ""
echo "Habilitando tema Code Club Brasil..."
echo ""
docker run -it --rm --volumes-from ccbrwordpresstheme_wordpress_1 --network container:ccbrwordpresstheme_wordpress_1 wordpress:cli \
wp theme activate ccbr-theme
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