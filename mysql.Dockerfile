FROM mysql:8.0

USER root
COPY mysql-entrypoint.sh /usr/local/bin/mysql-entrypoint.sh
RUN chmod +x /usr/local/bin/mysql-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/mysql-entrypoint.sh"]
