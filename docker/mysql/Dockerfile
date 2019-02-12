FROM mysql:8.0.15
LABEL maintainer "ucan"

COPY ./my.cnf /etc/mysql/my.cnf
RUN set -eux && \
  chmod 644 /etc/mysql/my.cnf && \
  mkdir /var/lib/mysql-files && \
  cp /etc/localtime /etc/localtime.org && \
  ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime
