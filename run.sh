echo "Démarrage des conteneurs en cours..."
docker-compose up --build -d
sleep 10
host=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' sae61_3_db_1)
echo "Les conteneurs on été déployés !"
echo "Voici l'IP du site : $host"
mysql -u user -p'user' -h $host < data.sql
