node {
    checkout scm

    // Build stage
  stage("Build"){
    docker.image('php:8.2-cli').inside('--entrypoint="" -u root') {
        sh '''
        apt-get update
        apt-get install -y unzip git curl

        curl -sS https://getcomposer.org/installer | php
        mv composer.phar /usr/local/bin/composer

        docker-php-ext-install bcmath

        git config --global --add safe.directory /var/jenkins_home/workspace/laravel-dev

        composer install --no-interaction --prefer-dist
        '''
    }
}

    // Testing stage
    stage("Test") {
        docker.image('ubuntu').inside('-u root') {
            sh 'echo "Ini adalah test"'
        }
    }

    // Deploy env prod
   stage("Deploy"){
    docker.image('alpine').inside('-u root') {
        sh '''
        apk add --no-cache rsync openssh

        mkdir -p /root/.ssh
        ssh-keyscan -H 10.121.225.62 >> /root/.ssh/known_hosts
        '''
        
        sshagent(['ssh-prod']) {
            sh '''
            rsync -avz --delete ./ ubuntu@10.121.225.62:/home/ubuntu/laravel-app
            '''
        }
    }
}
}
