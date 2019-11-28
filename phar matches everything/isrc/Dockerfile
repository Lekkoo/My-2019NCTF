FROM ubuntu:latest
RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime
RUN echo 'Asia/Shanghai' >/etc/timezone
RUN sed -i 's/archive.ubuntu.com/mirrors.aliyun.com/g' /etc/apt/sources.list
RUN sed -i 's/security.ubuntu.com/mirrors.aliyun.com/g' /etc/apt/sources.list

RUN apt -y update && \
	apt -y install php php-fpm nginx

ADD entrypoint /
ADD nginx.conf /etc/nginx/sites-enabled/default
ADD php.ini /etc/php/7.2/fpm/php.ini
ADD www.conf /etc/php/7.2/fpm/pool.d/www.conf
ADD index.php /var/www/html/index.php

ADD flag /flag
RUN chmod 744 /flag && \
    chmod +x /entrypoint
RUN chmod -R 777 /var/www/html

CMD "/entrypoint"
