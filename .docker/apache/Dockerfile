FROM httpd:2.4-alpine
MAINTAINER Piotr Lewandowski <contact@piotrlewandowski.info>

RUN apk update;
RUN apk upgrade;
RUN apk add --update apache2-utils \
    && rm -rf /var/cache/apk/*;

EXPOSE 9000

# For easy navigating add oh my zsh and it's deps
RUN apk -q add curl \
    zsh \
    git; \
    sh -c "$(curl -fsSL https://raw.githubusercontent.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"; \
    sed -i s^ZSH_THEME=\"robbyrussell\"^ZSH_THEME=\"blinks\"^g ~/.zshrc;

# Add our docker.apache.conf file to bottom of the main apache configuration
# Copy backup of original to tmp, append ours and replace .conf file.
RUN touch /tmp/new_apache.conf; \
    cat /usr/local/apache2/conf/original/httpd.conf > /tmp/new_apache.conf; \
    echo "Include /usr/local/apache2/conf.d/docker.apache.conf" >> /tmp/new_apache.conf; \
    mv /tmp/new_apache.conf /usr/local/apache2/conf/httpd.conf;

RUN sed -i 's@^#LoadModule rewrite_module modules/mod_rewrite\.so@LoadModule rewrite_module modules/mod_rewrite.so@' /usr/local/apache2/conf/httpd.conf;
