# Render Docker setup for this WordPress theme

This project now includes:

- `Dockerfile`: builds WordPress and bundles `medicare` + `medicare-child` themes.
- `render.yaml`: Render Blueprint for:
  - web service: `medicare-wordpress`
  - private MySQL service: `medicare-mysql`
  - persistent disks for uploads and DB data

## Deploy steps

1. Push this folder to your GitHub repo.
2. In Render dashboard, choose **Blueprint** deploy and point to your repo.
3. Render will detect `render.yaml` and create both services.
4. Open the web URL and finish WordPress installer.
5. In WordPress admin, activate `Medicare` or `medicare-child` theme.

## Important notes

- This setup uses MySQL in a private Render service (not Render Postgres).
- Uploads are persisted at `/var/www/html/wp-content/uploads`.
- If you change the theme files later, redeploy the web service.

## Optional environment variables

Set these on `medicare-wordpress` if needed:

- `WORDPRESS_DEBUG=true`
- `WORDPRESS_CONFIG_EXTRA=define('FS_METHOD', 'direct');`
