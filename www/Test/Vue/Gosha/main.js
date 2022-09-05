
Vue.filter('capitalize', function (value) {
    if (!value) return '';
    value = value.toString();
    return value.replace(/\b\w/g, function (l) {
        return l.toUpperCase();
    })
});

new Vue({
    el: "#app",
    data: {
        message: 'Hello, world, hello.',
        show: true,
        cars: [
            {model: 'model1', speed: 1},
            {model: 'model2', speed: 2},
            {model: 'model3', speed: 3},
            {model: 'model4', speed: 4},
        ]
    },
    computed: {
        showMess() {
            return this.message.toUpperCase();
        }
    },
    filters: {
        lowerCase(value) {
            return value.toLowerCase();
        }
    }
})


// new Vue({
//     el: "#app",
//     data: {
//         value: 1,
//     },
//     methods: {
//         increment(value)
//         {
//             this.value = value;
//             if (value == 24) {
//                 console.log(`this value is ${value}`);
//                 console.log("sdfsdf");
//                 // alert('sdfsdf');
//             }
//         }
//     },
//     computed: {
//         doubleValue()
//         {
//             return this.value * 2;
//         }
//     }
// });


// new Vue({
//     el: "#app",
//     data: {
//         title: "Hello World!",
//         styleCSS: '',
//     },
//     methods: {
//         changeText() {
//             this.title = "Текс от функции changeText()";
//         }
//     }
// });