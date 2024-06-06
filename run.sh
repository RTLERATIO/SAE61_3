echo "Démarrage des conteneurs en cours..."
docker-compose up --build
sleep 10
host=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' sae61_3_php_1)
mysql -u root -p'foo' -h $host < ~/SAE61_61/data.sql

echo "Les conteneurs on été déployés !"
