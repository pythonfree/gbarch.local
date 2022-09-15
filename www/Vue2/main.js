var app = new Vue({
    el: '#app',
    data: {
        url: '',
        cleanUrl: '',
        count: 0,
    },
    methods: {
        cleanerUrl: function () {
            this.url = "https://ya.ru/"
            this.cleanUrl = this.url.replace(/^https?:\/\//, '').replace(/\/$/, '')
        },
        countUp: function () {
            this.count += 1
        },
        countDown: function () {
            this.count -= 1
        }
    }
})