Vue.component('nav-item', {
    props: ['nav_item'],
    template: '<div class="nav_item"><a href=\"{{ nav_item.key }}\"> {{ nav_item.text }}</a></div>'
});

var studyHelper = new Vue({
    el: '#nav',
    data: {
        navList: [
            { id: '/', text: 'Home' },
            { id: '/p/create', text: 'Create' },
            /*{ id: '/p/test', text: 'Do a Test' },
            { id: '/p/results', text: 'Results' },*/
            { id: '/p/404', text: '404 Example' }
        ]
    }
});