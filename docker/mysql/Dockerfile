FROM mysql:8.0.14
LABEL maintainer "ucan"

ADD ./my.cnf /etc/mysql/my.cnf
RUN set -x && \
  chmod 644 /etc/mysql/my.cnf && \
  mkdir /var/lib/mysql-files
