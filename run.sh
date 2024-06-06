echo "Démarrage des conteneurs en cours..."
docker-compose up --build -d
sleep 10
host1=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' sae61_3_db_1)
host2=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' sae61_3_php_1)
echo "Les conteneurs on été déployés !"
echo "Voici l'IP du site : $host2"
mysql -u user -p'user' -h $host1 < data.sql
