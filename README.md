<h4>Instructions to run project</h4>
<ul>
    <li><code>git clone https://github.com/DERYKO/blog.git</code></li>
    <li>Navigate to blog directory</li>
    <li>Run: <code>composer install</code></li>
    <li>Run: <code>php artisan key:generate</code></li>
     <li>Edit .env: 
         <code>
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=root
         </code>
    </li>
    <li>Run: <code>php artisan migrate:fresh --seed</code>. This will seed your database and fetch some posts from  <a href="https://sq1-api-test.herokuapp.com/posts">https://sq1-api-test.herokuapp.com/posts</a></li>
     <li>Run: <code>php artisan passport:install</code></li>
    <li>Run: <code>php artisan serve</code></li>
    <li>Visit: <code>http://127.0.0.1:8000/</code></li>
<ul/>
