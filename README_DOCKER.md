# Docker Development Environment for AegisWP Theme

## Quick Start
1. Copy `.env.docker` to `.env` if you want to customize ports or DB credentials.
2. Run:
   ```sh
   docker-compose up -d
   ```
3. Access WordPress at [http://localhost:8080](http://localhost:8080)
4. Access phpMyAdmin at [http://localhost:8081](http://localhost:8081)
5. To run npm/yarn commands:
   ```sh
   docker-compose exec node bash
   # Then run npm install, npm run build, etc.
   ```

## Volumes
- WordPress uploads are persisted in the `wp_uploads` Docker volume.
- MySQL data is persisted in the `db_data` Docker volume.

## Theme Activation (Optional)
To automate theme activation, you can add a post-start script using WP-CLI.

## Stopping & Cleaning Up
- Stop containers:
  ```sh
  docker-compose down
  ```
- Remove all volumes (DANGEROUS: deletes DB/uploads!):
  ```sh
  docker-compose down -v
  ```

## Customization
- Edit `.env.docker` to change ports or credentials.
- Add more services (like mailhog, redis) as needed.

---

For advanced usage (Xdebug, custom Dockerfiles, etc.), see the comments in `docker-compose.yml` or ask your AI assistant!
