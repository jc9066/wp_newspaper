##WP Newspaper Template
/** Newspaper Template:
——
DB MYSQL:
select * from alpha_options WHERE option_name = 'siteurl' OR option_name = 'home';
UPDATE wp_options 
SET option_value = 'https://viralnumerologypower.com' 
WHERE option_name = 'siteurl' OR option_name = 'home';

SET SQL_SAFE_UPDATES = 0;
UPDATE alpha_posts 
SET guid = REPLACE(guid, 'https://alphaitbuilder.com', 'https://viralnumerologypower.com');

UPDATE alpha_postmeta 
SET meta_value = REPLACE(meta_value, 'https://alphaitbuilder.com', 'https://viralnumerologypower.com');

UPDATE alpha_usermeta 
SET meta_value = REPLACE(meta_value, 'https://alphaitbuilder.com', 'https://viralnumerologypower.com');

UPDATE alpha_options 
SET option_value = REPLACE(option_value, 'https://alphaitbuilder.com', 'https://viralnumerologypower.com');
SET SQL_SAFE_UPDATES = 1;

——
wp-config.php:
define( 'WP_DEBUG', false );
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);
define('FS_METHOD', 'direct');
 ——
sudo chown -R www-data:www-data /var/www/viralnumerologypower.com/wp-content/uploads
sudo chmod -R 755 /var/www/viralnumerologypower.com/wp-content/uploads
  
--
Clean up DB

SET SQL_SAFE_UPDATES = 0;
UPDATE alpha_posts
SET post_author = 3
WHERE post_type = 'page';

DELETE pm
FROM alpha_postmeta pm
JOIN alpha_posts p ON pm.post_id = p.ID
WHERE p.post_type = 'post';

DELETE tr
FROM alpha_term_relationships tr
JOIN alpha_posts p ON tr.object_id = p.ID
WHERE p.post_type = 'post';

DELETE FROM alpha_posts
WHERE post_type = 'post';

ALTER TABLE alpha_posts 
MODIFY COLUMN post_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
MODIFY COLUMN post_date_gmt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
MODIFY COLUMN post_modified DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
MODIFY COLUMN post_modified_gmt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE alpha_posts AUTO_INCREMENT = 1;
ALTER TABLE alpha_postmeta AUTO_INCREMENT = 1;

DELETE FROM alpha_commentmeta;
ALTER TABLE alpha_comments 
MODIFY COLUMN comment_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
MODIFY COLUMN comment_date_gmt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;
DELETE FROM alpha_comments;
ALTER TABLE alpha_comments AUTO_INCREMENT = 1;
ALTER TABLE alpha_commentmeta AUTO_INCREMENT = 1;
SET SQL_SAFE_UPDATES = 1;
**/
