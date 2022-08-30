new Vue({
    el: "#app",
    data: {
        title: "Hello World!",
        styleCSS: '',
    },
    methods: {
        changeText() {
            this.title = "Текс от функции changeText()";
        }
    }
});