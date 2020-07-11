import Home from './components/Home.vue';
import Example from './components/Example.vue';
export const routes = [
    { path: '/home', component: Home, name: 'Home' },
    { path: '/home/example', component: Example, name: 'Example' }
];
