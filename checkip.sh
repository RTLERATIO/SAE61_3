docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' sae61_3_php_1
