const { createApp } = Vue;

createApp({
    data() {
        return {
            students: []
        };
    },
    mounted() {
        axios
            .get('http://localhost/classe114/63-lc-php-json/backend/students.php', {
                params: {
                    name: 'Mario'
                }
            })
            .then((res) => {
                console.log(res.data);
                this.students = res.data;
            });
    }
}).mount('#app');