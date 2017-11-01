# Installation

## Pre-requisites

You need a [Docker](https://docs.docker.com/engine/installation/) installed and configured on your local machine. 

## Build

 - Run `# ./build.sh`

 The build process will download (if you don't have already) the images from DockerHub and up the containers using the setup params placed on the `docker-compose.yml` file.

 After build process ran, you can access on your prefered browser `http://localhost:9000`.
 
 At the our project root folder, we will have some new folders to ensure some persistent data and our codebase:
 ```
  - db-data (persistent mysql data)
  - ccbr-theme (the code club theme)
  - plugins (theme plugins)
  - uploads (persistent upload data)
 ```

## How to halt the Docker environment

 - Run project root path `# docker-compose down`


## How to reset the Docker environment

 - Run `# ./clear.sh`

 ---

 If you have any suggestion or doubt, please create an [issue](https://github.com/CodeClubBrasil/ccbr-wordpress-theme/issues).

 For any new please follow the [Code Club Guidelines](https://styleguide.codeclubworld.org/).

 