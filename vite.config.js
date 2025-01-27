import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/action-forms.css',
                'resources/js/app.js',
                'resources/js/show-password.js',
                'resources/js/admin.js',
                'resources/js/course-form.js',
            ],
            refresh: true,
        }),
    ],
});
