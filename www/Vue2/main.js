var app = new Vue({
    el: '#app',
    data: {
        title: 'Style',
        isRounded: false,
        sizeToggle: false,
        disabled: false,
        fontColor: '#ccc',
        bgColor: 'yellow',
    },
    computed: {
      styles: function () {
          return {
              color: this.fontColor,
              background: this.bgColor,
          }
      }
    },
    methods: {
    }
})