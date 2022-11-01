const Home = {template: '<h1>Home</h1>'}
const Blog = {template: '<h1>Blog</h1>'}
const About = {template: '<h1>About</h1>'}

const routes = [
    {path: '/home', component: Home},
    {path: '/blog', component: Blog},
    {path: '/about', component: About},
]

const router = new VueRouter({
    routes
})

const app = new Vue({
    router
}).$mount('#app')