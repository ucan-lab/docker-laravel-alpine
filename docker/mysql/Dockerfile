FROM mysql:8.0.16
LABEL maintainer "ucan"

COPY mysql.cnf /etc/mysql/conf.d/mysql.cnf
RUN set -eux && \
  chmod 644 /etc/mysql/my.cnf && \
  mkdir /var/lib/mysql-files && \
  cp /etc/localtime /etc/localtime.org && \
  ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime
