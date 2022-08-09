CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vizitore_name VARCHAR(50) NOT NULL,
    post TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP)
)

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    vizitore_name VARCHAR(50) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP),

    CONSTRAINT fk_posts_comments
      FOREIGN KEY (post_id) REFERENCES posts(id)
)

CREATE TABLE rates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    rate INT NOT NULL DEFAULT 0,

    CONSTRAINT fk_posts_rates
       FOREIGN KEY (post_id) REFERENCES posts(id)
)