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
    <h6>Credentials</h6>
    <h6>Email: admin@gmail.com</h6>
    <h6>Password: @password!</h6>

![Screenshot from 2022-01-19 10-55-44](https://user-images.githubusercontent.com/29039251/150094509-cc971710-04b3-4e49-a6ba-61fac77a1b8e.png)
![Screenshot from 2022-01-19 10-55-49](https://user-images.githubusercontent.com/29039251/150094512-01e8505d-c870-415e-b7ec-ef7fe233a7f7.png)
![Screenshot from 2022-01-19 10-55-52](https://user-images.githubusercontent.com/29039251/150094514-aa7c1272-6d99-4691-a1d7-343784969be5.png)
![Screenshot from 2022-01-19 10-56-15](https://user-images.githubusercontent.com/29039251/150094517-cb623489-6c81-40e7-b843-084a774f4a8e.png)
![Screenshot from 2022-01-19 10-56-25](https://user-images.githubusercontent.com/29039251/150094522-9d570870-0c8e-4600-a9d3-0d1e75398225.png)
