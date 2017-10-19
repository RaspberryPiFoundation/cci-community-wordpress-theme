#Installation

##Pre-requisites

Docker

##Setup

1. Update the `docker-compose.yml` file with the local path for database and volumes:
```
      - <YOUR LOCAL PATH HERE>/ccbr-theme:/var/www/html/wp-content/ccbr-theme
      - <YOUR LOCAL PATH HERE>/uploads:/var/www/html/wp-content/uploads
      - <YOUR LOCAL PATH HERE>/plugins:/var/www/html/wp-content/plugins
```

2. Run `# docker-compose up` to rise the local environment



