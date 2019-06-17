/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//window.ClassicEditor = require('@ckeditor/ckeditor5-build-classic');

//Vue.use(require('@ckeditor/ckeditor5-vue'));

//Vue.use(require('vue-moment'));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('calendar', require('./components/Calendar.vue').default);
//Vue.component('editor', require('@tinymce/tinymce-vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: function() {
        return {
            //editor: ClassicEditor,
            timeslot: {
              "id": 1,
              "date": "1970-01-01",
              "default_timeslot_id": 1,
              "created_at": "2019-04-25 16:57:40",
              "updated_at": "2019-04-25 16:57:40",
              "default_timeslot": {
                "id": 2,
                "time": "16:00:00",
                "created_at": "2019-04-25 14:47:18",
                "updated_at": "2019-04-25 14:47:18" 
              } 
            }
        }
    },
    methods: {
        slotEvents(events, date) {
            return events.filter(event => this.$moment(event.date).format('YYYY M D') == this.$moment(date).format('YYYY M D'));
        },
        onClick: function(id, date, time) {
            this.timeslot = {
                id: id,
                date: date,
                time: time
            }
            //console.log(this.timeslot)
            $('#appointment-form').modal('show')
        }
    }
});
