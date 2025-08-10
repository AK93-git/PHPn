<?php
// Repository: php-simple-blog
// Description: A simple blog system with posts stored in a JSON file.

class Blog {
    private $dataFile;

    public function __construct($file) {
        $this->dataFile = $file;
        if (!file_exists($file)) {
            file_put_contents($file, json_encode([]));
        }
    }

    /**
     * Add a new blog post.
     */
    public function addPost($title, $content) {
        $posts = json_decode(file_get_contents($this->dataFile), true);
        $posts[] = [
            "id" => count($posts) + 1,
            "title" => $title,
            "content" => $content,
            "date" => date("Y-m-d H:i:s")
        ];
        file_put_contents($this->dataFile, json_encode($posts));
    }

    /**
     * List all blog posts.
     */
    public function listPosts() {
        $posts = json_decode(file_get_contents($this->dataFile), true);
        foreach ($posts as $post) {
            echo "ID: {$post['id']}, Title: {$post['title']}, Date: {$post['date']}\n";
            echo "Content: {$post['content']}\n\n";
        }
    }
}

$blog = new Blog("posts.json");
$blog->addPost("First Post", "This is the content of the first post.");
$blog->listPosts();
?>
