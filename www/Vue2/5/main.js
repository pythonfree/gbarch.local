Vue.component('book', {
    template: '#books',
    props: ['title', 'author', 'content']
});

new Vue({
    el: '#app',
    data: {
        author: 'David',
        title: 'TITLE OF BOOKS',
        content: 'Content of book',
    }
});