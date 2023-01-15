<x-layout-default title="About">
    <h1>Laravel Project - Backend Web</h1>
    <h2>Github: <a href="https://www.github.com/SenneS/bw_senne_de_neef_laravel">https://www.github.com/SenneS/bw_senne_de_neef_laravel</a></h2>
    <div>
        <h3>Note:</h3>
        <p>
            <strong>* The php 'gd' extension is required to run my project due to the image library used. (see link in sources)</strong>
            <hr/>
            <strong>* I wanted to have more stuff finished, but I didn't have enough time left due to unexpectedly falling ill during the 2nd week of winter break.</strong>
            <hr/>
            <strong>* I got stuck quite a few times due to laravels form method rewriting, for it to work it has to come before the csrf tag or else it'll fail.</strong>
            <hr/>
            <strong>* CSS is the bane of my existence.</strong>
        </p>
        <h3>Extra Notes:</h3>
        <ul>
            <li>FAQ/Contact->Question functionality is all implemented but is currently not beeing seeded by the command.</li>
            <li>Contact requests submitted via the page are visible to the admins, who can answer the question at which point it will appear under the user questions section of the FAQ</li>
            <li>Admins can also create/delete/edit FAQ categories and questions in the admin menu.</li>
        </ul>
        <h3>Usage:</h3>
        <code>
            # console 1<br/>
            composer i
            npm i<br/>
            npm run dev<br/>
            <br/>
            # console 2<br/>
            php artisan migrate:fresh --seed<br/>
            php artisan serve<br/>
        </code>
        <h3>Sources:</h3>
        <ul>
            <li><h6>https://larainfo.com/blogs/install-tailwind-css-3-in-laravel-9-with-vite-3</h6></li>
            <li><h6>https://flowbite.com</h6></li>
            <li><h6>https://webdevetc.com/blog/laravel-naming-conventions/</h6></li>
            <li><h6>https://laravel.com/docs/9.x/eloquent-relationships</h6></li>
            <li><h6>https://laravel.com/docs/9.x/authentication</h6></li>
            <li><h6>https://laravel.com/docs/9.x/sanctum</h6></li>
            <li><h6>https://getbootstrap.com/docs/5.2/getting-started/vite/</h6></li>
            <li><h6>https://www.itsolutionstuff.com/post/laravel-profile-image-upload-tutorial-with-exampleexample.html</h6></li>
            <li><h6>https://startbootstrap.com</h6></li>
            <li><h6>https://startbootstrap.com/template/full-width-pics</h6></li>
            <li><h6>https://www.akilischool.com/cours/manipuler-les-images-dans-laravel-5</h6></li>
            <li><h6>https://stackoverflow.com/questions/34009844/gd-library-extension-not-available-with-this-php-installation-ubuntu-nginx</h6></li>
            <li><h6>https://css-tricks.com/almanac/properties/l/line-clamp/</h6></li>
            <li><h6>https://laravel.com/docs/9.x/errors</h6></li>
            <li><h6>https://stackoverflow.com/questions/34462190/how-to-change-laravel-models-table-name</h6></li>
        </ul>
        <h3>TODO:</h3>
        <ul>
            <li>- Implement Like system for projects</li>
            <li>- Add more seeding (faq, contact)</li>
        </ul>
    </div>
</x-layout-default>
