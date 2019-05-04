# PHP7_Phalcon_Dockerized_app
Dockerized PHP Phalcon framework development environment

#### Inside **phalcon_php** container [Phalcon Devtools](https://github.com/phalcon/phalcon-devtools) are already available
# How to run

```
docker-compose up -d
```
Than navigate to [localhost:8007](http://localhost:8007/)

# How to add new app

1) In order to install new app
```
docker exec -it phalcon_php bash
cd projects
phalcon project <NAME_OF_PROJECT>
```

2) Give permissions for new app folder
```
find <NAME_OF_PROJECT> -type d -exec chmod 0777 {} + && find <NAME_OF_PROJECT> -type f -print0 | xargs -0 chmod og+rwx
```

3) Update **docker/nginx/hosts/nginx.conf** file
```
root /var/www/projects/<NAME_OF_PROJECT>/public;
```

4) Restart **nginx** container
```
docker-compose restart nginx
```
