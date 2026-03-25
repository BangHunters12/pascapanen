node {
    checkout scm

    // Build stage
    stage("Build") {
        docker.image('shippingdocker/php-composer:7.4').inside('-u root') {
            sh 'rm -f composer.lock'
            sh 'composer install'
        }
    }

    // Testing stage
    stage("Test") {
        docker.image('ubuntu').inside('-u root') {
            sh 'echo "Ini adalah test"'
        }
    }

    // Deploy env prod
    stage("Deploy") {
        docker.image('alpine').inside('-u root') {
            sh 'apk add --no-cache rsync openssh'

            sshagent(credentials: ['ssh-prod']) {
                sh 'mkdir -p ~/.ssh'
                sh 'ssh-keyscan -H "$PROD_HOST" >> ~/.ssh/known_hosts'

                sh '''
                rsync -rav --delete ./laravel/ \
                ubuntu@$PROD_HOST:/home/ubuntu/prod.kelasdevops.xyz/ \
                --exclude=.env \
                --exclude=storage \
                --exclude=.git
                '''
            }
        }
    }
}
