FROM wordpress:6.6.2-php8.2-apache

# Copy bundled parent and child themes into the image.
COPY medicare /usr/src/wordpress/wp-content/themes/medicare
COPY medicare-child /usr/src/wordpress/wp-content/themes/medicare-child

# Optional: remove default themes to keep image smaller/cleaner.
RUN rm -rf /usr/src/wordpress/wp-content/themes/twentytwenty* \
    && chown -R www-data:www-data /usr/src/wordpress/wp-content/themes/medicare /usr/src/wordpress/wp-content/themes/medicare-child
